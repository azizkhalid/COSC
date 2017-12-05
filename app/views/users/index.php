<?php require_once '../app/views/templates/header.php' ?>


<?php

$con = mysqli_connect("localhost","root","","cosc");

			
$status=$_GET['status'];

if($status=="delete")
{
	 $useranme = $_GET['username'];
	$ddfd=mysqli_query($con,"DELETE FROM `users` WHERE username='$useranme'");
	mysqli_query($con,"DELETE FROM `login_log` WHERE username='$useranme'");
	mysqli_query($con,"DELETE FROM `notes` WHERE username='$useranme'");
	mysqli_query($con,"DELETE FROM `personaldetails` WHERE u_id='$useranme'");
	if($ddfd)
	{
		echo "<script>location.href='http://localhost/users'</script>";
	}
	
}	


?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <h3>User Reports</h3>
                <p class="lead"> List of all User </p>
                <ul>
                    <?php if (isset($_GET['message'])) { ?>
                        <li><?php echo $_GET['message']; ?></li>
                    <?php } ?>
                    <?php if (isset($message)) { ?>
                        <li><?php echo $message; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
	
	
	
	
		<?php
		$username123=$_SESSION['username'];
		$sss=mysqli_query($con,"select * from users where username='$username123' and `type`='Manager'");
				$sssas=mysqli_fetch_array($sss);
				 $ffff=$sssas['username'];
				
				if($username123==$ffff)
				{
				?>
				
				
				<div class="row">
        <div class="col-md-8">
            <div class="table">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name"  name="username" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Password</label>
                   <input type="password" class="form-control" id="recipient-name" name="password" data-subject>
                  </div>
				  
				      <div class="form-group">
                    <label for="message-text" class="control-label">Type</label>
                    <select name="type" class="form-control" required>
					 <option value=""> -- Select User Type -- </option>
					<option value="Staff">Staff</option>
					 </select>
                  </div>
				  
                  <input type="submit" name="add2" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>
				<?php } ?>
				

<?php
$username123=$_SESSION['username'];
				if($username123=="admin")
				{

				?>
	
	
	    <div class="row">
        <div class="col-md-8">
            <div class="table">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name"  name="username" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Password</label>
                   <input type="password" class="form-control" id="recipient-name" name="password" data-subject>
                  </div>
				  
				      <div class="form-group">
                    <label for="message-text" class="control-label" >Type</label>
                    <select name="type" class="form-control"  id="mySelect1245" onchange="myFunctiosnssss()"  required>
					 <option value=""> -- Select User Type -- </option>
					  <option value="Admin"> Admin</option>
					   <option value="Staff">Staff</option>
					    <option value="Manager"> Manager</option>
					 </select>
                  </div>

		  
		  
	<div class="form-group" id="demoasa" style="display:none;" >
                    <label for="message-text" class="control-label">Manager</label>
                    <select name="manager" class="form-control" >
					 <option value=""> -- Select User Type -- </option>
				
<?php 

$dffff=mysqli_query($con,"select * from users where `type`='Manager'");
while($ddddx=mysqli_fetch_array($dffff))
{
?>
				
					 
					  <option value="<?php echo $ddddx['username']; ?>"> <?php echo $ddddx['username']; ?></option>
<?php } ?>
					</select>
                  </div>
				 
				  
                  <input type="submit" name="add456" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>
				<?php } ?>
	
<?php
	
	if(isset($_POST['add456']))
	{
		
		
 $manager12=$_POST['manager'];
			 $username1212 = $_POST['username'];
		 $password12=md5($_POST['password']);
		 $type12=$_POST['type'];
		
		$dhdd=mysqli_query($con,"select * from users where username='$username1212'");
		$dhdaaaa=mysqli_num_rows($dhdd);
		if($dhdaaaa==0)
		{
			
	
		
		$sql_rr123=mysqli_query($con,"SELECT max(id) as id FROM `users`");
		$data_rr123=mysqli_fetch_assoc($sql_rr123);
		$data_rr123=$data_rr123['id']+1;
		
			
		$fffaa=mysqli_query($con,"INSERT INTO `users`(`username`, `password`, `date`, `type`,`manager`,`id`) VALUES ('$username1212','$password12',now(),'$type12','$manager12','$data_rr123')");
	
		if($fffaa)
		{
			echo "<script> location.href='http://localhost/users'</script>";
	}
	}else{
		echo "<script> location.href='http://localhost/users?message=Username Already Exist..'</script>";
		
	}	
	}
	
	if(isset($_POST['add2']))
	{
		$manager=$_SESSION['username'];
				
			 $username12 = $_POST['username'];
		$password=md5($_POST['password']);
		$type=$_POST['type'];
		$dhdd=mysqli_query($con,"select * from users where username='$username12'");
		$dhdaaaa=mysqli_num_rows($dhdd);
		if($dhdaaaa==0)
		{
		
		$sql_rr=mysqli_query($con,"SELECT max(id) as id FROM `users`");
		$data_rr=mysqli_fetch_assoc($sql_rr);
		$data_rr=$data_rr['id']+1;
		
		ECHO "INSERT INTO `users`(`username`, `password`, `date`, `type`,`manager`,`id`) VALUES ('$username12','$password',now(),'$type','$manager','$data_rr')";
		$fffaa=mysqli_query($con,"INSERT INTO `users`(`username`, `password`, `date`, `type`,`manager`,`id`) VALUES ('$username12','$password',now(),'$type','$manager','$data_rr')");
		
	
		
		if($fffaa)
		{
			echo "<script> location.href='http://localhost/users'</script>";
	}
	}else{
		echo "<script> location.href='http://localhost/users?message=Username Already Exist..'</script>";
		
	}
	}
	

	?>	
    <div class="row">
        <div class="col-lg-12">
            <p> <?php //$data['message']?> </p>
            <div class="table">
                <table class="tblReminders">
				
					<?php 
					
				 	$username123=$_SESSION['username'];
					$sss=mysqli_query($con,"select * from users where username='$username123'");
				$sssas=mysqli_fetch_array($sss);
				  $ffff=$sssas['type'];
				
				if($ffff=='Manager' or $username123=='admin')
				{
				?>
			
		
				
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>ID</th>
							<th>User Type</th>
							 <th>Update Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
					
					<?php $username123=$_SESSION['username'];
				if($username123=="admin")
				{ 
			
			?>
                    <tbody>
                        <?php if (count($data['users']) == 0){ ?>
                            <tr><td colspan="3">No User to In List</td></tr>
                        <?php  } else { 
						foreach ($data['users'] as $key => $value) {
						?>
                         
                                <tr class="data-row">
                                    <td ><?php echo $value['username']; ?></td>
                                    <td >User Id : <?php echo $value['id']; ?></td>
									 <td ><?php if($value['type']=='') { echo "Select"; }else {	echo $value['type']; }?></td>
									<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update-modal<?php echo $value['username']; ?>" id="edit-btn">Update Type</button>
                                    </td>
                                   <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-modal<?php echo $value['username']; ?>" id="edit-btn">Update Password</button>
                                        <a href="?status=delete&username=<?php echo $value['username']; ?>" class="btn btn-danger"  >Delete</a>
										<a href="http://localhost/profile/index?profile=<?php echo $value['username']; ?>" class="btn btn-info">View</a>
                                    </td>
                                </tr>
								
								
								 <div class="modal fade view-modal" id="edit-modal<?php echo $value['username']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name" value="<?php echo $value['username']; ?>" name="username" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Password</label>
                     <input type="password" class="form-control"  value="" name="password" >
                  </div>
                  <input type="hidden" name="id" data-id>
                
              </div>
              <div class="modal-footer">
                <button type="submit" name="password123" href="#" class="btn btn-default">Save</button>
                <button type="button" href="#" class="btn btn-primary" data-modal-close>Cancel</button>
              </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
							


			 <div class="modal fade view-modal" id="update-modal<?php echo $value['username']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Update User Type</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name" value="<?php echo $value['username']; ?>" onblur="myFunction456()" name="username" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Type</label>
                    <select name="type" class="form-control"  id="mySelect12" onchange="myFunction456()" required>
					 <option value=""> -- Select User Type -- </option>
					  <option value="Admin"  <?php if($value['type']=="Admin"){?> selected="selected" <?php } ?>> Admin</option>
					   <option value="Staff" <?php if($value['type']=="Staff"){?> selected="selected" <?php } ?>>Staff</option>
					    <option value="Manager" <?php if($value['type']=="Manager"){?> selected="selected" <?php } ?>> Manager</option>
					 </select>
                  </div>
				  


	<div class="form-group" id="demo12456" style="display:none;">
                    <label for="message-text" class="control-label">Manager</label>
                    <select name="manager" class="form-control" >
					 <option value=""> -- Select User Type -- </option>
				
<?php 

$dffff=mysqli_query($con,"select * from users where `type`='Manager'");
while($ddddx=mysqli_fetch_array($dffff))
{
?>
				
					 
					  <option value="<?php echo $ddddx['username']; ?>" <?php if($ddddx['username']==$value['manager']){?> selected="selected" <?php } ?>> <?php echo $ddddx['username']; ?></option>
<?php } ?>
					</select>
                  </div>
 
				  
				  
                  <input type="hidden" name="id" data-id>
                
              </div>
              <div class="modal-footer">
                <button type="submit" name="update" href="#" class="btn btn-default">Save</button>
                <button type="button" href="#" class="btn btn-primary" data-modal-close>Cancel</button>
              </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

	
				<?php } } ?>   
				
              
				<?php }else { ?>
					
				
                        <?php
					$sss=mysqli_query($con,"select * from users where manager='$username123'");
				
				$dddfsdsz=mysqli_num_rows($sss);
				if($dddfsdsz==0)
				{
					?>
                           <tr><td colspan="3">No User to In List</td></tr>
				<?php } ?>	
				<?php
while($sssas=mysqli_fetch_array($sss))
{			?>
                                <tr class="data-row">
                                    <td ><?php echo $sssas['username']; ?></td>
                                    <td >Staff Id : <?php echo $sssas['id']; ?></td>
									 <td > <?php if($sssas['type']=='') { echo "Select"; }else {	echo $sssas['type']; }?></td>
									<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update-modal<?php echo $sssas['username']; ?>" id="edit-btn">Update Type</button>
                                    </td>
                                   <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-modal<?php echo $sssas['username']; ?>" id="edit-btn">Update Password</button>
                                        <a href="?status=delete&username=<?php echo $sssas['username']; ?>" class="btn btn-danger"  >Delete</a>
                                    <a href="http://localhost/profile/index?profile=<?php echo $sssas['username']; ?>" class="btn btn-info">View</a>
									</td>
                                </tr>
								
								
								 <div class="modal fade view-modal" id="edit-modal<?php echo $sssas['username']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name" value="<?php echo $sssas['username']; ?>" name="username" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Password</label>
                     <input type="password" class="form-control"  value="" name="password" >
                  </div>
                  <input type="hidden" name="id" data-id>
                
              </div>
              <div class="modal-footer">
                <button type="submit" name="password123" href="#" class="btn btn-default">Save</button>
                <button type="button" href="#" class="btn btn-primary" data-modal-close>Cancel</button>
              </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
							


			 <div class="modal fade view-modal" id="update-modal<?php echo $sssas['username']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Update User Type</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name" value="<?php echo $sssas['username']; ?>" name="username" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Type</label>
                    <select name="type" class="form-control" required>
					 <option value=""> -- Select User Type -- </option>
					  <option value="Staff" <?php if($sssas['type']=="Staff"){?> selected="selected" <?php } ?>>Staff</option>
					 </select>
                  </div>
                  <input type="hidden" name="id" data-id>
                
              </div>
              <div class="modal-footer">
                <button type="submit" name="update12" href="#" class="btn btn-default">Save</button>
                <button type="button" href="#" class="btn btn-primary" data-modal-close>Cancel</button>
              </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


				<?php } } ?>
				

</tbody>

				<?php }else{ ?>








<thead>
                        <tr>
                            <th>Username</th>
                            <th>ID</th>
							<th>My Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
		
                    <tbody>




				<?php

$uname=$_SESSION['username'];
$saa=mysqli_query($con,"select * from users where `username`='$uname'");
$aasddd=mysqli_fetch_array($saa);
 $dcdfff=$aasddd['type'];
if($dcdfff=='Staff')
{
	?>
	
	 <tr class="data-row">
                                    <td ><?php echo $aasddd['username']; ?></td>
                                    <td >My Id : <?php echo $aasddd['id']; ?></td>
									 <td > <?php if($aasddd['type']=='') { echo "Select"; }else {	echo $aasddd['type']; }?></td>
									
                                   <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-modal<?php echo $aasddd['username']; ?>" id="edit-btn">Update Password</button>
                                       <a href="http://localhost/profile/index?profile=<?php echo $aasddd['username']; ?>" class="btn btn-info">View</a> 
                                    </td>
                                </tr>
								
								
								 <div class="modal fade view-modal" id="edit-modal<?php echo $aasddd['username']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name" value="<?php echo $aasddd['username']; ?>" name="username" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Password</label>
                     <input type="password" class="form-control"  value="" name="password" >
                  </div>
                  <input type="hidden" name="id" data-id>
                
              </div>
              <div class="modal-footer">
                <button type="submit" name="password123" href="#" class="btn btn-default">Save</button>
                <button type="button" href="#" class="btn btn-primary" data-modal-close>Cancel</button>
              </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
							


	
	
	
	
<?php } ?>

</tbody>
				<?php } ?>






				
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Delete User ?</h4>
              </div>
              <div class="modal-body">
                <p>Are you share to delete this User? &hellip;</p>
              </div>
              <div class="modal-footer">
                <a href="" class="btn btn-default delete-btn">Delete</a>
                <button type="button" class="btn btn-primary" data-modal-close>Close</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php
	
	if(isset($_POST['password123']))
	{
			 $useranme = $_POST['username'];
		$password=md5($_POST['password']);
		
		$fff=mysqli_query($con,"UPDATE `users` SET `password`='$password' WHERE username='$useranme'");
		if($fff)
		{
			echo "<script> location.href='http://localhost/users'</script>";
	}
	}	
	
	
		if(isset($_POST['update']))
	{
		 $manager = $_POST['manager'];
			 $useranme = $_POST['username'];
		$type=$_POST['type'];
		
		if($type=="Manager" and $type=="Admin")
		{
			$manager='';
			
		}	
		
		$dddd=mysqli_query($con,"UPDATE `users` SET `type`='$type',`manager`='$manager' WHERE username='$useranme'");
		if($dddd)
		{
			echo "<script> location.href='http://localhost/users'</script>";
	}
	}
	
	
	if(isset($_POST['update12']))
	{
$managername=$_SESSION['username'];			
			$useranme = $_POST['username'];
		$type=$_POST['type'];
			if($type=="Manager" and $type=="Admin")
		{
			$managername='';
			
		}
		$dddd=mysqli_query($con,"UPDATE `users` SET `type`='$type',`manager`='$managername' WHERE username='$useranme'");
		if($dddd)
		{
			echo "<script> location.href='http://localhost/users'</script>";
	}
	}
	
	?>
    

   
    <?php require_once '../app/views/templates/privatefooter.php' ?>
    <script type="text/javascript">
        // Delete modal
        $('#delete-modal').on('shown.bs.modal', function (event) {
            var btn = $(event.relatedTarget);
            var parent = $(btn).parents('tr.data-row');
            // console.log(parent)
            var curr_id = parent.find('td[data-id]').data('id');
            var modal = $(this);
            modal.find('a.delete-btn').attr('href', '<?php echo base_url('reminders/delete'); ?>/'+ curr_id);
        })

        //Edit modal
        $('#edit-modal').on('shown.bs.modal', function (event) {
            var btn = $(event.relatedTarget);
            var parent = $(btn).parents('tr.data-row');
            // console.log(parent)
            var curr_id = parent.find('td[data-id]').data('id');
            var modal = $(this);
            modal.find('form').find('input[data-subject]').val(parent.find('td.data-subject').html());
            modal.find('form').find('textarea[data-description]').html(parent.find('td.data-description').html());
            modal.find('input[type=hidden]').val(curr_id);
            // console.log(parent.find('td.data-subject').html());
        })

        //View modal
        $('#update-modal').on('shown.bs.modal', function (event) {
            var btn = $(event.relatedTarget);
            var parent = $(btn).parents('tr.data-row');
            // console.log(parent)
            var curr_id = parent.find('td[data-id]').data('id');
            var modal = $(this);
            modal.find('p[data-subject]').html(parent.find('td.data-subject').html());
            modal.find('blockquote').html(parent.find('td.data-description').html());
            modal.find('small').html(parent.find('td[data-date]').data('date'));
            // console.log(parent.find('td.data-subject').html());
        })

        //Close modals
        $("button[data-modal-close]").on('click', function(){
            console.log('heyaa');
            $(this).parents('.modal').modal('hide');
        })
    </script>
		<script>
function myFunctiosnssss() {
    var x = document.getElementById("mySelect1245").value;
    if(x=='Staff')
			{ 
		document.getElementById('demoasa').style.display = 'block';
		}else{
			document.getElementById('demoasa').style.display = 'none';
		}
}

</script>

				  
	<script>
function myFunction456() {
    var xas = document.getElementById("mySelect12").value;
	
    if(xas=='Staff')
			{ 
		document.getElementById('demo12456').style.display = 'block';
		}else{
			document.getElementById('demo12456').style.display = 'none';
		}
}

</script>