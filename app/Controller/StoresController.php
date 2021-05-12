<?php
App::uses('AppController', 'Controller');
/**
 * Stores Controller
 *
 * @property Store $Store
 * @property PaginatorComponent $Paginator
 */
class StoresController extends AppController {

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
		$user = $this->currentUser();
		$this->Store->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array(
				'Store.user_id' => $user['id']
			),
			'order' => array(
				'Store.name' => 'ASC'
			)
		);
		$this->loadStores();
		$this->set('stores', $this->Paginator->paginate());
		$districts = $this->Store->District->find('list', array('order' => array('District.name' => 'ASC')));
		$this->set(compact('districts'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
		$this->set('store', $this->Store->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$user =  $this->currentUser();
		if ($this->request->is('post')) {
			$this->Store->create();
			$this->request->data['Store']['user_id'] = $user['id'];
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'));
			}
		}
		$districts = $this->Store->District->find('list', array('order' => array('District.name' => 'ASC')));
		$this->set(compact('districts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Store->exists($id)) {
			throw new NotFoundException(__('Invalid store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Store->id = $id;
			if ($this->Store->save($this->request->data)) {
				$this->Session->setFlash(__('The store has been saved.'));
				$this->Flash->profileUpdate('profile updated sucessfully', array(
					'key' => 'profile_update',
					'params' => array(
						'success' => true
					)
				));
				return $this->redirect(array('action' => 'edit', 'controller' => 'users'));
			} else {
				$this->Flash->profileUpdate('profile updated sucessfully', array(
					'key' => 'profile_update',
					'params' => array(
						'success' => false
					)
				));
				$this->Session->setFlash(__('The store could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Store.' . $this->Store->primaryKey => $id));
			$this->request->data = $this->Store->find('first', $options);
		}
		return $this->redirect(array('action' => 'edit', 'controller' => 'users'));
	}

/**
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Store->id = $id;
		if (!$this->Store->exists()) {
			throw new NotFoundException(__('Invalid store'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Store->delete()) {
			$this->Session->setFlash(__('The store has been deleted.'));
		} else {
			$this->Session->setFlash(__('The store could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
