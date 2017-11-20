<?php
error_reporting(0);
if (isset($_SESSION['auth']) != 1) {
    header('Location: /home');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href= "<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
    </head>
    <body>

    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><p>Private header<img src="../../../public/images/logo1.png" alt="Logo" width="100px"/></p></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('home'); ?>" class="scroll">Home</a></li>
				
				
				<?php
				
				$username123=$_SESSION['username'];
				
				if($username123=="admin")
				{	
				
				?>
				
				
				 <li><a href="users" class="scroll">User</a></li>
				 <!-- <li><a href="report" class="scroll">Report</a></li>-->
				  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Report <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <ul style="list-style:none">
        <li>  <a class="dropdown-item" href="report">Login Report</a></li>
        <li>   <a class="dropdown-item" href="register">Register Report</a></li>
       
          </ul>
        </div>
      </li>
	  
				   <li><a href="header" class="scroll">Header</a></li>
				
				
				<?php  } ?> 
				
                 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Remainder <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <ul style="list-style:none">
        <li>  <a class="dropdown-item" href="<?php echo base_url('reminders/index'); ?>">View All</a></li>
        <li>   <a class="dropdown-item" href="<?php echo base_url('reminders/add_new'); ?>">Add New</a></li>
       
          </ul>
        </div>
      </li>
                
                <li><a href="<?php echo base_url('home/logout'); ?>" class="scroll"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
   