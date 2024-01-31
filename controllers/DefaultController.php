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

    public function page_params($data=[]){
        echo $this->render->view('page_params', $data);
    }

}