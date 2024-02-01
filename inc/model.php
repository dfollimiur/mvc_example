<?php

include_once('../inc/db.php');

class Model {
    protected $pdo = NULL;
    protected $conn = NULL;

    public function __construct(){
        $this->pdo = DB::getInstance();
        $this->conn = $this->pdo->get_conn();
    }

    public function load_model($model){
        $model = ucwords($model);
        if(is_file("../models/{$model}.php")){
            require_once "../models/{$model}.php";
            if(class_exists($model)){
                return new $model();
            }else{
                die("Undefined {$model} Model");
            }
        }
    }
}