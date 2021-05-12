<?php
App::uses('AppController', 'Controller');
/**
 * Reviews Controller
 *
 * @property Review $Review
 * @property PaginatorComponent $Paginator
 */
class ReviewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
		$this->set('review', $this->Review->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$user = $this->currentUser();
		if ($this->request->is('post')) {
			$this->Review->create();
			$this->request->data['Review']['user_id'] = $user['id'];
			if ($this->Review->save($this->request->data)) {

//				$this->Review->Product->id = $this->request->data['Review']['product_id'];
				$conditions = array(
					'Product.id' => $this->request->data['Review']['product_id']
				);
				$productTitle = $this->Review->Product->field('name', array('Product.id' => $this->request->data['Review']['product_id']));
				$recipient = $this->Review->Product->field('user_id',$conditions);
				if($recipient != $user['id']){
					$this->Review->Product->User->recursive = -1;
					$notification = array(
						'Notification' => array(
							'title' => $user['display_name'] . ' commented on your post ' . '\'' . $productTitle . '\'',
							'recipient_id' => $recipient,
							'user_id' => $user['id'],
							'description' => $this->request->data['Review']['review'],
							'redirect_url' => $this->request->data['Notification']['redirect_url']
						)
					);
					$this->Review->User->Notification->create();
					if($this->Review->User->Notification->save($notification)){
						//saved successfully
					}else{
						return $this->redirect($this->request->referer());
					}
				}
				return $this->redirect(array('controller' => 'products', 'action' => 'productpage', $this->request->data['Review']['product_id'], '#' => 'product-reviews'));
			} else{
				return $this->redirect($this->request->referer());
			}
		}
		return $this->request->referer();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Review->exists($id)) {
			throw new NotFoundException(__('Invalid review'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Review->save($this->request->data)) {
				$this->Session->setFlash(__('The review has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The review could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Review.' . $this->Review->primaryKey => $id));
			$this->request->data = $this->Review->find('first', $options);
		}
		$users = $this->Review->User->find('list');
		$products = $this->Review->Product->find('list');
		$this->set(compact('users', 'products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Review->id = $id;
		if (!$this->Review->exists()) {
			throw new NotFoundException(__('Invalid review'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Review->delete()) {
			$this->Session->setFlash(__('The review has been deleted.'));
		} else {
			$this->Session->setFlash(__('The review could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
