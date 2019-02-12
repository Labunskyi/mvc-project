<?php 

class SearchesController extends Controller {
	
	public function __construct($data = array() ) {
		parent::__construct($data);
		$this->model = new Search();
	}
	
	public function index() {
		if (!empty($_POST['referal'])) {
			
			$this->data = $this->model->getBooksByFilter($_POST['referal']);
			
		
		}	
		
	}

}