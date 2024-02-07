<?php

include_once('../inc/model.php');

class User extends Model 
{

    public function __construct(){
        parent::__construct();
    }

    public function users_data()
    {
        $sql = <<<SQL
            SELECT 
                * 
            FROM users 
SQL;

        $data = $this->pdo->fetch_all($sql);
    
        return $data;
    }

    public function user_data( $params = null)
    {
 
        $sql = <<<SQL
        SELECT 
            *
        FROM 
            users  
        WHERE 
            users.id = {$params[0]}
SQL;

        $data = $this->pdo->fetch_object($sql);
 
        return $data;

    }

}
