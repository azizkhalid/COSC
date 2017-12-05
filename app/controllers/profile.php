<?php

class Profile extends Controller {




    public function index($name = '') {
    	$profile = $this->model('Profile123')->fetch_all();
		
        $this->view('profile/index', ['profile' => $profile]);
    }
	
	
	
	 public function update() {
        $msg = '';
        if (isset($_POST['u_id'])){
            $profile = $this->model('Profile123');
            if ($profile->update($_POST['u_id'], $_POST['b_date'], $_POST['phone'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['province'], $_POST['city'])){
                $msg="Profile updated";
            }else{
                $msg="Unable to update Profile";
            }
            // $this->view('home/login', ['message' => $message]);
        } else {
            $msg="Invalid request";
        }
        $redir_url = base_url("profile/index");
        header("Location: $redir_url?message=$msg");
        return;
    }
	
	
	
	public function save() {
        $msg = '';
        if (isset($_POST['u_id'])){
            $profile = $this->model('Profile123');
            if ($profile->save($_POST['u_id'], $_POST['b_date'], $_POST['phone'], $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['province'], $_POST['city'])){
                $msg="Profile updated";
            }else{
                $msg="Unable to update Profile";
            }
            // $this->view('home/login', ['message' => $message]);
        } else {
            $msg="Invalid request";
        }
        $redir_url = base_url("profile/index");
        header("Location: $redir_url?message=$msg");
        return;
    }
	
	
	
	
	
	
}

?>