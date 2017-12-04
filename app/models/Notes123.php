<?php

class Notes123 {

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
		
	$user=$_SESSION['username'];	
		
	if($user=="admin")
	{
		
		
$sql = "SELECT notes.username, personaldetails.u_id,personaldetails.phone,personaldetails.fname,personaldetails.lname,personaldetails.email FROM notes INNER JOIN personaldetails ON notes.username=personaldetails.u_id";
  
}
   
   
   else
   {
	   
	$sql = "SELECT notes.username, personaldetails.u_id,personaldetails.phone,personaldetails.fname,personaldetails.lname,personaldetails.email FROM notes INNER JOIN personaldetails ON notes.username=personaldetails.u_id WHERE notes.username='$user'";
    
	   
	   
   } 

  $query = $this->pdo->prepare($sql);
   $query->execute();    
   return $query->fetchAll();
	

	
	 }
	 
	 
	   public function check123() {
       $user=$_SESSION['username'];	
		
	if($user=="admin")
	{
	   $sql = "SELECT * FROM login_log ORDER BY id DESC";
	}
	  else
{
		  
		    $sql = "SELECT * FROM login_log WHERE `username`='$user' ORDER BY id DESC";
	 
	  }		  
	   
        $query = $this->pdo->prepare($sql);
        $query->execute(array($_SESSION['username']));
        
        return $query->fetchAll();
    }
	 
	   public function check456() {
		   
		  $user123=$_SESSION['username'];	
		
	if($user123=="admin")
	{ 
		   
       $sql = "SELECT * FROM notes WHERE `deleted`='0' ORDER BY id DESC";

	}
else
{
	
	 $sql = "SELECT * FROM notes WHERE `deleted`='0' ORDER BY id DESC";

}	
	   
	   
        $query = $this->pdo->prepare($sql);
        $query->execute(array($_SESSION['username']));
        
        return $query->fetchAll();
    }
	 

/* 
   $sql12 = "SELECT notes.username, personaldetails.u_id FROM notes INNER JOIN personaldetails ON notes.username=personaldetails.u_id";

        $query12 = $this->pdo->prepare($sql12);
        
        return $query12->rowCount();  */
   

	/* 
 	  public function check123($u_id) {
        $sql = "SELECT * FROM notes WHERE u_id=?";

        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
	 */
	
   /* public function delete($id) {
        $sql = "UPDATE $this->table_name SET deleted=? WHERE id=?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array('1', $id));
        
        return $query->rowCount();
    }

    public function update($id, $subject, $description) {
        $sql = "UPDATE $this->table_name SET subject = ?, description = ? WHERE id = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($subject, $description, $id));        
        return $query->rowCount();
    }

    public function save($subject, $description) {
        $sql = "INSERT INTO $this->table_name(subject, username, description, created_date, deleted) VALUES (?, ?, ?, ?, ?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($subject, $_SESSION['username'], $description, time(), '0'));

        return $query->rowCount();
    } */
	
	
	 public function delete($id) {
        $sql = "SELECT * FROM login_log WHERE username=? ORDER BY id DESC";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($id));
        
        return $query->fetchAll();
    }

}
