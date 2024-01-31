<?php

class Home extends Controller{

    public function index($data=[]){
        echo $this->render->view('home', $data);
    }

    public function load_data(){

        $model = $this->load_model('SampleModel');

        $data = $model->sample_query();

        $this->render->view("load_data", ["query_data" => $data]);

    }

    public function lista_posts(){

        $model = $this->load_model('Post');

        $data = $model->posts_data();

        $this->render->view("posts_view", ["query_data" => $data]);

    }

    public function post( $id ){
        $model = $this->load_model('Post');

        $data = $model->post_data($id);

        $this->render->view("post_view", ["query_data" => $data]);

    }

}