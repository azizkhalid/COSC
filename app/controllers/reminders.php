<?php

class Reminders extends Controller {

    public function index($name = '') {
    	$reminders = $this->model('Reminder')->fetch_all();
		
        $this->view('reminders/index', ['reminders' => $reminders]);
    }

    public function delete() {
        $msg = '';
        $url = $this->parseUrl();
        if (isset($url)){
            $reminder = $this->model('Reminder');
            if ($reminder->delete($url[2])){
                $msg="Reminder deleted";
            } else{
                $msg="Unable to delete reminder";
            }
            // $this->view('home/login', ['message' => $message]);
        } else {
            $msg="Invalid request";
        }
        $redir_url = base_url("reminders/index");
        header("Location: $redir_url?message=$msg");
        return;
    }

    public function update() {
        $msg = '';
        if (isset($_POST['id'])){
            $reminder = $this->model('Reminder');
            if ($reminder->update($_POST['id'], $_POST['subject'], $_POST['description'])){
                $msg="Reminder updated";
            }else{
                $msg="Unable to update reminder";
            }
            // $this->view('home/login', ['message' => $message]);
        } else {
            $msg="Invalid request";
        }
        $redir_url = base_url("reminders/index");
        header("Location: $redir_url?message=$msg");
        return;
    }

    public function add_new() {
        $this->view('reminders/add');
    }

    public function save() {
        $msg = '';
        if (isset($_POST['submit'])){
            $reminder = $this->model('Reminder');
            if ($reminder->save($_POST['subject'], $_POST['description'])){
                $msg="Reminder added";
            }else{
                $msg="Unable to add reminder";
            }
            // $this->view('home/login', ['message' => $message]);
        } else {
            $msg="Invalid request";
        }
        $redir_url = base_url("reminders/index");
        header("Location: $redir_url?message=$msg");
        return;
    }

    public function parseUrl() {

        if (isset($_GET['url'])) {
            //trims the trailing forward slash (rtrim), sanitizes URL, explode it by forward slash to get elements
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}
