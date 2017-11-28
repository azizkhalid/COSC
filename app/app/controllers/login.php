<?php

class Login extends Controller {
    
    public function index() {
        
        $msg = "Invalid request";
        if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
		{	
			$login_log = $this->model('Login_log');

			$name = $_POST['username'];
			$pwd = md5($_POST['password']);
			$found = False;

        	$user = $this->model('User');
            
            $login = $user->authenticate($_POST['username'], $pwd);
        	
        	if ( $login == 1 ){
        		//Add to log as success
        		$login_log->add($name, 'success');

        		$_SESSION['auth'] = True;
			  	$_SESSION['username'] = $name;
			  	$_SESSION['password'] = $_POST['password'];
        		header('Location: '. base_url('home'));
        		return false;
        	}else if( $login == 3){
			
        		$login_log->add($name, 'error');
        		$msg = "You have 3 wrong Login Attempts,Your Account is Locked!";
				header('Location: '. base_url('home/login?message='. $msg));
        	}else{
				
		
				
				$login_log->add($name, 'error');
        		##Return logi form with error
        		$msg = 'Wrong username or password';
				header('Location: '. base_url('home/login?message='. $msg));
				return false;
			
        	}

    	}

    	//header('Location: '. base_url('home/login?message='. $msg));
		//$this->view('home/login', ['message' => $msg]);
		return false;
	}
	
	public function register () {
		$user = $this->model('User');
		
		$msg = '';
			
		if (isset($_POST['register']) && !empty($_POST['username']) && !empty($_POST['password']))
		{
			$name = $_POST['username'];
			$pwd = $_POST['password'];
			
			// check minimum security standard for password 
			$uppercase = preg_match('@[A-Z]@', $pwd);
			$lowercase = preg_match('@[a-z]@', $pwd);
			$number    = preg_match('@[0-9]@', $pwd);

			if(!$uppercase || !$lowercase || !$number || strlen($pwd) < 8) {
				$msg = 'Password must be minimum 8 character, contain 1 upper case, 1 lower case and 1 number';
				header('Location: '. base_url('login/register') .'?message='. $msg);
				return;
			}
			else
			{
				## Attemp user register
				if( $user->register($name, $pwd) ){
					$_SESSION['auth'] = true;
					$_SESSION['username'] = $name;
			  		$_SESSION['password'] = $_POST['password'];
					header('Location: '. base_url('home') .'?message='. $msg);
					return;
				}
			}
		}

		// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// 	$username = $_POST['username'];
		// 	$password = $_POST['password'];
			
			
		// 	$user->register($username, $password);
		// 	$_SESSION['auth'] = true;
		//}
		$this->view('home/register', ['message' => $msg]);
	}

	public function log_user($username) {
		$user = $this->model('Login_log');
	}
}