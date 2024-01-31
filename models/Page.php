<?php

class Page
{

    public function sample_data()
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
