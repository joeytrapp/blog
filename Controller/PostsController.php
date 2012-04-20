<?php

class PostsController extends AppController {

	public $name = 'Posts';
	
	public $helpers = array('Time');
	
	/**
	 * beforeFilter function.
	 * 
	 * @access public
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'latest', 'view');
	}
	
	/**
	 * beforeRender function.
	 * 
	 * @access public
	 * @return void
	 */
	public function beforeRender() {
		parent::beforeRender();
		if (
			array_key_exists('post', $this->viewVars) &&
			in_array($this->params['action'], array('latest', 'view'))
		) {
			/*$post = $this->viewVars['post'];
			$this->Metadata->metadata('fb_url', array(
				'property' => 'og:url',
				'content' => Router::url(array('action' => 'view', $post['Post']['slug']), true),
				'link' => false
			));
			$this->Metadata->metadata('title', $post['Post']['title']);
			$this->Metadata->metadata('fb_title', array(
				'property' => 'og:title',
				'content' => $post['Post']['title']
			));
			$this->Metadata->metadata('fb_description', array(
				'property' => 'og:description',
				'content' => $this->Post->description($post['Post']['content'])
			));*/
		}
	}
	
	/**
	 * index function.
	 * 
	 * @access public
	 * @return void
	 */
	public function index() {
		$paginate = array();
		if (!$this->Auth->user()) {
			$paginate['conditions'] = array(
				'Post.is_published' => 1
			);
		}
		$paginate['limit'] = 5;
		$this->paginate = array_merge(
			$paginate,
			array('order' => array(
				'Post.publish_date' => 'DESC',
				'Post.created' => 'DESC'
			))
		);
		$posts = $this->Decorator->build("Post", $this->paginate());
		$this->set(compact('posts'));
	}
	
	/**
	 * view function.
	 * 
	 * @access public
	 * @param mixed $slug (default: null)
	 * @return void
	 */
	public function view($slug = null) {
		if (!$slug) {
			$this->redirect(array('action' => 'latest'));
		}
		$post = $this->Decorator->create("Post", $this->Post->find('first', array(
			'conditions' => array(
				'Post.slug' => $slug
			)
		)));
		if (empty($post)) {
			throw new NotFoundException("Post doesn't exist");
		}
		$this->set(compact('post'));
	}
	
	/**
	 * add function.
	 * 
	 * @access public
	 * @return void
	 */
	public function add() {
		if (!empty($this->request->data)) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Post created.', true));
				$post = $this->Post->read();
				$this->redirect(array('action' => 'view', $post['Post']['slug']));
			} else {
				$this->Session->setFlash(__('Post failed.', true));
			}
		}
		$parents = $this->Post->find('list');
		$users = $this->Post->User->find('list');
		$this->set(compact('parents', 'users'));
	}
	
	/**
	 * edit function.
	 * 
	 * @access public
	 * @param mixed $id (default: null)
	 * @return void
	 */
	public function edit($id = null) {
		if (!$id) {
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Post updated.', true));
				$post = $this->Post->read();
				$this->redirect(array('action' => 'view', $post['Post']['slug']));
			} else {
				$this->Session->setFlash(__('Post failed.', true));
			}
		} else {
			$this->data = $this->Post->read(null, $id);
		}
		$parents = $this->Post->find('list', array(
			'conditions' => array(
				'NOT' => array(
					'Post.id' => $id
				)
			)
		));
		$users = $this->Post->User->find('list');
		$this->set(compact('parents', 'users'));
	}
	
	/**
	 * delete function.
	 * 
	 * @access public
	 * @param mixed $id (default: null)
	 * @return void
	 */
	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post id.', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted.', true));
		} else {
			$this->Session->setFlash(__('Post did not delete.', true));
		}
		$this->redirect(array('action' => 'index'));
	}

}
