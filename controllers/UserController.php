<?php

class UserController extends Controller{

    // public function index($data=[]){
    //     echo $this->render->view('home', $data);
    // }

    public function list(){

        $model = $this->load_model('User');

        $data = $model->users_data();

        $this->render->view("users_view", ["query_data" => $data]);

    }

    public function detail( $params ){
        $model = $this->load_model('User');

        $data = $model->user_data($params);

        $this->render->view("user_view", ["query_data" => $data]);

    }

}