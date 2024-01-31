<?php

include_once('../inc/db.php');

class Post
{
    private $pdo = NULL;
    private $conn = NULL;

    public function __construct(){
        $this->pdo = DB::getInstance();
        $this->conn = $this->pdo->get_conn();
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

        // $data = $this->pdo->fetch_all($sql);
        try {
            $query = $this->conn->prepare($sql, []);
            $result = $query->execute();
            if (!$result) {
                die('Errore esecuzione query: ' . implode(',', $this->pdo->conn->errorInfo()));
            }
            $data = $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();         # call the get_error function
        }

        return $data;
    }

    public function post_data( $id = null)
    {
        $sql = <<<SQL
        SELECT 
            posts.*, users.nickname AS autore 
        FROM posts 
            INNER JOIN users ON (users.id = posts.autore_id) 
        WHERE 
            posts.id = {$id}
        ORDER BY 
            created DESC
SQL;

        try {
            $query = $this->conn->prepare($sql, []);
            $result = $query->execute();
            if (!$result) {
                die('Errore esecuzione query: ' . implode(',', $this->pdo->conn->errorInfo()));
            }
            $data = $query->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();         # call the get_error function
        }

        return $data;

    }


}
