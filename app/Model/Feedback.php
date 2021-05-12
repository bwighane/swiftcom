<?php
App::uses('AppModel', 'Model');
/**
 * Feedback Model
 *
 */
class Feedback extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'feedbacks';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'content' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
