<?php

class Profile123 {

    public $subject;
    public $description;
    public $created_date;
    public $deleted = 1;
    public $pdo;

    private $table_name = "personaldetails";

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

       $sql = "SELECT * FROM $this->table_name WHERE u_id = ?";

        $query = $this->pdo->prepare($sql);
      $query->execute(array($_SESSION['username']));
        
        
        return $query->fetchAll();
    }

    
  public function update($u_id, $b_date, $phone, $fname, $lname, $email, $province, $city) {
		/* $sql = "SELECT * FROM $this->table_name WHERE u_id = ?";
		 $query = $this->pdo->prepare($sql);
        $query->execute(array($u_id))
		$query->rowCount();
		if($query==0)
		{
			 $sql = "INSERT INTO $this->table_name(u_id, b_date, phone, fname, lname, email) VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($u_id, $b_date, $phone, $fname, $lname, $email));

        return $query->rowCount();
		}else{ */
        $sql = "UPDATE $this->table_name SET b_date = ?, phone = ?,fname = ?, lname = ?, email = ?, province= ?, city =? WHERE u_id = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($b_date, $phone, $fname, $lname, $email, $province, $city, $u_id));        
        return $query->rowCount();
		/* } */
    } 

     public function save($u_id, $b_date, $phone, $fname, $lname, $email, $province, $city) {
        $sql = "INSERT INTO $this->table_name(u_id, b_date, phone, fname, lname, email, province ,city) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($u_id, $b_date, $phone, $fname, $lname, $email, $province, $city));

        return $query->rowCount();
    } 

}
