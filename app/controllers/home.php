<?php

class Home extends Controller {

    public function index($name = '') {
    	$user = $this->model('User');
		
		if ( isset($_SESSION['name']) && strtolower($_SESSION['name']) == 'mike') {
			$message = 'You are awesome';
		} else {
			$message = 'You :P';
		}
		
        $this->view('home/index', ['message' => $message, 'sr' => 'sdasds']);
    }

    public function login($message = '') {
        $this->view('home/login', ['message' => $message]);
    }

    public function logout() {
        $login_log = $this->model('Login_log');
        $login_log->add($_SESSION['name'], 'logout');
    	@session_start();
    	@session_destroy();
    	## refirect user to login page
    	header('Location: '. base_url('home/login'));	
    }

}