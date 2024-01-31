<?php

class Render {
    public function view($view_filename, $data = []){
        $data = (object) $data;
        include_once("../views/{$view_filename}.php");
    }
}