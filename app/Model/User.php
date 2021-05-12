<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('Validation', 'Utility');
/**
 * User Model
 *
 * @property Contact $Contact
 * @property District $District
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'this field can not be empty'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'emailOrPhone' => array(
				'rule' => array('emailOrPhone'),
				'message' => 'enter a valid email address or phone number'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'the email or phone is already in use'
			),
			'uniquePhoneNumber' => array(
				'rule' => 'isUniquePhoneNumber',
				'message' => 'phone number already used'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'please enter a password'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', 6),
				'message' => 'password should be atleast 6 characters long'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'match' => array(
				'rule' => 'matchPasswords',
				'message' => 'passwords do not match'
			),
		),
		'display_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'please enter a valid name'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', 4),
				'message' => 'must be at least 4 characters long'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*'avatar' => array(
			'UploadError' => array(
				'rule' => 'uploadError',
				'message' => 'no file was uploaded'
			)
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'District' => array(
			'className' => 'District',
			'foreignKey' => 'district_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Notification' => array(
			'className' => 'Notification',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Message' => array(
			'className' => 'Message',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

	/*
	* deletes the specified filename (avatar)
	* @param string $filename
	* @return bool true on success and false on failure
	*/
	public function deleteAvatar($filename = null){
		$file = WWW_ROOT . 'img' . DS . 'avatars' . DS . $filename;

		//edited in the future
		if(file_exists($file)){
			return true;
		}
	}

	public function beforeSave($options = array()){
		if(isset($this->data[$this->alias]['password'])){
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}
    
    public function avatar($data){

    	if(is_uploaded_file($this->data[$this->alias]['avatar']['type'])){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function isUniquePhoneNumber($data){
    	
    	if(Validation::email($data['username'])){
    		return true;
    	}
    	$_phoneArray = str_split($data['username']);
		$_reversedPhoneArray = array_reverse($_phoneArray);
		$_firstNine = array_slice($_reversedPhoneArray, 0, 9);
		$_reversedFirstNine = array_reverse($_firstNine);
		$_phoneString = implode('', $_reversedFirstNine);

		$phoneCombinations = array(
			'0'.$_phoneString,
			'265'.$_phoneString,
			'+265'.$_phoneString
		);

		$matchCount = $this->find('count', array(
			'conditions' => array(
				'username' => $phoneCombinations
			)
		));
		if($matchCount > 0){
			return false;
		}
		return true;
    }

    public function matchPasswords($data){
    	if(trim($data['password'] == trim($this->data[$this->alias]['passwordConfirm']))) {
    		return true;
    	}else{
    		$this->invalidate('passwordConfirm', 'passwords do not match');
    		return false;
    	}
    }
}
