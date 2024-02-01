<?php 

class Routes {

    public function __construct($parameters){
        $params = explode("/", trim($parameters, "/"),3);
    //    var_dump($params);
        $controller = isset($params[0]) && !empty($params[0]) ? $params[0] : 'DefaultController';
        $instance =  isset($params[1]) && !empty($params[1]) ? $params[1] : 'index';
        $args = isset($params[2]) ? explode("/", trim($params[2], "/")) : []; 
       

        $controller = ucwords($controller);
        require_once "../controllers/{$controller}.php";
        if(class_exists($controller)){
            $controller_class = new $controller();
            if(method_exists($controller_class, $instance)){
                $controller_class->$instance($args);
            }else{
                die("Undefined {$instance} Method in {$controller} Controller");
            }
        }else{
            die("Undefined {$controller} Controller");
        }
    }
}