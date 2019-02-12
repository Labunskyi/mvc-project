<?php

class UsersController extends Controller {
	
	public function __construct($data = array()) {
		parent::__construct($data);
		$this->model = new User();
	}
		
	//user block
	public function login(){
		if ($_POST) {
			$user = $this->model->getByLogin($_POST['login']);
			$hash = md5(Config::get('salt') . $_POST['password']); 
			
			if ($_POST['login'] == $user['login'] && $hash == $user['password']) {
				Session::set('login', $user['login']); 
				Router::redirect('/');
								
			} else {Session::setFlash('Login or password is not valid');}
			
		}
	}
	
	public function register(){
		if ($_POST) {
			
			$user = $this->model->getByLogin($_POST['login']);
			$email = $this->model->getByEmail($_POST['email']);
			 
			if ($user || $email){
                Session::setFlash('Please try another login or email');
				
            } else {
				$new_user = $this->model->save($_POST);
				
				$new_user = $this->model->getByLogin($_POST['login']);
				Session::set('login', $new_user['login']);
                Router::redirect('/');
			}
            			
		}
	}
	
	public function logout(){
		Session::destroy();
		Router::redirect('/');
	}
	
	// admin block
	public function admin_login(){
		if ($_POST) {
			$user = $this->model->getByLogin($_POST['login']);
			$hash = md5(Config::get('salt').$_POST['password']);
			if ($hash == $user['password']) {
				Session::set('login', $user['login']); 
				Session::set('role', $user['role']);
				Router::redirect('/admin/books/index');
			}
			
		}
	}
	
	public function admin_logout(){
		Session::destroy();
		Router::redirect('/admin/users/login');
	}
}