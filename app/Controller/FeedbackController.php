<?php
App::uses('AppController', 'Controller');
/**
 * Feedback Controller
 *
 * @property Feedback $Feedback
 * @property PaginatorComponent $Paginator
 */
class FeedbackController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Feedback->create();
			if ($this->Feedback->save($this->request->data)) {
				$this->Session->setFlash(__('The feedback has been saved.'));
			} else {
				$this->Session->setFlash(__('The feedback could not be saved. Please, try again.'));
			}
		}
		return $this->redirect($this->request->referer());
	}
}
