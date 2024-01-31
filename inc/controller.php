<?php 
class Controller {

    protected $render;

    public function __construct(){
        $this->render = new Render();
    }

    public function load_model($model){
        $model_main = new Model();
        return $model_main->load_model($model);
    }
    
}