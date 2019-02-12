<?php


class WritersController extends Controller {
	
	public function __construct($data = array()) {
		parent::__construct($data);		
		$this->model = new Writer();
	}

	public function index(){
		
		$this->data['writers'] = $this->model->getListWriter();	
	}
	
	public function view(){
		$params = App::getRouter()->getParams();
		if (isset($this->params[0])) {
		$this->data['writer'] = $this->model->getBooksListByAliasWriter($this->params[0]);
		
			} else { 
			  Session::setFlash('Wrong page id');
			  Router::redirect('/writers/');
			}
	}

}