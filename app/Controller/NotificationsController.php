<?php
App::uses('AppController', 'Controller');
/**
 * Notifications Controller
 *
 * @property Notification $Notification
 * @property PaginatorComponent $Paginator
 */
class NotificationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$user = $this->currentUser();
		$this->layout = 'emarket';
		$this->Notification->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array(
				'recipient_id' => $user['id'],
			),
			'order' => array(
				'Notification.created' => 'DESC'
			),
			'limit' => 20
		);
		$this->set('notifications', $this->Paginator->paginate());
		$this->Notification->updateAll(array('Notification.read' => 1), array('Notification.recipient_id' => $user['id']));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 */
	public function view($id = null) {
		if (!$this->Notification->exists($id)) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$this->_markasread($id);
		return $this->redirect($this->Notification->field('redirect_url', array('id' => $id)));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Notification->create();
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'));
			}
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
		if (!$this->Notification->exists($id)) {
			throw new NotFoundException(__('Invalid notification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Notification->save($this->request->data)) {
				$this->Session->setFlash(__('The notification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notification could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Notification.' . $this->Notification->primaryKey => $id));
			$this->request->data = $this->Notification->find('first', $options);
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
		$this->Notification->id = $id;
		if (!$this->Notification->exists()) {
			throw new NotFoundException(__('Invalid notification'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Notification->delete()) {
			$this->Session->setFlash(__('The notification has been deleted.'));
		} else {
			$this->Session->setFlash(__('The notification could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function markasread($id = null){
		if(!$this->Notification->exists($id)){
			throw new NotFoundException('no such notification in the system');
		}
		$this->_markasread($id);
		return $this->redirect(array('action' => 'index'));
	}

	private function _markasread($id){
		$this->Notification->id = $id;
		$this->Notification->saveField('read', 1);
	}
}
