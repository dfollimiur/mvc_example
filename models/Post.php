<?php

include_once('../inc/model.php');

class Post extends Model 
{

    public function __construct(){
        parent::__construct();
    }

    public function posts_data()
    {
        $sql = <<<SQL
            SELECT 
                posts.*, users.nickname AS autore 
            FROM posts 
                INNER JOIN users ON (users.id = posts.autore_id) 
            ORDER BY 
                created DESC
SQL;

        $data = $this->pdo->fetch_all($sql);
    
        return $data;
    }

    public function post_data( $params = null)
    {
 
        $sql = <<<SQL
        SELECT 
            posts.*, users.nickname AS autore 
        FROM posts 
            INNER JOIN users ON (users.id = posts.autore_id) 
        WHERE 
            posts.id = {$params[0]}
        ORDER BY 
            created DESC
SQL;

        $data = $this->pdo->fetch_object($sql);
 
        return $data;

    }

}
