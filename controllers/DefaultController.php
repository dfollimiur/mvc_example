<?php

class DefaultController extends Controller {
    public function __construct(){
        parent::__construct();
    }
    public function __destruct(){
        
    }
    public function index(){
        $this->render->view('default');
    }
}