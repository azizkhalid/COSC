<?php

class Providers123 {

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

        $sql = "SELECT username, password ,type,manager,id FROM $this->table_name";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }


   public function delete($id) {
        $sql = "DELETE FROM  $this->table_name where username=? ";
        $query = $this->pdo->prepare($sql);
       return $query->execute();
        
    }

}
