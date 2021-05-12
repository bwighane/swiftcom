<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 * @property User $User
 */
class Contact extends AppModel {

	//regexp for a genaral phone number

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email_address' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'email format',
			),
		),
		'phone' => array(
			'phone' => array(
				'rule' => array('phoneOrNot', 'phone'),
				'message' => 'enter a valid phone number'
			),
		),
		'otherphone' => array(
			'phone' => array(
				'rule' => array('phoneOrNot', 'otherphone'),
				'message' => 'enter a valid phone number'
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
