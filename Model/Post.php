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
				if (array_key_exists($type, $result) && array_key_exists('content', $result[$type])) {
					$content = $result[$type]['content'];
					$result[$type]['description'] = $this->description($content);
				}
			}
		}
		return $results;
	}

/**
 * latest function.
 *
 * @access public
 * @return array
 */
	public function latest($limit = 1) {
		$posts = $this->find('all', array(
			'conditions' => array(
				'Post.is_published' => 1
			),
			'order' => array(
				'Post.publish_date' => 'DESC'
			),
			'limit' => $limit
		));
		if (count($posts) === 1 && $limit === 1) {
			$posts = $posts[0];
		}
		return $posts;
	}
	
/**
 * recent function.
 * 
 * @access public
 * @return array
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
		$ret = substr(strip_tags($ret), 0, 300) . '...';
		return $ret;
	}
	
}
