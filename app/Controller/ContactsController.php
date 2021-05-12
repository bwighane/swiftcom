<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContactsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('ofuser');
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
			}
		}
		$users = $this->Contact->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		// var_dump($this->request->data);
		// exit();
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}

		if ($this->request->is(array('post', 'put'))) {

			$this->Contact->id = $id;
			
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The contact has been saved.'));
				$this->Flash->profileUpdate('profile updated sucessfully', array(
					'key' => 'profile_update',
					'params' => array(
						'success' => true
					)
				));
				return $this->redirect($this->request->referer());
			} else {
				$this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
				$this->Flash->profileUpdate('profile update failed', array(
					'key' => 'profile_update',
					'params' => array(
						'success' => false
					)
				));
				$this->redirect($this->request->referer());
			}
		} else {
			$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
			$this->request->data = $this->Contact->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('The contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function ofuser(){
		$userId = $this->request->query('uid');
		$this->Contact->recursive = -1;
		$contact = $this->Contact->find('all', array(
			'conditions' => array(
				'Contact.user_id' => $userId
			)
		));
		$this->set(compact('contact'));
		$this->set('_serialize', 'contact');
	}	
}