<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

	public $uses = array('Product');

	var $paginatorLimit = 20;

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg', 'Flash');


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('search',
		 'viewprofile', 'category', 
		 'subcategory', 'productpage',
		  'advancedsearch', 'home', 'store', 'hashtag', 'dude',
		  'latest', 'getbyid', 'fromcategory', 'fromsubcategory', 'extraImages', 'sto', 'imagesForProduct', 'get_all', 'dud');
	}

	public function dude(){
		echo json_encode($this->Product->find('all'));
		exit();
	}
	private function initialAdminSetup(){

		// $layout = 'public';

		$user = $this->currentUser();
		$userId = $user['id'];

		if(!$this->Product->User->exists($userId)){
			throw new NotFoundException("no user of this id exists");
		}
		$this->loadStores();
		return $userId;
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'emarket';
		$userId = $this->initialAdminSetup();
		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.user_id' => $userId,
				'Product.trashed' => 0
			), 
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);
		$title = 'my products';
		$this->Product->recursive = 0;
		$this->set('pageTitle', $title);
		$this->set('title_for_layout', $title);
		$this->set('products', $this->Paginator->paginate());
	}


	public function home(){
		$this->layout = 'public';
		
		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.trashed' => 0
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);
		$this->set('products', $this->Paginator->paginate());
		$this->Product->Category->recursive = -1;
		$categoriesSettings = array(
			'fields' => array(
				'name', 'id', 'product_count'
			),
			'order' => array(
				'Category.name' => 'ASC'
			),
		);
		$this->set('categories', $this->Product->Category->find('all', $categoriesSettings));
		$this->set('title_for_layout', 'latest');
		$this->setMoreOption("categories");
	}

	public function favourites(){
		$user = $this->currentUser();

		$this->layout = 'public';

		$favouritedProducts = $this->Product->Favourite->find('list', array('fields' => array('product_id'), 'conditions' => array('Favourite.user_id' => $user['id'])));

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.trashed' => 0,
				'Product.id' => $favouritedProducts
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);
		$this->set('products', $this->Paginator->paginate());
		$this->Product->Category->recursive = -1;
		$categoriesSettings = array(
			'fields' => array(
				'name', 'id'
			),
			'order' => array(
				'Category.name' => 'ASC'
			),
		);
		$categories = $this->catProductCount($this->Product->Category->find('all', $categoriesSettings));
		$this->set('categories', $categories);
		$this->set('title_for_layout', 'my favourites');
		$this->setMoreOption("categories");
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'emarket';
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

	public function viewfromstore($storeId){
		$this->layout = 'emarket';
		$userId = $this->initialAdminSetup();
		if(!$this->Product->Store->exists($storeId)){
			throw new NotFoundException("no store found by that id");
		}
		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.user_id' => $userId,
				'Product.trashed' => 0,
				'Product.store_id' => $storeId
			), 
			'order' => array(
				'Product.modified' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);
		$pageTitle = $this->Product->Store->field('name', array('Store.id' => $storeId));
		$this->Product->recursive = 0;
		$this->set('title_for_layout', $pageTitle);
		$this->set('pageTitle', $pageTitle);
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'emarket';
		$user = $this->currentUser();

		if($this->Product->Store->find('count', array('conditions' => array('Store.user_id' => $user['id']))) == 0){
			$this->redirect(array('controller' => 'stores', 'action' => 'index'));
		}
		$this->set('title_for_layout', 'new product');

		$currentSubcategory = -1;

		if ($this->request->is('post')) {

			//image uploading information

			$productImageOptions = array(
                'tmpName' => $this->request->data['Product']['image']['tmp_name'],
                'mimeType' => $this->request->data['Product']['image']['type'],
                'destinationFolder' => 'product_images',
                'width' => 450,
                'height' => 450,
	        	'acceptedMimeTypes' => $this->imageMimeTypes(),
	        	'productImage' => true
            );

			$this->request->data['Product']['image'] = $this->Product->saveUploadedFile($productImageOptions);

			$this->Product->create();

			$this->request->data['Product']['store_id'] = $this->Product->Store->field('id', array('Store.user_id' => $user['id']));

			$this->request->data = $this->addCategory($this->request->data);

			// $this->request->data['Product']['id'] = (string) microtime(true) . (string) microtime(true);

			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				// $this->incrementSubcategoryCount($this->request->data['Product']['subcategory_id']);
				$this->Flash->newProduct('', array('key' => 'new_product', 'params' => array('success' => true)));
				return $this->redirect(array('action' => 'edit', $this->Product->id));
			} else {
				$currentSubcategory = $this->request->data['Product']['subcategory_id'];
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
				$this->Flash->newProduct('', array('key' => 'new_product', 'params' => array('success' => false)));
			}
		}
		
		$this->loadStores();
		$categories = $this->Product->Category->find('list', array('order' => array('name' => 'ASC')));
		$subcategories = $this->Product->Subcategory->find('list',array('order' => array('name' => 'ASC')));
		$this->set(compact('categories', 'subcategories', 'stores'));
		$this->set('currentSubcategory', $currentSubcategory);
	}

	public function addCategory($requestData = array()){
		$subcatid = $requestData['Product']['subcategory_id'];
		$category_id = $this->Product->Subcategory->field('category_id', array('id' => $subcatid));
		$requestData['Product']['category_id'] = $category_id;
		return $requestData;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'emarket';
		$this->initialAdminSetup();
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}

		$user = $this->currentUser();
		if ($this->request->is(array('post', 'put'))) {

			//where the user will be returned after processing request
			/*
			$url = array(
				'action' => 'index',
				'?' => array(
					'uid' => $this->request->data['Product']['uid']
				)
			);
			*/
			//initialize the Model for updating
			$this->Product->id = $id;

			$this->request->data = $this->addCategory($this->request->data);


			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				$this->Flash->editProduct('', array('key' => 'new_product', 'params' => array('success' => true)));
				return $this->redirect($this->request->referer());
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
				$this->Flash->editProduct('', array('key' => 'new_product', 'params' => array('success' => false)));
				return $this->redirect($this->request->referer());
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}

		$this->set('productImage', $this->Product->field('image', array('Product.id' => $id )));
		$this->set('productName', $this->Product->field('name', array('Product.id' => $id )));
		$this->set('currentSubcategory', $this->Product->field('subcategory_id', array('Product.id' => $id )));
		$this->set('extraImages', $this->Product->Extraimage->getExtraImages($id));
		$categories = $this->Product->Category->find('list', array('order' => array('name' => 'ASC')));
		$stores = $this->Product->Store->find('list', array('conditions' => array('Store.user_id' => $user['id'])));
		$subcategories = $this->Product->Subcategory->find('list',  array('order' => array('name' => 'ASC')));

		$this->set(compact('categories', 'subcategories', 'stores'));
	}

	/**
	* @return void 
	* updates the main image of the product set at creation time
	*/

	public function updateDisplayImage(){
		$this->layout = 'emarket';
		$this->request->allowMethod(array('post', 'put'));

		// var_dump($this->request->data);
		// exit();

		if(!$this->Product->exists($this->request->data['Product']['id'])){
			throw new NotFoundException("such a product does not exists");
		}
		$productImageOptions = array(
            'tmpName' => $this->request->data['Product']['image']['tmp_name'],
            'mimeType' => $this->request->data['Product']['image']['type'],
            'destinationFolder' => 'product_images',
            'width' => 450,
            'height' => 450,
        	'acceptedMimeTypes' => $this->imageMimeTypes(),
        	'productImage' => true
        );

		$this->request->data['Product']['image'] = $this->Product->saveUploadedFile($productImageOptions);

		if($this->request->is(array('post', 'put', 'update'))){
			$this->Product->id = $this->request->data['Product']['id'];
			if(!empty($this->request->data['Product']['image'])){
				if($this->Product->saveField('image', $this->request->data['Product']['image'])){
					$this->Session->setFlash('image updated successfully');
					$this->Flash->editProduct('', array('key' => 'new_product', 'params' => array('success' => true)));
					return $this->redirect(array('action' => 'edit', $this->request->data['Product']['id']));
				}else{
					$this->Session->setFlash('update failed');
					$this->Flash->editProduct('', array('key' => 'new_product', 'params' => array('success' => false)));
					return $this->redirect(array('action' => 'edit', $this->request->data['Product']['id']));
				}
			}
		}
		return $this->redirect(array('action' => 'edit', $this->request->data['Product']['id']));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout = 'emarket';
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->request->referer());
	}

	public function trash($productId = null){
		$this->layout = 'emarket';
		$this->Product->id = $productId;
		if(!$this->Product->exists()){
			throw new NotFoundException('no product with such an id');
		}

		if($this->request->is(array('post', 'update', 'put'))){
			$this->Product->saveField('trashed', 1);
		}

		return $this->redirect($this->request->referer());
	}

	public function untrash($productId = null){
		$this->layout = 'emarket';
		$this->Product->id = $productId;
		if(!$this->Product->exists()){
			throw new NotFoundException('no product with such an id');
		}

		if($this->request->is(array('post', 'update', 'put'))){
			$this->Product->saveField('trashed', 0);
		}

		return $this->redirect($this->request->referer());
	}


	public function trasheditems(){
		$this->layout = 'emarket';
		$user = $this->currentUser();

		$userId = $user['id'];

		if(!$this->Product->User->exists($userId)){
			throw new NotFoundException("no user of this id exists");
		}
		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.user_id' => $userId,
				'Product.trashed' => 1
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);

		$this->loadStores();

		$this->Product->recursive = 0;
		$title = 'trashed items';
		$this->set('products', $this->Paginator->paginate());
		$this->set('pageTitle', $title);
		$this->set('title_for_layout', $title);
		$this->set('trashemptystate', true);
	}

	public function search(){
		if($this->request->is('post') && isset($this->request->data['ANDROID_SEARCH']) && $this->request->data['ANDROID_SEARCH'] == "1"){
			$rqData = $this->request->data;
			$productParams = array(
				'_q' => trim($rqData['search_text']),
				'category_id' => $rqData['category'],
				'subcategory_id' => $rqData['subcategory'],
				'priceFrom' => $rqData['min_price'],
				'priceTo' => $rqData['max_price'],
				'ANDROID' => 'android'
			);
			$this->request->data['Product'] = $productParams;
		}
		if($this->request->is(array('post'))){
			$string = trim($this->request->data['Product']['_q']);
			if(strlen($string) > 0){
			if(preg_match('/^@\w*$/', $string)){
				$shop = substr($string, 1, strlen($string));
					if(isset($this->request->data['ANDROID_SEARCH']) && $this->request->data['ANDROID_SEARCH'] == "1"){
						return $this->redirect(array('controller'=>'products', 'action' => 'sto', $shop, 'android_request'));
					}else{
						return $this->redirect(array('controller'=>'products', 'action' => 'sto', $shop));
					}
				}
				if(preg_match('/^#\w*$/', $string)){
					if(isset($this->request->data['ANDROID_SEARCH']) && $this->request->data['ANDROID_SEARCH'] == "1"){
						return $this->redirect(array('controller' => 'products', 'action' => 'hashtag', $string, 'android_request'));
					}else{
						return $this->redirect(array('controller' => 'products', 'action' => 'hashtag', $string));	
					}
					
				}
			}
		}
		$this->layout = 'public';
		$this->Prg->commonProcess();
		$params = $this->Prg->parsedParams();
		$conditions = $this->Product->parseCriteria($params);
		$conditions['NOT'] = array('Product.trashed' => 1);
		$this->Paginator->settings['conditions'] = $conditions;
		$this->Paginator->settings['limit'] = 20;
		if(isset($this->request->query['ANDROID'])){
			$this->Paginator->settings['limit'] = 100;
		}
		$this->Paginator->settings['order'] = array(
			'Product.created' => 'DESC'
		);
		$this->set('title_for_layout', 'search');
		$products = $this->Paginator->paginate();
		$this->set('products', $products);
		$this->set('productCount', $this->Product->find('count', array('conditions' => $conditions)));
		$this->set('resultsFor', $this->request->query('_q'));
		$this->set(compact('products'));
		$this->set('_serialize', 'products');
		$this->set('isSearch', true);
		// var_dump($conditions);
		if(isset($this->request->query['ANDROID'])){
			echo json_encode($this->formatProducts($products));
			exit();
		}
	}

	public function hashtag($hashtag = null, $android = null){
		$hashtag = trim($hashtag);
		$this->layout = 'public';
		if($hashtag){
			$this->set('title_for_layout', $hashtag);
			$this->set('title', $hashtag);
			// $products = $this->Product->query("SELECT * FROM products AS Product WHERE description REGEXP '$hashtag'");
			// var_dump();
			// exit();
			$this->Paginator->settings = array(
				'order' => array(
					'Product.created' => 'DESC'
				)
			);

			$products = $this->Paginator->paginate(array(
				'Product.description LIKE' => "%{$hashtag}%"
			));
			$this->set('products', $products);
			if($android && $android == 'android_request'){
				echo json_encode($this->formatProducts($products));
				exit();
			}
		}
	}

	public function advancedsearch(){
		$this->layout = 'public';
		$this->set('title_for_layout', 'advanced search');
		$this->set('categories', $this->Product->Category->find('list',  array('order' => array('name' => 'ASC'))));
		$this->set('subcategories', $this->Product->Subcategory->find('list',  array('order' => array('name' => 'ASC'))));
		$this->set('districts', $this->Product->User->District->find('list', array('order' => array('District.name' => 'ASC'))));
		$this->set(array(
			'showFooter' => false,
			'showSearchbar' => false
		));
	}
	public function store($storeId = null, $android = null){

		$this->layout = 'public';

		if(!$this->Product->Store->exists($storeId)){
			throw new NotFoundException("no such store");
			
		}
		
		$storeName = $this->Product->Store->field('name', array('Store.id' => $storeId));

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.store_id' => $storeId,
				'Product.trashed' => 0
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);
		if($android){
			$this->Paginator->settings['limit'] = 100;
		}

		$this->set('title_for_layout', $storeName);
		//retreiving the users avatar
		$userId = $this->Product->Store->field('user_id', array('id' => $storeId));
		$avatar = $this->Product->User->field('avatar', array('id' => $userId));
		$products = $this->formatProducts($this->Paginator->paginate());
		if($android && $android == 'android_request'){
			echo json_encode($products);
			exit();
		}
		$this->set('stores', $this->Product->Store->find('all', array('conditions' => array('user_id' => $userId), 'fields' => array('name', 'id'), 'order' => array('name' => 'ASC'))));
		$this->set('store', $this->Product->Store->find('first', array('conditions' => array('Store.id' => $storeId))));
		$this->set('avatar', $avatar);
		$this->set('contacts', $this->Product->User->Contact->find('first', array('conditions' => array('user_id' => $userId))));
		$this->set('owner', $this->Product->Store->field('name', array('user_id' => $userId)));
		$this->set('storeProducts', $this->Paginator->paginate());
		$this->set('storeName', $storeName);
		$this->set('storeProductCount', $this->Product->find('count', array('conditions' => array(
				'Product.store_id' => $storeId,
				'Product.trashed' => 0
		),)));
		$this->setMoreOption("categories");
		$this->set('storePage', true);

	}

	public function sto($quickAccessName = null, $android = null){
		if(!$quickAccessName){
			$quickAccessName = $this->request->params['store'];
		}
		$storeSettings = array(
			'conditions' => array(
				'Store.quick_access_name' => trim($quickAccessName)
			),
			'fields' => array('id')
		);
		$store = $this->Product->Store->recursive = -1;
		$store = $this->Product->Store->find('first', $storeSettings);
		if(!$store){
			throw new NotFoundException("No Such Store");
		}
		// var_dump($store);
		// exit();
		if($android){
			$this->redirect(array('controller' => 'products', 'action' => 'store', $store['Store']['id'], $android));
		}else{
			$this->redirect(array('controller' => 'products', 'action' => 'store', $store['Store']['id']));
		}
		
	}


	public function viewprofile($userid = null){
		$this->layout = 'public';

		$this->Product->User->id = $userid;
		
		if(!$this->Product->User->exists()){
			throw new NotFoundException("no such user");
		}

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.user_id' => $userid
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);

		$this->Product->User->unbindModel(array('hasOne' => 'District'));

		$user = $this->Product->User->find('first', array('conditions' => array('User.id' => $userid)));
		$this->set('user', $user);
		$this->set('title_for_layout', $user['User']['display_name']);
		$this->set('displayName', $this->Product->User->field('User.display_name', array('User.id' => $userid)));
		$this->set('userProducts', $this->Paginator->paginate());
	}

	public function category($categoryId = null){

		$this->layout = 'public';

		if(!$this->Product->Category->exists($categoryId)){
			throw new NotFoundException('no such category');
		}

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.category_id' => $categoryId,
				'Product.trashed' => 0
			),
			'order' => array(
				'Product.created' => 'desc'
			),
			'limit' => $this->paginatorLimit
		);
		$subcategoriesConditions = array(
			'conditions' => array(
				'Subcategory.category_id' => $categoryId 
			),
			'order' => array(
				'Subcategory.name' => 'asc'
			)
		);

		$subcategories = $this->Product->Subcategory->find('all', $subcategoriesConditions);

		$category = $this->Product->Category->field('name', array('Category.id' => $categoryId));

		$this->set('title_for_layout', $category);
		$this->set('subcategories', $subcategories);
		$this->set('category', $category);
		$this->set('products', $this->Paginator->paginate());
		$this->setMoreOption("categories");

	}

	public function subcategory($subcategoryId = null){

		$this->layout = 'public';

		if(!$this->Product->Subcategory->exists($subcategoryId)){
			throw new NotFoundException('no such subcategory');
		}

		$category = $this->Product->Subcategory->find('first', array('conditions' => array('Subcategory.id' => $subcategoryId)));

		$categoryId = $category['Category']['id'];

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.subcategory_id' => $subcategoryId,
				'Product.trashed' => 0
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => $this->paginatorLimit
		);

		$otherSubcategoriesSettings = array(
			'conditions' => array(
				'NOT' => array(
					'Subcategory.id' => $subcategoryId
				),
				'Subcategory.category_id' => $categoryId
			),
			'order' => array(
				'Subcategory.name' => 'ASC'
			)
		);

		$subcategoryName = $this->Product->Subcategory->field('name', array('Subcategory.id' => $subcategoryId));
		$this->set('category', $category);
		$this->set('title_for_layout', $subcategoryName);
		$this->set('subcategory', $subcategoryName);
		$this->set('otherSubcategories', $this->Product->Subcategory->find('all', $otherSubcategoriesSettings));
		$this->set('products', $this->Paginator->paginate());
		$this->setMoreOption("categories");
	}

	public function productpage($productId = null){

		$user = $this->currentUser();

		$this->Product->recursive = 1;

		$this->layout = 'public';

		if(!$this->Product->exists($productId)){
			throw new NotFoundException('product not found');
			// return true;
		}

		$this->set('favourited', false);

		if($user){
			$favouritedProducts = $this->Product->Favourite->find('list', array('fields' => array('product_id'), 'conditions' => array('Favourite.user_id' => $user['id'])));

			if(in_array($productId, $favouritedProducts)){
				$this->set('favourited', true);
			}
		}

		$subcategoryid = $this->Product->field('subcategory_id', array('id' => $productId));

		$productConditions = array(
			'conditions' => array(
				'Product.id' => $productId
			)
		);

		$relatedProductsCondtions = array(
			'conditions' => array(
				'Product.subcategory_id' => $subcategoryid, 
				'Product.trashed' => 0,
				'NOT' => array(
					'Product.id' => $productId
				)
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => 4
		);

		$reviewOptions = array(
			'conditions' => array(
				'Review.product_id' => $productId
			),
			'order' => array(
				'Review.modified' => 'ASC'
			),
		); 

		$product = $this->Product->find('first', $productConditions);
		$this->set('owner', $product['Store']['name']);
		$this->set('avatar', $product['User']['avatar']);
		$this->set('contacts', $this->Product->User->Contact->find('first', array('conditions' => array('user_id' => $product['User']['id']))));
		$this->set('reviews', $this->Product->Review->find('all', $reviewOptions));
		$this->set('relatedProducts', $this->Product->find('all', $relatedProductsCondtions));
		$this->set('product', $product);
		$this->set('productPage', true);
		$this->set('title_for_layout', $product['Product']['name']);
	}


	// android app api
	
	private function formatProducts($products = array(), $latest = false){
		$newProducts = array();
        foreach($products as $product){
            $product['Product']['created'] = CakeTime::timeAgoInWords($product['Product']['created']);
            $product['Product']['created_ts'] = CakeTime::gmt($product['Product']['created']);
            $product['Product']['price'] = CakeNumber::currency((float)$product['Product']['price'], null, array('wholeSymbol' => ''));
            $product['Product']['timestamp'] = time();
            $newProducts[] = $product;
        }
        return $newProducts;
    }

	public function get_all(){
		$this->Product->recursive = -1;
		$product = $this->Product->find('first');
		$this->set(compact('product'));
		$this->set('_serialize', 'product');
	}

	public function latest(){
		// $this->Product->recursive = 1;
		$lastUpdate = $this->request->query('ts');

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.trashed' => 0,
				'Product.created >' =>  date('Y-m-d H:i:s', (int)$lastUpdate)
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => 100
		);
	

		// if($lastUpdate){
		// 	$this->Paginator->settings['conditions'] = array(
		// 		'Product.created >' =>  date('Y-m-d H:i:s', (int)$lastUpdate),
		// 	);
		// }

		$products = $this->Paginator->paginate();
		$newProducts = $this->formatProducts($products);
		$this->set(compact('newProducts'));
		$this->set('_serialize', 'newProducts');
	}
	public function getbyid(){
		$this->Product->recursive = 1;
		$id = $this->request->query('pid');
		
		$this->Product->id = $id;

		if(!$this->Product->exists()){
			throw new NotFoundException("such a product does not exist");
		}

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.id' => $id
			)
		);

		$products = $this->Paginator->paginate();
		$newProducts = $this->formatProducts($products);
		$product = $newProducts[0];
		$this->set(compact('product'));
		$this->set('_serialize', 'product');
	}

	public function fromcategory(){
		// system("sleep 3000");

		$catid = $this->request->query('catid');
		
		$this->Product->Category->id = $catid;

		if(!$this->Product->Category->exists()){
			throw new NotFoundException("missing category");
		}

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.category_id' => $catid,
				'Product.trashed' => 0
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => 100
		);

		$products = $this->formatProducts($this->Paginator->paginate());
		$this->set(compact('products'));
		$this->set('_serialize', 'products');
	}

	public function fromsubcategory(){
		$subcatid = $this->request->query('subcatid');
		
		$this->Product->Subcategory->id = $subcatid;

		if(!$this->Product->Subcategory->exists()){
			throw new NotFoundException("missing category");
		}

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product.subcategory_id' => $subcatid,
				'Product.trashed' => 0
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
			'limit' => 100
		);

		$products = $this->formatProducts($this->Paginator->paginate());
		$this->set(compact('products'));
		$this->set('_serialize', 'products');
	}

	public function imagesForProduct(){
		$productId = $this->request->query('pid');
		$this->Product->id = $productId;
		if(!$this->Product->exists()){
			throw new NotFoundException("no such product exists");
		}

		$images = array();

		$mainImage = $this->Product->field('image');
		$images[] = '/img/product_images/'. $mainImage;
		
		$extraImagesSettings = array(
			'conditions' => array(
				'product_id' => $productId
			),
			'fields' => array(
				'image_name',
			)
		);
		$this->Product->Extraimage->recursive = -1;
		$extraImages = $this->Product->Extraimage->find('all', $extraImagesSettings);
		foreach($extraImages as $extraImage){
			$images[] = '/img/product_images/extra/'. $extraImage['Extraimage']['image_name'];
		}
		$this->set(compact('images'));
		$this->set('_serialize', 'images');
	}

	public function dud(){
		$date = new DateTime();
		echo $date->getTimestamp();
		exit();
	}
}
