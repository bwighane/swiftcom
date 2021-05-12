<?php
App::uses('AppController', 'Controller');
/**
 * Subcategories Controller
 *
 * @property Subcategory $Subcategory
 * @property PaginatorComponent $Paginator
 */
class SubcategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('getSubcategories', 'allSubcategories');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Subcategory->recursive = 0;
		$this->set('subcategories', $this->Paginator->paginate());
		return $this->redirect('/');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
		$this->set('subcategory', $this->Subcategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subcategory->create();
			if ($this->Subcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The subcategory has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The subcategory could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Subcategory->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subcategory->save($this->request->data)) {
				$this->Session->setFlash(__('The subcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
			$this->request->data = $this->Subcategory->find('first', $options);
		}
		$categories = $this->Subcategory->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subcategory->id = $id;
		if (!$this->Subcategory->exists()) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Subcategory->delete()) {
			$this->Session->setFlash(__('The subcategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The subcategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	//get a list of subcategories give a category id

	public function getSubcategories(){

		$categoryId = $this->request->query('catid');

		$this->Subcategory->recursive = -1;

		$this->Paginator->settings = array(
			'conditions' => array(
				'category_id' => $categoryId
			),
			'order' => array(
				'name' => 'ASC'
			)
		);
		$subcategories = $this->Paginator->paginate();
		$this->set(compact('subcategories'));
		$this->set('_serialize', 'subcategories');
	}

	public function allSubcategories(){

		$this->Subcategory->recursive = -1;

		$subcategories = $this->Subcategory->find('all');
		$this->set(compact('subcategories'));
		$this->set('_serialize', 'subcategories');
	}
}
