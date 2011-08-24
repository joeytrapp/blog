<?php
/**
 * Users Controller
 *
 */
class UsersController extends AppController {

/**
 * beforeFilter method
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'logout');
	}
	
/**
 * login method
 *
 * @return void
 */
	public function login() {
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Auth->login()) {
				$user = $this->User->read(null, $this->Auth->user('id'));
				$this->redirect(array('controller' => 'posts', 'action' => 'index'));
			}
		}
	}
 
/**
 * logout method
 *
 * @return void
 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

}
