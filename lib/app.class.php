<?php
class App { //отвечает за обработку запросов и вызывает методы контроллеров
    
	protected static $router;
	
	public static $db;
	
    public static function getRouter() { // можем вызвать новый обьект new Router с помощью метода getRouter() например App::getRouter()
		return self::$router;
	}
	
	public static function run($uri) {
		self::$router = new Router($uri);
		
		self::$db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.db_name'));

		$controller_class = ucfirst(self::$router->getController()).'Controller'; 
		$controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
		
		$layout = self::$router->getRoute();
		
		if ($layout == 'admin' && Session::get('role') != 'admin') {
			if ($controller_method != 'admin_login') {
				Router::redirect('/admin/users/login');
			}
		}
		
		$controller_object = new $controller_class();
		if (method_exists($controller_object, $controller_method) ) {
			$view_path = $controller_object->$controller_method();
			$view_object = new View($controller_object->getData(),$view_path);
			$content = $view_object->render();
			
		} else {
			//echo '404.Sorry.There is no page'; exit;
			throw new Exception ('Method '.$controller_method.' of class '.$controller_class. 'does not exist');
		}
		
		
		$layout_path = VIEWS_PATH.DS.$layout.'.html';
		$layout_view_object = new View(compact('content'), $layout_path); // compact — Создает массив, содержащий названия переменных и их значения
		echo $layout_view_object->render();
		/* print_r (self::$router->getRoute());
		echo "<br>";
		print_r ($controller_method);
		echo "<br>";
		print_r ($layout_path); */
	}

}