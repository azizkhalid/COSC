<?php

class Header {

    public $subject;
    public $description;
    public $created_date;
    public $deleted = 1;
    public $pdo;

    private $table_name = "notes";

    public function __construct() {
        $this->pdo = db_connect();
        @session_start();
    }

    /*
     * return Integer
     *  -1 account locked
     *   0 invalid login
     *   1 success
     */

    public function fetch_all() {
        /**
         * fetch all deleted = 1
         */
        /*//Account locked
        if ($this->checkAttemptCountInLastMinute($name, $pwd) >= 3)
            return -1;*/

        $sql = "SELECT id, subject, description, created_date, deleted, username FROM $this->table_name WHERE deleted=? AND username = ?";

        $query = $this->pdo->prepare($sql);
        $query->execute(array(0, $_SESSION['username']));
        
        return $query->fetchAll();
    }
	
	
}
