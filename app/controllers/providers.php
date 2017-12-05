<?php

class Providers extends Controller {
	
	
	public function index($name = '') {
		
	  
    	$users = $this->model('Providers123')->fetch_all();
		
        $this->view('providers/index', ['providers' => $users]);
    }
	
	
    public function delete() {
        $msg = '';
        $url = $this->parseUrl();
        if (isset($url)){
            $users = $this->model('User123');
            if ($users->delete($url[2])){
                $msg="User deleted";
            } else{
                $msg="Unable to delete User";
            }
            // $this->view('home/login', ['message' => $message]);
        } else {
            $msg="Invalid request";
        }
        $redir_url = base_url("users/index");
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
   