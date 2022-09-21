<?php

	/**
	 * 
	 */
	class Controller {

		public $model;
		public $view;
		protected $data = array();	
		
		public function __construct() {
			$this->model = new Model();
			$this->view = new View();
		}

		public function index() {
			$this->data = $this->model->setQuery();
			$this->view->render($this->data);
		}
	}

?>