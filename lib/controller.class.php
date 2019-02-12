<?php

class Controller {
	
	protected $data; // содержит всю информацию, которая будет передаваться из контроллера в представление
	
	protected $model; // для доступа к обьекту модели
	
	protected $params;
	
	public function getData() {
		return $this->data;
	}
	
	public function getModel() {
		return $this->model;
	}
	
	public function getParams() {
		return $this->params;
	}
	
	public function __construct($data = array()) {
		$this->data = $data;
		$this->params = App::getRouter()->getParams();
		
	}
	
		
}