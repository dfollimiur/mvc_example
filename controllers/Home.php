<?php
namespace Controllers;

use Controllers\Controller;

class Home extends Controller {

    public function __construct(){
        parent::__construct();
    }
    public function __destruct(){
        
    }
    public function index(){
        $this->render->view('homepage');
    }

    public function page_params($data=[]){
        echo $this->render->view('page_params', $data);
    }

}