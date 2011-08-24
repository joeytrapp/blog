<?php
/**
 * Post class.
 * 
 * @extends AppModel
 */
class Post extends AppModel {
	
/**
 * belongsTo
 * 
 * @var mixed
 * @access public
 */
	public $belongsTo = array(
		'User',
		'ParentPost' => array(
			'className' => 'Post',
			'foreignKey' => 'parent_id'
		)
	);
	
/**
 * hasOne
 * 
 * @var mixed
 * @access public
 */
	public $hasOne = array(
		'ChildPost' => array(
			'className' => 'Post',
			'foreignKey' => 'parent_id'
		)
	);
	
/**
 * afterFind function.
 * 
 * @access public
 * @param array $results (default: array())
 * @param mixed $primary (default: null)
 * @return void
 */
	public function afterFind($results = array(), $primary = null) {
		foreach ($results as &$result) {
			foreach (array('Post', 'ChildPost', 'ParentPost') as $type) {
				if (array_key_exists($type, $result)) {
					if (array_key_exists('post_file', $result[$type]) && !empty($result[$type]['post_file'])) {
						$content = file_get_contents(APP . 'Posts' . DS . $result[$type]['post_file']);
						$result[$type]['content'] = $content;
					} else {
						$result[$type]['content'] = '';
					}
				}
			}
		}
		return $results;
	}
	
/**
 * recent function.
 * 
 * @access public
 * @return void
 */
	public function recent() {
		return $this->find('all', array(
			'conditions' => array(
				'Post.is_published' => 1
			),
			'order' => array(
				'Post.publish_date' => 'DESC'
			),
			'limit' => 5
		));
	}
	
/**
 * description function.
 * 
 * @access public
 * @param mixed $content
 * @return void
 */
	public function description($content) {
		App::import('Vendor', 'Markdown');
		$ret = Markdown($content);
		$ret = substr(strip_tags($ret), 0, 200);
		return $ret;
	}
	
/**
 * getList function.
 * 
 * @access public
 * @return void
 */
	public function getList() {
		$path = APP . 'Posts' . DS;
		$ret = array();
		if (is_dir($path)) {
			if (($dh = opendir($path)) !== false) {
				while (($file = readdir($dh)) !== false) {
					$name = $this->_nameFromFile($file);
					if ($name) {
						$ret[$file] = $name;
					}
				}
				closedir($dh);
			}
		}
		return $ret;
	}
	
/**
 * _nameFromFile function.
 * 
 * @access public
 * @param mixed $fileName
 * @return void
 */
	public function _nameFromFile($fileName) {
		if (in_array($fileName, array('empty', '.', '..'))) {
			return false;
		}
		$ret = substr($fileName, 0, strpos($fileName, '.'));
		$ret = str_replace(array('-', '_'), ' ', $ret);
		$ret = ucwords($ret);
		return $ret;
	}

}
