<?php


class CategoriesController extends Controller {
	
	public function __construct($data = array()) {
		parent::__construct($data);
		
		$this->model = new Category();
		
		
	}

	public function index(){
		$this->data['category'] = $this->model->getListCategory();
	}
	
	public function view(){
		$params = App::getRouter()->getParams();
		if (isset($this->params[0])) {
		$this->data['category'] = $this->model->getAllByIdCategory($this->params[0]);
			} else { 
			  Session::setFlash('Wrong page id');
			  Router::redirect('/categories/');
			}
	}


	
}