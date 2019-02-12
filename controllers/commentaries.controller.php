<?php

class CommentariesController extends Controller {
    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Commentary();
    }


}