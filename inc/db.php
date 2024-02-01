<?php

class DB {

    private $result = NULL;
    private $conn = NULL;
    private static $instance = NULL;
    
    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    private function __construct() {

        if (!isset($db_config)) {
            require_once APP_ROOT . '\config\db_config.php';
        }

        $dns = $db_config['db_engine'] . ":host=".$db_config['db_host'] . ";dbname=" . $db_config['db_name'];

        try {
            $this->conn = new PDO($dns, $db_config['db_user'], $db_config['db_password'], [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]);
                
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            exit("Impossibile connettersi al database: " . $e->getMessage());
        }

    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup() {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    /**
     * 
     * @param type $key
     * @return type
     */
    public function __get($key)
    {
//        return $this->_values[$key];
        trigger_error('Attibute is not available.', E_USER_ERROR);
    }
 
    /**
     * 
     * @param type $key
     * @param type $value
     */
    public function __set($key, $value)
    {
//        $this->_values[$key] = $value;
        trigger_error('Attibute is not valuable.', E_USER_ERROR);
    }
    
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @staticvar Singleton $instance The *Singleton* instances of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance() {
        if (self::$instance === NULL)
            self::$instance = new DB;

        return self::$instance;
    }

    #getter for conn

    public function get_conn() {
        return $this->conn;
    }

    # insert or update data 

    public function query($query, $params = array(), $debug = false) {
        try {
            $this->result = $this->conn->prepare($query);
            if (!is_array($params))
                $params = array($params);
            $this->result->execute($params);
            if ($debug)
                $this->result->debugDumpParams();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # fetch a multiple rows of result as a nested array ( = multi-dimensional array) 

    public function fetch_all($query, $params = array(), $method = PDO::FETCH_OBJ) {
        try {
            $this->result = $this->conn->prepare($query);   # prepare the query 
            if (!is_array($params))
                $params = array($params);# if $params is not an array, let's make it array with one value of former $params 
            $this->result->execute($params);      # execute the query
            return $this->result->fetchAll($method);  # return the result 
        } catch (PDOException $e) {
            echo $e->getMessage();         # call the get_error function
            //$this->get_error($e); 
        }
    }

    # fetch a single row of result as an array ( =  one dimensional array) 

    public function fetch_assoc($query, $params = array()) {
        try {
            $stmt = $this->conn->prepare($query);
            if (!is_array($params))
                $params = array($params);

            # the line 
            //$params = is_array($params) ? $params : array($params); 
            # is simply checking if the $params variable is an array, and if so, it creates an array with the original $params value as its only element, and assigns the array to $params. 
            # This would allow you to provide a single variable to the query method, or an array of variables if the query has multiple placeholders. 
            # The reason it doesn't use bindParam is because the values are being passed to the execute() method. With PDO you have multiple methods available for binding data to placeholders: 
            # bindParam 
            # bindValue 
            # execute($values) 
            # The big advantage for the bindParam method is if you are looping over an array of data, you can call bindParam once, 
            # to bind the placeholder to a specific variable name (even if that variable isn't defined yet) and it will get the current 
            # value of the specified variable each time the statement is executed. 

            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            $this->get_error($e);
        }
    }

    # return the current row of a result set as an object 

    public function fetch_object($query, $params = array()) {
        try {
            $stmt = $this->conn->prepare($query);
            if (!is_array($params))
                $params = array($params);
            $stmt->execute($params);
            return $stmt->fetchObject();
        } catch (PDOException $e) {
            $this->get_error($e);
        }
    }

    /**
     * Restituisce un singolo valore preso dalla tabella a determinate condizioni
     * 
     * @param type $tabella
     * @param type $campo
     * @param type $cond
     * @param type $ord
     * @return type
     */
    public function lookup($tabella, $campo, $cond = '', $ord = '') {

        $qs = "SELECT " . $campo . " FROM " . $tabella;
        if (!empty($cond)) {
            $qs = $qs . " WHERE 1 ";
            if (is_array($cond)) {
                foreach ($cond as $k => $v) {
                    $qs = $qs . " AND " . substr($k, 1) . "=" . $k;
                }
            } else {
                $qs = $qs . " AND " . $cond;
            }
        }
        if (!empty($ord))
            $qs = $qs . " ORDER BY " . $ord;

        try {
            $stmt = $this->conn->prepare($qs);
            if (!is_array($cond))
                $cond = array($cond);
            $stmt->execute($cond);

            $r = $stmt->fetchObject();
            return (is_object($r)) ? $r->$campo : NULL;
        } catch (PDOException $e) {
            $this->get_error($e);
        }
    }

    #get the number of rows in a result as a value string 

    public function num_rows($query, $params = array()) {
        try {
            $stmt = $this->conn->prepare($query);
            if (!is_array($params))
                $params = array($params);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            $this->get_error($e);
        }
    }

    #get last insert id record

    function get_lastInsertId() {
        return $this->conn->lastInsertId();
    }

    # display error 

    public function get_error($e) {
        $this->connection = null;
        die($e->getMessage());
    }

    # closes the database connection when object is destroyed 

    function __destruct() {
        $this->conn = NULL;
    }


}