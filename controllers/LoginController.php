<?php

class LoginController extends Controller {
    public function __construct(){
        parent::__construct();
    }

    public function __destruct(){
        
    }

    public function index(){
        $this->render->view('login');
    }

    public function verify(){
        die('Ok test');
        $this->render->view('login');
    }


}