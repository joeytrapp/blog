<?php
/**
 * User class.
 * 
 * @extends AppModel
 */
class User extends AppModel {
	
/**
 * displayField
 * 
 * @var string
 * @access public
 */
	public $displayField = 'name';
	
/**
 * virtualFields
 * 
 * @var mixed
 * @access public
 */
	public $virtualFields = array(
		'name' => 'CONCAT(User.first_name, \' \', User.last_name)'
	);
	
/**
 * hasMany
 * 
 * @var mixed
 * @access public
 */
	public $hasMany = array('Post');

}
