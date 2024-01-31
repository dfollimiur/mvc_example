<?php

class PostController extends Controller{

    // public function index($data=[]){
    //     echo $this->render->view('home', $data);
    // }

    public function list(){

        $model = $this->load_model('Post');

        $data = $model->posts_data();

        $this->render->view("posts_view", ["query_data" => $data]);

    }

    public function detail( $params ){
        $model = $this->load_model('Post');

        $data = $model->post_data($params);

        $this->render->view("post_view", ["query_data" => $data]);

    }

}