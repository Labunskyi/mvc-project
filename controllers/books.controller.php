<?php

class BooksController extends Controller {
	
	public function __construct($data = array()) {
		parent::__construct($data);
		
		$this->model = new Book();
		
	}
	// user block
	public function index() {
				
		if (isset($_GET['page'])) {
		$page = $_GET['page'] - 1 ;
		}
		$page = !isset($page) ? 0 : $page;
		$this->data['books'] = $this->model->getList($page);
		
	}
	
	public function view() {
		
		$params = App::getRouter()->getParams();
		
		if (isset($this->params[0])) {
		
		$alias = strtolower($this->params[0]);
		$this->data['book'] = $this->model->getByAlias($alias);

		$this->data['writers'] = $this->model->getWriterNameByAliasBook($alias);
		
			} else { 
			  Session::setFlash('Wrong page id');
			  Router::redirect('/books/');
			}
		$this->model->insert_visit($alias);
		$this->data['counter'] = $this->model->counter($alias);
		
		$this->model = new Commentary();
		$this->data['commentaries'] = $this->model->getCommentsList($this->params[0]);
        		
		if( isset($_POST['commentary']) && !empty($_POST['commentary'])){
                
                $this->model->addComment(Session::get('login'), $this->params[0], $_POST['commentary']);
                Router::redirect("/books/view/{$alias}");
            }
			
		$this->model = new Sell();
		        		
		if($_POST && !empty($_POST['quantity']) && !empty($_POST['phone'])){
                
                $this->model->addSell(Session::get('login'), $this->params[0], $_POST['quantity'], $_POST['phone']);
				$to = "email@example.com"; 
				$first_name = $_POST['first_name'];
				$subject = "Form submission";
				$item = $this->params[0];
				$message = "Good day!" . Session::get('login') . " bue the following: " . "\n\n" . $item . " quantity " . $_POST['quantity'] .
				" His phone: " . $_POST['phone'];
				$headers = "From:" . Session::get('login');
				mail($to,$subject,$message,$headers);
				
                Router::redirect("/books/view/{$alias}");
            }
     }
	 
	 // admin block
	 public function admin_index() {
		 
		 $this->data['books'] = $this->model->getAdminList();
		 
	 }
	 
	 public function admin_edit() {
		 $this->data['category'] = $this->model->getListCategory();
		 
		 
		 if ($_POST) {
			
			$id = $_POST['id'];
			if (!empty($_FILES['image']['name'])) {
			$image = $this->model->uploadedFile($_FILES);
			}
			if ($this->model->save($_POST, $id, $image)) {
				Session::setFlash('Page was saved');
				
			}
			Router::redirect('/admin/books/');
		 }
		 
		 if (isset($this->params[0])) {
			 
		 
		 $this->data['book'] = $this->model->getById($this->params[0]);
		 
		 $alias = strtolower($this->params[0]);
		

		$this->data['writers'] = $this->model->getWriterNameByAliasBook($alias);
		 		 
		 } else {
			  Session::setFlash('Wrong page id');
			  
			  Router::redirect('/admin/books/');
		 }
		 }
	 
	 public function admin_add() {
		 $this->data['category'] = $this->model->getListCategory();
		 $this->data['writers'] = $this->model->getListWriter();
		 
		 if ($_POST) {
			
			if (!empty($_FILES['image']['name']) ) {
                $image = $this->model->uploadedFile($_FILES);
            }
			$image = isset($image) ? $image : null;
			$result = $this->model->save($_POST, $image);
			if ($result) {
                Session::setFlash('Page was saved.');
				
            } else {
                Session::setFlash('Error.');
            }
			Router::redirect('/admin/books/');
		 }
	 }
	 
	 public function admin_delete(){
		 if (isset($this->params[0])) {
			$result = $this->model->delete($this->params[0]);
			if ($result) {
				Session::setFlash('Page was delete');
			} else {
				Session::setFlash('Error');
				
			}
			Router::redirect('/admin/books/');
		}	 
				
	 }
	 
	 
	 // ---> Start Section "Category"
	 public function admin_category() {
		 $this->data['category'] = $this->model->getListCategory();
		 
		 if ($_POST) {
		    
			$result = $this->model->saveCategory($_POST);
			if ($result) {
                Session::setFlash('Page was saved.');
			} else {
                Session::setFlash('Error.');
            }
			Router::redirect('/admin/books/category');
		 }
	 }
	 
	 public function admin_deletecategory(){
		 if (isset($this->params[0])) {
			
			$result = $this->model->deleteCategory($this->params[0]);
			if ($result) {
				
				Session::setFlash('Category was delete');
				
			} else {
				Session::setFlash('Error');
			}
		}
		Router::redirect('/admin/books/category');
				
	 }
	 
	 // <--- End Section "Category"
	 
	 // ---> Start Section "Writer"
	 public function admin_writer() {
		 $this->data['writers'] = $this->model->getListWriter();
		 
		 if ($_POST) {
		    
			$result = $this->model->saveWriter($_POST);
			if ($result) {
                Session::setFlash('Page was saved.');
			} else {
                Session::setFlash('Error.');
            }
			Router::redirect('/admin/books/writer');
		 }
	 }
	 
	 public function admin_deletewriter(){
		 if (isset($this->params[0])) {
			
			$result = $this->model->deleteWriter($this->params[0]);
			if ($result) {
				
				Session::setFlash('Category was delete');
				
			} else {
				Session::setFlash('Error');
			}
		}
		Router::redirect('/admin/books/writer');
				
	 }
	 
	 // <--- End Section "Category"
	 
	 // ---> Start Section "Commentary"
	 public function admin_commentary() {
		 $this->data['commentary'] = $this->model->getListCommentary();
		 
	}
	 
	 public function admin_deletecommentary(){
		 if (isset($this->params[0])) {
			
			$result = $this->model->deleteCommentary($this->params[0]);
			if ($result) {
				
				Session::setFlash('Commentary was delete');
				
			} else {
				Session::setFlash('Error');
			}
		}
		Router::redirect('/admin/books/commentary');
				
	 }
	 
	 // <--- End Section "Commentary"

     // ---> Start Section "Sell"
	 public function admin_sells() {
		 $this->data['sell'] = $this->model->getListSell();
		 
	}
	
	public function admin_deletesell(){
		 if (isset($this->params[0])) {
			
			$result = $this->model->deleteSell($this->params[0]);
			if ($result) {
				
				Session::setFlash('Commentary was delete');
				
			} else {
				Session::setFlash('Error');
			}
		}
		Router::redirect('/admin/books/sells');
				
	 }
	  
	 // <--- End Section "Sell"

}