<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

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
		return $this->redirect(array('controller' => 'conversations'));
	}

	public function compose($recipient_id = null){
		$this->layout = 'public';
		if(!$this->Message->User->exists($recipient_id)){
			throw new Exception("no such user");
		}
		$this->set(array(
			'title_for_layout' => 'compose message',
			'recipient' => $this->Message->User->findById($recipient_id)
		));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$user = $this->currentUser();
			$conversationOptions = array(
				'conditions' => array(
					'Conversation.user_one_id' => $user['id'],
					'Conversation.user_two_id' => $this->request->data['Message']['recipient'],
				),
			);

			$conversation = $this->Message->Conversation->find('first', $conversationOptions);

			if(!$conversation){

				$conversationOptions = array(
					'conditions' => array(
						'Conversation.user_one_id' => $this->request->data['Message']['recipient'],
						'Conversation.user_two_id' => $user['id'],
					),
				);
				$conversation = $this->Message->Conversation->find('first', $conversationOptions);
			}

			if(!$conversation){
				$this->Message->Conversation->create();
				$conversationData = array(
					'Conversation' => array(
						'user_one_id' => $user['id'],
						'user_two_id' => $this->request->data['Message']['recipient']
					)
				);
				if($this->Message->Conversation->save($conversationData)){
					$conversation = $this->Message->Conversation->findById($this->Message->Conversation->id);
				}
			}
			$this->request->data['Message']['conversation_id'] = $conversation['Conversation']['id'];
			$this->Message->create();
			if($this->Message->save($this->request->data)){
				return $this->redirect(array('action' => 'index'));
			}
		}
		return $this->redirect($this->request->referer());
	}

	public function reply(){
		if($this->request->is(array('post'))){
			$this->Message->create();
			if($this->Message->save($this->request->data)){
				//zabhobho basi
			}else{
				//flash message bwanji apa
			}
			$this->redirect($this->request->referer());
		}else{
			return $this->redirect(array('action' => 'index'));
		}
	}


	public function conversation($conversation_id, $other_user_id){
		$this->layout = 'emarket';
		if(!$this->Message->Conversation->exists($conversation_id)){
			throw new NotFoundException("no such conversation");
		}

		if(!$this->Message->User->exists($other_user_id)){
			throw new NotFoundException("other part not found, sorry");
		}

		$otherUser = $this->Message->User->findById($other_user_id);
		$this->set(array(
			'title_for_layout' => $otherUser['User']['display_name'],
			'otherUser' => $this->Message->User->findById($other_user_id),
			'messages' => $this->Message->findAllByConversationId($conversation_id),
			'conversation_id' => $conversation_id
		));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Message->delete()) {
			return $this->flash(__('The message has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The message could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
