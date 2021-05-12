<?php
App::uses('AppController', 'Controller');
/**
 * Favourites Controller
 *
 * @property Favourite $Favourite
 * @property PaginatorComponent $Paginator
 */
class FavouritesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Favourite->recursive = 0;
		$this->set('favourites', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Favourite->exists($id)) {
			throw new NotFoundException(__('Invalid favourite'));
		}
		$options = array('conditions' => array('Favourite.' . $this->Favourite->primaryKey => $id));
		$this->set('favourite', $this->Favourite->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($productId = null) {
		if ($this->request->is('post')) {
			$user = $this->currentUser();
			$this->Favourite->create();
			$this->request->data['Favourite']['product_id'] = $productId;
			$this->request->data['Favourite']['user_id'] = $user['id'];
			if ($this->Favourite->save($this->request->data)) {
				$this->Session->setFlash(__('The favourite has been saved.'));
				return $this->redirect($this->request->referer());
			} else {
				$this->Session->setFlash(__('The favourite could not be saved. Please, try again.'));
			}
		}
		$users = $this->Favourite->User->find('list');
		$products = $this->Favourite->Product->find('list');
		$this->set(compact('users', 'products'));
		return $this->redirect($this->request->referer());
	}

	public function remove($productId = null){
		if($this->request->is(array('post', 'put', 'update'))){
			//valid request apart from the get request
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Favourite->exists($id)) {
			throw new NotFoundException(__('Invalid favourite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Favourite->save($this->request->data)) {
				$this->Session->setFlash(__('The favourite has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favourite could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Favourite.' . $this->Favourite->primaryKey => $id));
			$this->request->data = $this->Favourite->find('first', $options);
		}
		$users = $this->Favourite->User->find('list');
		$products = $this->Favourite->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($productId = null) {
		$this->Favourite->Product->id = $productId;
		if (!$this->Favourite->Product->exists()) {
			throw new NotFoundException(__('Invalid favourite'));
		}
		$this->request->allowMethod('post', 'delete');

		$user = $this->currentUser();

		$deleteConditions = array(
			'Favourite.user_id' => $user['id'],
			'Favourite.product_id' => $productId
		);
		$this->Favourite->deleteAll($deleteConditions);
		
		return $this->redirect($this->request->referer());
	}
}
