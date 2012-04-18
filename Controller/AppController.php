<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       Cake.Console.Templates.skel.Controller
 */
class AppController extends Controller {

		public $components = array('Auth', 'Session', 'Decorator.Decorator');

		public $helpers = array(
			"Html",
			"Form",
			"Session",
			"TwitterBootstrap.TwitterBootstrap",
			"Partials.Partial"
		);

/**
 * beforeFilter function.
 * 
 * @access public
 * @return void
 */
	public function beforeFilter() {
		$this->Auth->authenticate = array(
			'Form' => array(
				'fields' => array(
					'username' => 'email',
					'password' => 'password'
				)
			)
		);
		$this->Auth->allow('display');
	}
	
/**
 * beforeRender function.
 * 
 * @access public
 * @return void
 */
	public function beforeRender() {
		$recent = ClassRegistry::init('Post')->recent();
		$this->set(compact('recent'));
	}
	
/**
 * isAuthorized function.
 * 
 * @access public
 * @return void
 */
	public function isAuthorized() {
		return true;
	}


}
