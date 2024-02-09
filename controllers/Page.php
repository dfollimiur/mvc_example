<?php
namespace Controllers;

use Controllers\Controller;

class Page extends Controller{

    public function index($data=[]){
        echo $this->render->view('home', $data);
    }

    public function load_data(){

        $model = $this->load_model('Page');

        $data = $model->sample_data();

        $this->render->view("load_data", ["query_data" => $data]);

    }

}