<?php

class Login_log {

    public $username;
    public $type;
    public $time;

    public function __construct() {
        
    }

    public function add($name, $type='') {
         $da=date("d-m-Y");
		$pdo = db_connect();
        //Check if entry exists within last 60 seconds
        $sql = 'INSERT INTO login_log(id, username, type, time, date) VALUES(?, ?, ?, ?, ?)';
        $query = $pdo->prepare($sql);
        $query->execute(array(null, $name, $type, time(), $da));
        
        return $query->rowCount() >= 1;
    }

}
