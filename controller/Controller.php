<?php

	/**
	 * 
	 */
	class Controller {
		
		public function __construct() {
			$this->model = new Model();
			$this->view = new View();
		}

		public function index() {
			$this->data = $this->model->setQuery("games");
			$this->view->render($this->data);
		}
	}

?>