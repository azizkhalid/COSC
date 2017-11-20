<?php

class Users {

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

 
	
	
}
