<?php
	class TemplatesController extends AppController{

		public $useTable = false;

		public $layout = 'templates';

		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('carousel', 'template');
			$this->Components->unload('DebugKit.Toolbar');
		}

		public function carousel(){
			$this->Components->unload('DebugKit.Toolbar');
		}

		public function template(){
		}
	}
?>