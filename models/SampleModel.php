<?php

include_once('../inc/db.php');

class SampleModel
{
    private $pdo = NULL;
    private $conn = NULL;

    public function __construct(){
        $this->pdo = DB::getInstance();
        $this->conn = $this->pdo->get_conn();
    }

    public function sample_query()
    {
        $data = (object) [
            [
                "id" => 1,
                "name" => "John Smith",
                "postion" => "Web Developer"
            ],
            [
                "id" => 2,
                "name" => "Samantha Lou",
                "postion" => "Project Manager"
            ],
            [
                "id" => 1,
                "name" => "Mark Cooper",
                "postion" => "Senior Programmer"
            ]
        ];

        return $data;
    }

}
