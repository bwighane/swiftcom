<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    var $layout = 'default';

    var $appName = 'nthambi';

    const BASE_URL = 'http://localhost:8080/swiftcom';

    public function beforeRender(){
        $this->set('appName', $this->appName);
        $this->set('searchHelpMessage', 'advanced search');
        $this->set('dude', true);
        if($this->RequestHandler->isMobile()){
            $this->set('isMobile', true);
        }
    }

    var $components = array(
    	'DebugKit.Toolbar',
        'Flash',
    	'RequestHandler',
        'Session',
        'AutoLogin',
    	'Auth'=>array(
            'loginRedirect'=>array('controller'=>'users', 'action'=>'login'),
            'logoutRedirect'=>array('controller'=>'users','action'=>'login'),
            'authError'=>'wrong username-password combination',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher'=> 'Blowfish',
                )
            )
        ),
        'Facebook',
        'Paginator'
    );

    public function beforeFilter() {
        parent::beforeFilter();

        /*$this->Autologin->settings = array(
            'model' => 'User',
            'username' => 'username',
            'password' => 'password',
            'plugin' => '',
            'controller' => 'users',
            'loginAction' => 'login',
            'logoutAction' => 'logout',
            'cookieName' => 'rememberMe',
            'expires' => '+1 month',
            'redirect' => true,
            'requirePrompt' => true
        ); */
        $user = $this->Auth->user();

        //loading the current notifications pending user reading
        if($this->Auth->loggedIn()){
            $this->loadModel('Notification');
            $notificationCount = $this->Notification->find('count', array(
                'conditions' => array(
                    'Notification.recipient_id' => $user['id'],
                    'Notification.read' => 0
                )
            ));
            $this->set('notificationCount', $notificationCount);
        }
        $this->set(array(
            'user' => $user,
            'loggedIn' => $this->Auth->loggedIn(),
            'isMobile' => $this->RequestHandler->isMobile(),
            'showFooter' => true,
            'showSearchbar' => true
        ));
    }

    public function currentUser(){
        return $this->Auth->user();
    }
    
    public function imageMimeTypes(){
        return array(
            'image/jpg',
            'image/jpeg',
            'image/png', 
            'image/png'
        );
    }

    public function loadStores(){

        $this->loadModel('Store');
        $user = $this->currentUser();

        $stores = $this->Store->find(
            'all', 
            array(
                'conditions' => array(
                    'user_id' => $user['id']
                ),
                'order' => array(
                    'name' => 'ASC'
                ),
                'fields' => array('name', 'id')
            )
        );

        $this->set('storesList', $stores);
    }

    public function catProductCount($categories = array()){
        // $this->loadModel('Subcategory');
        // $this->loadModel('Category');
        // $newCategories = array();
        // foreach($categories as $category){
        //     $subcategories = $this->Subcategory->find(
        //         'all',
        //         array(
        //             'conditions' => array(
        //                 'category_id' => $category['Category']['id']
        //             ),
        //             'fields' => array(
        //                 'product_count'
        //             )
        //         )
        //     );
        //     $sum = 0;
        //     foreach($subcategories as $subcategory){
        //         $sum += (integer)$subcategory['Subcategory']['product_count'];
        //     }
        //     $category['Category']['sum'] = $sum;
        //     $newCategories[] = $category;
        // }
        // return $newCategories;
    }

    // public function incrementSubcategoryCount($subcategoryId){
    //     $this->loadModel('Subcategory');
    //     $count = (integer)$this->Subcategory->field('product_count', array('id' => $subcategoryId));
    //     $this->Subcategory->read('product_count', $subcategoryId);
    //     $this->Subcategory->set('product_count', ++$count);
    //     $this->Subcategory->save();
    // }

    public function setMoreOption($more){
        if($this->RequestHandler->isMobile()){
            $this->set('more', $more);
            $this->set('isMobile', true);
        }
    }

    

}
?>