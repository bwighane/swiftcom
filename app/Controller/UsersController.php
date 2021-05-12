<?php
App::uses('AppController', 'Controller');
App::uses('Validation', 'Utility');
App::import('Vendor', 'Facebook', array('file' => 'Facebook/Facebook.php'));
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */

	public $components = array('Paginator', 'Session', 'Flash');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login', 'add', 'viewprofile', 'user', 'facebooklogin');
	}

	public function login(){
		$this->layout = 'public';
		$this->set('title_for_layout', 'login');
		if($this->Auth->loggedIn()){
			$this->redirect(array('controller' => 'products', 'action' => 'index'));
		}
		//either the user has filled the login form or login in using facebook or has created a new account
		if ($this->request->is('post') || $this->Session->read('facebookLogin') || $this->Session->read('directLogin')){
			if($this->Session->read('facebookLogin') || $this->Session->read('directLogin')){
				$this->request->data = array(
					'User' => [
						'username' => $this->Session->read('username'),
						'password' => $this->Session->read('password'),
						'auto_login' => $this->Session->read('auto_login')
					]
				);
			}

			if ($this->Auth->login()) {
				$user = $this->currentUser();
				$this->User->id = $user['id'];
				if($this->User->field('new') == 1){
					$this->User->saveField('new', 0);
					$this->cleanUserSession();
					$this->redirect(array('action' => 'newuser'));
				}
				$this->cleanUserSession();
				return $this->redirect(array('controller' => 'products', 'action' => 'index'));
			}else{
				$this->Flash->loginFailed('invalid login credentials, try again', array('key' => 'login'));
				if($this->Session->read('facebookLogin')){
					$this->cleanUserSession();
					throw new Exception("Failed to login using you facebook account, try again");
				}
				$this->cleanUserSession();
			}
			// $this->Session->setFlash(__('Invalid username or password, try again'));
		}
		$this->set(array(
			'showFooter' => false,
			'showSearchbar' => false,
			'facebookLoginUrl' => $this->Facebook->getLoginUrl()
		));
  	}

  	public function facebooklogin(){
  		$facebook = $this->Facebook->getFacebook();

  		$helper = $facebook->getRedirectLoginHelper();

		try {
		    $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		    // When Graph returns an error
		    echo 'Graph returned an error: ' . $e->getMessage();
		    exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		    // When validation fails or other local issues
		    echo 'Facebook SDK returned an error: ' . $e->getMessage();
		    exit;
		}

		if (! isset($accessToken)) {
		    if ($helper->getError()) {
		        header('HTTP/1.0 401 Unauthorized');
		        echo "Error: " . $helper->getError() . "\n";
		        echo "Error Code: " . $helper->getErrorCode() . "\n";
		        echo "Error Reason: " . $helper->getErrorReason() . "\n";
		        echo "Error Description: " . $helper->getErrorDescription() . "\n";
		    } else {
		        header('HTTP/1.0 400 Bad Request');
		        echo 'Bad request';
		    }
		    exit;
		}

		// Logged in
		// echo '<h3>Access Token</h3>';
		// var_dump($accessToken->getValue());

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $facebook->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		// echo '<h3>Metadata</h3>';
		// var_dump($tokenMetadata);

		if (!$accessToken->isLongLived()) {
		    try {
		        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		    } catch (Facebook\Exceptions\FacebookSDKException $e) {
		        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
		        exit;
		    }
		}

		$facebook->setDefaultAccessToken($accessToken);

		try {
		    $response = $facebook->get('/me?fields=name,email');
		    $fbuser = $response->getGraphUser();

		    if($fbuser['email']){
		    	//make some change to set default contact email
		    	$this->Session->write('fbPublicEmail', $fbuser['email']);
		    }
		    $userEmail = 'fb'.$fbuser['id'].'@facebook.com';

		    //user already has an account with the platform
		    if($this->User->findByUsername($userEmail)){
		    	$this->Session->write('username', $userEmail);
		    	$this->Session->write('password', $fbuser['id']);
		    	$this->Session->write('auto_login', '1');
		    	$this->Session->write('facebookLogin', '1');
		    	$this->redirect(array('action' => 'login'));
		    }else{

			    $this->Session->write('username', 'fb'.$fbuser['id'].'@facebook.com');
			    $this->Session->write('display_name', $fbuser['name']);
			    $this->Session->write('password', $fbuser['id']);
			    $this->Session->write('facebookRegister', '1');

			    $this->redirect(array('action' => 'add'));
		    }    

		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		    throw new Exception("facebook graph returned an error,try again " . $e->getMessage());
		    
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		   throw new Exception("facebook api returned an error,try again " . $e->getMessage());
		}

  	}

	public function logout(){
		$this->Session->destroy();
		return $this->redirect($this->Auth->logout());
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
		$this->loadStores();
	}

	public function tostore($user_id = null){
		if(!$this->User->exists($user_id)){
			throw new NotFoundException("no such user");
		}
		$store = $this->User->Store->find('first', array(
			'conditions' => array(
				'Store.user_id' => $user_id
			),
			'order' => array(
				'Store.created' => 'ASC'
			)
		));
		if($store){
			return $this->redirect(array('controller' => 'products', 'action' => 'store', $store['Store']['id']));
		}else{
			return $this->redirect($this->request->referer());
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add(){
		$this->layout = 'public';
		if($this->Auth->loggedIn()){
			return $this->redirect(array('controller' => 'products', 'action' => 'index'));
		}

		//The facebookRequest session variable is set if a user is login in via facebook
		if ($this->request->is('post') || $this->Session->read('facebookRegister')){

			if($this->Session->read('facebookRegister')){
				$this->request->data = array(
					'User' => array(
						'display_name' => $this->Session->read('display_name'),
						'password' => $this->Session->read('password'),
						'passwordConfirm' => $this->Session->read('password'),
						'username' => $this->Session->read('username'),
					)
				);
			}
            
            $this->request->data['User']['avatar'] = 'default-avatar.png';
            
			if ($this->User->save($this->request->data)) {

				//create a necessary record in the contact table

				$this->User->Contact->create();
				$this->request->data['Contact']['user_id'] = $this->User->id;


				//The facebook user may at times not have his/her email address field
				if(!$this->Session->read('facebookRegister')){
					if(Validation::email($this->request->data['User']['username'])){
						$this->request->data['Contact']['email_address'] = $this->request->data['User']['username'];
					}else{
						$this->request->data['Contact']['phone'] = $this->request->data['User']['username'];
					}
				}else{
					if($this->Session->read('fbPublicEmail')){
						$this->request->data['Contact']['email_address'] = $this->Session->read('fbPublicEmail');
					}
				}
				
				if($this->User->Contact->save($this->request->data)){
					$this->User->Store->create();
					$this->request->data['Store']['user_id'] = $this->User->id;
					$this->request->data['Store']['name'] = $this->request->data['User']['display_name'];
					if($this->User->Store->save($this->request->data)){
						$this->Session->setFlash(__('user created successfully'));

						//log in the newly created user after registering

						$this->Session->write('directLogin', '1');
						$this->Session->write('username', $this->request->data['User']['username']);
						$this->Session->write('password', $this->request->data['User']['password']);
						$this->Session->write('auto_login', $this->request->data['User']['auto_login']);
						return $this->redirect(array('action' => 'login'));
					}
				}
			} else {
				if($this->Session->read('facebookRegister')){
					$this->cleanUserSession();
					throw new Exception("failed to setup you facebook login");
				}
				$this->Session->setFlash(__('could not create new store, try again'));
			}
			$this->cleanUserSession();
		}
        
		$districts = $this->User->District->find('list', array('order' => array('District.name' => 'ASC')));
        
		$this->set(compact('districts'));
		$this->set('title_for_layout', 'Register');
		$this->set(array(
			'showFooter' => false,
			'showSearchbar' => false
		));
	}

	private function cleanUserSession(){
		$this->Session->delete('facebookRegister');
		$this->Session->delete('display_name');
		$this->Session->delete('username');
		$this->Session->delete('password');
		$this->Session->delete('fbPublicEmail');
		$this->Session->delete('auto_login');
		$this->Session->delete('facebookLogin');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit() {
		$this->layout = 'emarket';
		$user = $this->currentUser();

		$id = $user['id'];

		$this->set('title_for_layout', 'edit profile');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}

		$this->User->set($this->request->data);
		$this->User->Contact->set($this->request->data);

		if(!$this->User->validates() || !$this->User->Contact->validates()){
			$this->Session->setFlash('validation amwene');
			return $this->redirect($this->request->referer());
		}
		if ($this->request->is(array('post', 'put'))) {

			$this->User->id = $id;

			if ($this->User->save($this->request->data)) {
				$this->Flash->profileUpdate('profile updated sucessfully', array(
					'key' => 'profile_update',
					'params' => array(
						'success' => true
					)
				));
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect($this->request->referer());
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				$this->Flash->profileUpdate('profile update failed', array(
					'key' => 'profile_update',
					'params' => array(
						'success' => false
					)
				));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		//the contacts id
		$contactId = $this->User->Contact->field('id', array('Contact.user_id' => $id));
		$storeId = $this->User->Store->field('id', array('Store.user_id' => $id));
		$this->set('storeId', $storeId);
		$this->set('contactId', $contactId);
		$this->loadStores();
		$districts = $this->User->District->find('list', array('order' => array('District.name' => 'ASC')));
		$this->set(compact('districts'));
		$contacts = $this->request->data = $this->User->Contact->find('first', array('conditions' => array('Contact.id' => $contactId)));
		$stores = $this->User->Store->find('first', array('conditions' => array('Store.user_id' => $id)));
		$storeContact = array_merge($contacts, $stores);
		$this->request->data = $storeContact;
		// $this->request->data = $this->User->Store->find('first', array('conditions' => array('Store.user_id' => $id)));
		// $this->set('contact', $this->User->Contact->find('first', array('conditions' => array('Contact.id' => $contactId))));
	}


	public function settings(){
		$this->layout = 'emarket';
	}

	public function newuser(){
		$this->layout = 'emarket';
	}

	/*
	* this method changes the profile picture of the user by deleting the previous 
	  and replacing it with the new one
	  @param string $id
	  @return void
	*/

	 public function changeAvatar($id = null){
	 	$this->layout = 'emarket';
	 	if(!$this->User->exists($id)){
	 		throw new NotFoundException('user does not exist');
	 	}

	 	$imageSaveData = array(
	        'tmpName' => $this->request->data['User']['avatar']['tmp_name'],
	        'mimeType' => $this->request->data['User']['avatar']['type'],
	        'destinationFolder' => 'avatars',
	        'width' => 200,
	        'height' => 200,
	        'acceptedMimeTypes' => $this->imageMimeTypes()
        );

        $avatar = $this->User->saveUploadedFile($imageSaveData);

        $currentAvatar = $this->User->field('User.avatar', array('User.id' => $id));

        if($avatar != ''){
        	$this->User->id = $id;
        	$this->request->data['User']['avatar'] = $avatar;

        	if($this->User->save($this->request->data)){
        		$this->User->deleteAvatar($currentAvatar);
        		$this->Session->setFlash('profile picture updated');
        		return $this->redirect($this->Auth->logout());
        	}else{
        		$this->Session->setFlash('failed to process the request further');
				return $this->redirect(array('action' => 'edit'));
        	}
        }else{
        	$this->Session->setFlash('no changes applied, empty image');
			return $this->redirect(array('action' => 'edit'));
        }
        return $this->redirect(array('action' => 'edit'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function viewprofile($userid = null){

		$this->User->id = $userid;

		if(!$this->User->exists()){
			throw new NotFoundException('no such user');
		}

		$this->layout = 'public';

		$this->Paginator->settings = array(
			'conditions' => array(
				'Product' => array(
					'Product.user_id' => $userid,
				)
			),
		);

		$this->set('userProducts', $this->Paginator->paginate());
	}

	public function contactpage($userId = null){
		if(!$this->User->exists($userId)){
			throw new NotFoundException("no such user exists");
		}
		// $this->set('avatar', $this->);
		$this->set('contacts', $this->User->Contact->find('first', array('conditions' => array('user_id' => $userId))));
	}

	public function tag($tag = null){
		echo $tag;
		exit();
	}

	//android API calls

	public function user(){
		$userId = $this->request->query('uid');
		$this->User->recursive = -1;
		$user = $this->User->find('all', array(
			'conditions' => array(
				'User.id' => $userId
			),
		));
		$this->set(compact('user'));
		$this->set('_serialize', 'user');
	}
}
