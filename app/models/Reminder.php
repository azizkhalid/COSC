<?php

class Reminder {

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

    public function delete($id) {
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
    }

}
