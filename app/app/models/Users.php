<?php

class User123 {

    public $subject;
    public $description;
    public $created_date;
    public $deleted = 1;
    public $pdo;

    private $table_name = "users";

    public function __construct() {
        $this->pdo = db_connect();
        @session_start();
    }
	
	
	 public function fetch_all() {
        /**
         * fetch all deleted = 1
         */
        /*//Account locked
        if ($this->checkAttemptCountInLastMinute($name, $pwd) >= 3)
            return -1;*/

        $sql = "SELECT username, password FROM $this->table_name";

        $query = $this->pdo->prepare($sql);
        $query->execute(array($name, $pwd));
        
        return $query->fetchAll();
    }

    /*
     * return Integer
     *  -1 account locked
     *   0 invalid login
     *   1 success
     */

 
	
	
}
