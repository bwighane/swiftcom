<?php
App::uses('AppController', 'Controller');
/**
 * Extraimages Controller
 *
 * @property Extraimage $Extraimage
 * @property PaginatorComponent $Paginator
 */
class ExtraimagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('getImagesList');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Extraimage->exists($id)) {
			throw new NotFoundException(__('Invalid extraimage'));
		}
		$options = array('conditions' => array('Extraimage.' . $this->Extraimage->primaryKey => $id));
		$this->set('extraimage', $this->Extraimage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			$imageOptions = array(
                'tmpName' => $this->request->data['Extraimage']['image_name']['tmp_name'],
                'mimeType' => $this->request->data['Extraimage']['image_name']['type'],
                'destinationFolder' => 'product_images' . DS . 'extra',
                'width' => 450,
                'height' => 450,
	        	'acceptedMimeTypes' => $this->imageMimeTypes(),
            );

            $this->request->data['Extraimage']['image_name'] = $this->Extraimage->saveUploadedFile($imageOptions);
            $this->request->data['Extraimage']['product_id'] = $this->request->data['Product']['id'];

            if(!empty($this->request->data['Extraimage']['image_name'])){
            	$this->Extraimage->create();
				if ($this->Extraimage->save($this->request->data)) {
					$this->Session->setFlash(__('The extraimage has been saved.'));
					return $this->redirect(array('action' => 'edit', 'controller' => 'products', $this->request->data['Product']['id'],  '#' => 'more-images'));
				} else {
					$this->Session->setFlash(__('The extraimage could not be saved. Please, try again.'));
					return $this->redirect(array('action' => 'edit', 'controller' => 'products', $this->request->data['Product']['id']));
				}
            }
		}
		return $this->redirect(array('action' => 'edit', 'controller' => 'products', $this->request->data['Product']['id']));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Extraimage->exists($id)) {
			throw new NotFoundException(__('Invalid extraimage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Extraimage->save($this->request->data)) {
				$this->Session->setFlash(__('The extraimage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extraimage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Extraimage.' . $this->Extraimage->primaryKey => $id));
			$this->request->data = $this->Extraimage->find('first', $options);
		}
		$products = $this->Extraimage->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Extraimage->id = $id;
		if (!$this->Extraimage->exists()) {
			throw new NotFoundException(__('Invalid extraimage'));
		}
		$this->request->allowMethod('post', 'delete');

		$filename = $this->Extraimage->field('image_name', array('Extraimage.id' => $id));

		if ($this->Extraimage->delete()) {
			$this->Extraimage->deleteExtraImage($filename);
			$this->Session->setFlash(__('The extraimage has been deleted.'));
			return $this->redirect($this->request->referer());
		} else {
			$this->Session->setFlash(__('The extraimage could not be deleted. Please, try again.'));
			return $this->redirect($this->request->referer());
		}
		return $this->redirect($this->request->referer());
	}

	public function getImagesList(){

		$pid = $this->request->query('pid');

		$this->Extraimage->recursive=  -1;

		$this->Extraimage->unbindModel(array('belongsTo' => array('Product')));

		$settings = array(
			'conditions' => array(
				'Extraimage.product_id' => $pid
			),
			'fields' => array('image_name')
		);

		$images = $this->Extraimage->find('all', $settings);

		$this->set(compact('images'));
		$this->set('_serialize', 'images');
	}
}
