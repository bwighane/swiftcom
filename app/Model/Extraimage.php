<?php
App::uses('AppModel', 'Model');
/**
 * Extraimage Model
 *
 * @property Product $Product
 */
class Extraimage extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'image_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'product_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function getExtraImages($productId = null){
		if(!$this->Product->exists($productId)){
			throw new NotFountException("noo such product");
		}

		$this->recursive = -1;

		$conditions = array(
			'Extraimage.product_id' => $productId
		);

		return $this->find('all', array('conditions' => $conditions));
	}

	public function deleteExtraImage($filename){
		$path = WWW_ROOT . 'img' . DS . 'product_images'. DS . 'extra' . DS;
		$filename = $path . $filename;

		//call the method from AppModel
		$this->deleteFile($filename);
	}
}
