<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    /*
     * return Integer
     *  -1 account locked
     *   0 invalid login
     *   1 success
     */

    public function authenticate($name, $pwd) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$pdo = db_connect();
        //Account locked
        if ($this->checkAttemptCountInLastMinute($name, $pwd) >= 2)
            return 3;

        $sql = "SELECT username, password FROM users WHERE username = ? AND password = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($name, $pwd));
        
        if ( $query->rowCount() >= 1 )
        {    
		return 1;
        }
		else
		{	
        
		  $sql = "SELECT username, password FROM admin WHERE username = ? AND password = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($name, $pwd));
		 if ( $query->rowCount() >= 1 )
        {    
		return 1;
        }
		else
		{
		
		return 0;
		}
		
		
		}
	
	
	}

    public function checkAttemptCountInLastMinute($name='') {
        $curr_time = date();
        $last_minute_time = $curr_time - (30 ); 

        $pdo = db_connect();
        $sql = "SELECT * FROM login_log WHERE username = ? AND type = ? AND time >? ORDER BY id DESC LIMIT 3";
        $query = $pdo->prepare($sql);
        $query->execute(array($name, 'error', $last_minute_time));
        
        return $query->rowCount();
    }

    public function checkUserExist($name='') {
        $pdo = db_connect();
        $sql = "SELECT username FROM users WHERE username = ?";
        $query = $pdo->prepare($sql);
        $query->execute(array($name));
        
        return $query->rowCount() == 0;
        
        // if ($query->rowCount() == 0)
        // {
        //     header("Location:index.php");
        // }
        // else
        // {
        //     $msg = 'username already exists in database!';
        // }
    }

	
	public function register ($username, $password) {
		$pdo = db_connect();
        if (! $this->checkUserExist($username) )
            return false;
$date=date("Y-m-d");
        $sql = "INSERT INTO users (username, password, date) VALUES (?, ?, ?)";
        $query = $pdo->prepare($sql);
        $pwd = md5($password);
        $query->execute(array($username, $pwd ,$date));
        
        return true;        

	}

}
