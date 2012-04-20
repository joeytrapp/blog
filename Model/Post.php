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
	 * Converting the publish date field to mysql date format before save.
	 * 
	 * @return bool
	 */
	public function beforeSave() {
		if (isset($this->data[$this->alias]["publish_date"])) {
			$date = date("Y-m-d", strtotime($this->data[$this->alias]["publish_date"]));
			$this->data[$this->alias]["publish_date"] = $date;
		}
		return true;
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
				'Post.publish_date' => 'DESC',
				'Post.created' => 'DESC'
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
	
}
