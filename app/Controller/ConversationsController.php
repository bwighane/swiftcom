<?php
App::uses('AppController', 'Controller');
/**
 * Conversations Controller
 *
 * @property Conversation $Conversation
 * @property PaginatorComponent $Paginator
 */
class ConversationsController extends AppController {

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
		$this->layout = 'emarket';
		$user = $this->currentUser();
		$this->Conversation->recursive = 0;
		$this->Paginator->settings = array(
			'conditions' => array(
				'OR' => array(
					'Conversation.user_one_id' => $user['id'],
					'Conversation.user_two_id' => $user['id']
				)
			),
			'order' => array(
				'Conversation.modified' => 'DESC'
			)
		);

		$this->set('conversations', $this->addLastConversationLastMessage($this->Paginator->paginate()));
	}

	private function addLastConversationLastMessage($conversations = array()){
		$_conversations = array();
		foreach($conversations as $conversation){
			$this->Conversation->Message->recursive = -1;
			$messageConditions = array(
				'conditions' => array(
					'Message.conversation_id' => $conversation['Conversation']['id'],
				),
				'order' => array(
					'Message.created' => 'DESC'
				)
			);

			$message = $this->Conversation->Message->find('first', $messageConditions);
			$conversation['LastMessage'] = $message;
			$_conversations[] = $conversation;
		}

		return $_conversations;
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Conversation->id = $id;
		if (!$this->Conversation->exists()) {
			throw new NotFoundException(__('Invalid conversation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Conversation->delete()) {
			$this->Session->setFlash(__('The conversation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conversation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
