<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('AppModel', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */

	public $components = array('Paginator', 'Session', 'Auth');

	public $uses = array();

	public $layout = 'public';

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow();
	}

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	public function home(){
		// $this->layout = 'templates';
		$this->layout = 'landing';
		$this->loadModel('Product');
		$this->set('products', $this->Product->find('all', array('order' => array('Product.created' => 'DESC'), 'limit' => 6, 'conditions' => array(
				'Product.trashed' => 0
		))));
		$this->loadModel('Category');
		$this->Category->unbindModel = array(
			'Product'
		);
		// $this->Category->recursive = 0;
		$categoriesSettings = array(
			'fields' => array(
				'name', 'id', 'image'
			),
			'order' => array(
				'Category.name' => 'ASC'
			)
		);
		$this->set('title_for_layout', $this->appName);
		$this->set('categories', $this->Category->find('all', $categoriesSettings));
	}

	public function categorylist(){
		$this->loadModel('Category');
		$this->Category->unbindModel(array('hasMany' => array('Product')));
		$this->Category->recursive = 1;
		$categoriesSettings = array(
			'hasMany' => array(
				'Subcategory' => array(
					'order' => array(
						'Sucategory.name' => 'ASC'
					)
				)
			),
			'fields' => array(
				'name', 'id', 'image', 'product_count'
			),
			'order' => array(
				'Category.name' => 'ASC'
			)
		);
		
		
		$this->set('categories', $this->Category->find('all', $categoriesSettings));
		$this->set('title_for_layout', 'all categories');
	}
	public function about(){
		$this->set('title_for_layout', 'About');
		$this->set(array(
			'title_for_layout' => 'about',
			'showSearchbar' => false
		));
	}

	public function termsofuse(){
		$this->set(array(
			'title_for_layout' => 'terms of service',
			'showSearchbar' => false
		));
	}

	public function phpinfo(){}

	public function download(){
		$this->set('title_for_layout', 'Download Application');
		$this->layout = 'download';
		$download = $this->request->query('appd');
		if($download){
			$path = 'webroot' . DS . 'downloads' . DS . 'Nthambi_Shopping.apk';
		    $this->response->file($path, array(
		        'download' => true,
		        'name' => 'Nthambi Shopping.apk',
		        'extension' => 'apk'
		    ));
		    return $this->response;
		}
	}

	public function faq(){
		$this->set(array(
			'title_for_layout' => 'faq',
			'showSearchbar' => false
		));
	}
}
