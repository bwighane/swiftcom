<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Subcategory $Subcategory
 * @property Extraimage $Extraimage
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
		'_q' => array(
			'type' => 'like',
			'field' => 'name',
		),
		'name' => array(
			'type' => 'like', 
			'field' => 'name'
		),
		'category_id' => array(
			'type' => 'value',
			'field' => 'category_id'
		),
		'subcategory_id' => array(
			'type' => 'value',
			'field' => 'subcategory_id'
		),
		'quantity' => array(
			'type' => 'value',
			'field' => 'quantity'
		),
		'priceFrom' => array(
			'type' => 'query',
			'method' => 'priceRangeMin'
		),
		'priceTo' => array(
			'type' => 'query',
			'method' => 'priceRangeMax'
		),
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'please name your product',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'money' => array(
				'rule' => array('money', 'left'),
				'message' => 'specify a real amount of money',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'specify the quantity',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'quantity' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				'message' => 'enter a valid amount',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'how many items are available ?',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'show people what you are selling, upload failed'
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'select a category',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'subcategory_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'select a sub-category',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'description' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		'message' => 'please describe your product',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		'store_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'a product should belong to a store',
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
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'counterCache' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
			'counterCache' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'store_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Extraimage' => array(
			'className' => 'Extraimage',
			'foreignKey' => 'product_id',
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
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'product_id',
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
		'Favourite' => array(
			'className' => 'Favourite',
			'foreignKey' => 'product_id',
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

	public function priceRangeMin($data = array()){
		if(!empty($data['priceFrom'])){
			return array('Product.price >= ' . $data['priceFrom'] . '');
		}
	}

	public function priceRangeMax($data = array()){
		if(!empty($data['priceTo'])){
			return array('Product.price <= ' . $data['priceTo'] . '');
		}
	}

	public function beforeDelete($cascade = true){
		$this->read();
		$subcategoryId = $this->field('Product.subcategory_id');
		$this->decrementSubcategoryCount($subcategoryId);
	}
	public function decrementSubcategoryCount($subcategoryId){
        $count = (integer)$this->Subcategory->field('product_count', array('id' => $subcategoryId));
        $this->Subcategory->read('product_count', $subcategoryId);
        $this->Subcategory->set('product_count', --$count);
        $this->Subcategory->save();
    }

}
