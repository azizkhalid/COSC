<?php require_once '../app/views/templates/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<script>
function cat_change_fun456()
		{
var country=document.getElementById("country").value;
		$.ajax({
            	type:'POST',
				url:'http://localhost/public/state_pro.php?country='+country,			
				success:function(data)
				{	
			$('#city456').replaceWith(data);
				}
		}); 
		}
		   </script>
		   
		   
		   <script>
function change()
		{
var country456=document.getElementById("country456").value;

		$.ajax({
            	type:'POST',
				url:'http://localhost/public/state_pro123.php?country456='+country456,			
				success:function(data)
				{	
				
			$('#city4564444').replaceWith(data);
				}
		}); 
		}
		   </script>
		   
<?php

$con = mysqli_connect("localhost","root","","cosc");

			
if(isset($_POST['submit456']))
	{
		
$b_date=$_POST['b_date'];
$username1212 = $_POST['u_id'];
$phone=$_POST['phone'];		
 $lname=$_POST['lname'];
$fname = $_POST['fname'];
$email=$_POST['email'];
$province = $_POST['province'];
$city=$_POST['city'];
		
		$dhdd=mysqli_query($con,"select * from `personaldetails` where u_id='$username1212'");
		$dhdaaaa=mysqli_num_rows($dhdd);
		if($dhdaaaa==0)
		{
	
		$fffaa=mysqli_query($con,"INSERT INTO `personaldetails`(`u_id`, `b_date`, `phone`, `fname`,`lname`,`email`,`province`,`city`) VALUES ('$username1212','$b_date','$phone','$fname','$lname','$email','$province','$city')");
	
		if($fffaa)
		{
			echo "<script> location.href='http://localhost/users?message=Profile Update..'</script>";
	}
	}else{
		
	
		$fffaadd=mysqli_query($con,"UPDATE `personaldetails` SET `b_date`='$b_date',`phone`='$phone',`fname`='$fname',`lname`='$lname',`email`='$email',`province`='$province',`city`='$city' WHERE `u_id`='$username1212'");
		if($fffaadd)
		{
			echo "<script> location.href='http://localhost/users?message=Profile Update..'</script>";
	}
	
	}	
	}	


?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <h3>Profile</h3>
                <p class="lead">
				<?php
	$rrr=$_GET['profile'];
if($rrr!='')
{ echo $rrr;
}else{	echo $_SESSION['username']; } ?> Profile</p>
                <ul>
                    <?php if (isset($_GET['message'])) { ?>
                        <li><?php echo $_GET['message']; ?></li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </div>

	<?php
	$rrr=$_GET['profile'];
if($rrr!='')
{
	$sssss=mysqli_query($con,"select * from personaldetails where `u_id`='$rrr'");
	$ssss=mysqli_fetch_array($sssss);
	
?>	
<div class="row">
        <div class="col-md-8">
            <div class="table">
                <form action="" onsubmit="return getAge()" method="post"  >
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">User Name</label>
                    <input type="text" class="form-control" id="unamesssss" readonly  value="<?php echo $rrr; ?>" name="u_id" >
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Birth Date</label>
                    <input class="form-control" id="date" type="date" value="<?php echo $ssss['b_date']; ?>" name="b_date" data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Phone No.</label>
                    <input type="text" class="form-control" id="recipient-name"  maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" pattern="[0-9]{10}" min="10" value="<?php echo $ssss['phone']; ?>" name="phone" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $ssss['fname']; ?>"  pattern="[A-Za-z]+" title="In This Fild Number Is Not Valid. Plz Enter Only characters" name="fname" data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $ssss['lname']; ?>" name="lname"  pattern="[A-Za-z]+" title="In This Fild Number Is Not Valid. Plz Enter Only characters" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Email</label>
                    <input type="email" class="form-control" id="recipient-name"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter Valid Email" value="<?php echo $ssss['email']; ?>" name="email" data-subject required>
                  </div>
				  
		

     <div class="form-group">
                    <label for="message-text" class="control-label" >Select Province</label>
                    <select name="province" class="form-control" id="country" onchange="cat_change_fun456()" required>
					 <option value=""> -- Select Province -- </option>
					 <?php
					 $dddx=mysqli_query($con,"SELECT DISTINCT province FROM province2;");
					 while($fkkd=mysqli_fetch_array($dddx)){
					 ?>
					  <option value="<?php echo $fkkd['province']; ?>" <?php if($fkkd['province']==$ssss['province']){?> selected="selected" <?php } ?>> <?php echo $fkkd['province']; ?></option>
					 <?php } ?>
					  
					  
					 </select>
                  </div>

		  
		  <?php 
		  $fvffffsdf=$ssss['city'];
		  if($fvffffsdf=='')
		  {
		  
		  ?>
	<div class="form-group" >
                    <label for="message-text" class="control-label">Select Province City</label>
					 <span id="city456">
                    <select name="city"  class="form-control" >
					 <option value=""> -- Select Province City-- </option>
					
					</select>
					</span>
                  </div>
		  <?php }else{ ?>	 
				 		
			<div class="form-group" >
                    <label for="message-text" class="control-label">Select Province City</label>
					
                    <select name="city"  class="form-control" >
		<?php 
$ddfs2=$ssss['province'];
$dffff=mysqli_query($con,"select * from province2 where province='$ddfs2' ");
while($ddddx=mysqli_fetch_array($dffff))
{
?>
	<option value="<?php echo $ddddx['city']; ?>" <?php if($ddddx['city']==$ssss['city']){?> selected="selected" <?php } ?>> <?php echo $ddddx['city']; ?></option>
<?php } ?>

					</select>
				
                  </div>
				  

		  <?php } ?>
				  
                  <input type="submit" name="submit456" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>
	
<?php }else{
if (count($data['profile']) == 0){
?>	
	
	<div class="row">
        <div class="col-md-8">
            <div class="table">
                <form action="<?php echo base_url('profile/save');  ?>" onsubmit="return getAge()" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">User Name</label>
                    <input type="text" class="form-control" id="recipient-name" readonly value="<?php echo $_SESSION['username']; ?>" name="u_id" >
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Birth Date</label>
                    <input type="date" class="form-control" id="date" value="<?php echo $value['b_date']; ?>" name="b_date" data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Phone No.</label>
                    <input type="text" class="form-control" id="recipient-name" value="<?php echo $value['phone']; ?>" name="phone"  maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" pattern="[0-9]{10}" min="10" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['fname']; ?>" name="fname" pattern="[A-Za-z]+" title="In This Fild Number Is Not Valid. Plz Enter Only characters"data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['lname']; ?>" name="lname" pattern="[A-Za-z]+" title="In This Fild Number Is Not Valid. Plz Enter Only characters"data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Email</label>
                    <input type="email" class="form-control" id="recipient-name"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter Valid Email" value="<?php echo $value['email']; ?>" name="email" data-subject required>
                  </div>
				  
				  
 

		  
 <div class="form-group">
                    <label for="message-text" class="control-label" >Select Province</label>
                    <select name="province" class="form-control" id="country456" onchange="change()" required>
					 <option value=""> -- Select Province -- </option>
					 <?php
					 $dddx=mysqli_query($con,"SELECT DISTINCT province FROM province2;");
					 while($fkkd=mysqli_fetch_array($dddx)){
					 ?>
					  <option value="<?php echo $fkkd['province']; ?>" <?php if($fkkd['province']==$value['province']){?> selected="selected" <?php } ?>> <?php echo $fkkd['province']; ?></option>
					 <?php } ?>
					  
					  
					 </select>
                  </div>

		  
		  <?php 
		  $fvffffsdf=$value['city'];
		  if($fvffffsdf=='')
		  {
		  
		  ?>
	<div class="form-group" >
                    <label for="message-text" class="control-label">Select Province City</label>
					 <span id="city4564444">
                    <select name="city"  class="form-control" >
					 <option value=""> -- Select Province City-- </option>
					
					</select>
					</span>
                  </div>
		  <?php }else{ ?>	 
				 		
			<div class="form-group" >
                    <label for="message-text" class="control-label">Select Province City</label>
					
                    <select name="city"  class="form-control" >
		<?php 
$ddfs2=$value['province'];
$dffff=mysqli_query($con,"select * from province2 where province='$ddfs2' ");
while($ddddx=mysqli_fetch_array($dffff))
{
?>
	<option value="<?php echo $ddddx['city']; ?>" <?php if($ddddx['city']==$value['city']){?> selected="selected" <?php } ?>> <?php echo $ddddx['city']; ?></option>
<?php } ?>

					</select>
				
                  </div>
				  

		  <?php } ?>
				    
                  <input type="submit" name="submit" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>
	
	
<?php } else { 	
foreach ($data['profile'] as $key => $value) {



?>

<div class="row">
        <div class="col-md-8">
            <div class="table">
                <form action="<?php echo base_url('profile/update');  ?>" onsubmit="return getAge()" method="post"  >
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">User Name</label>
                    <input type="text" class="form-control" id="recipient-name" readonly value="<?php echo $value['u_id']; ?>" name="u_id" >
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Birth Date</label>
                    <input class="form-control" id="date" type="date" value="<?php echo $value['b_date']; ?>" name="b_date" data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Phone No.</label>
                    <input type="text" class="form-control" id="recipient-name"  maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" pattern="[0-9]{10}" min="10" value="<?php echo $value['phone']; ?>" name="phone" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['fname']; ?>"  pattern="[A-Za-z]+" title="In This Fild Number Is Not Valid. Plz Enter Only characters" name="fname" data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['lname']; ?>" name="lname"  pattern="[A-Za-z]+" title="In This Fild Number Is Not Valid. Plz Enter Only characters" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Email</label>
                    <input type="email" class="form-control" id="recipient-name"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter Valid Email" value="<?php echo $value['email']; ?>" name="email" data-subject required>
                  </div>
				 

     <div class="form-group">
                    <label for="message-text" class="control-label" >Select Province</label>
                    <select name="province" class="form-control" id="country456" onchange="change()" required>
					 <option value=""> -- Select Province -- </option>
					 <?php
					 $dddx=mysqli_query($con,"SELECT DISTINCT province FROM province2;");
					 while($fkkd=mysqli_fetch_array($dddx)){
					 ?>
					  <option value="<?php echo $fkkd['province']; ?>" <?php if($fkkd['province']==$value['province']){?> selected="selected" <?php } ?>> <?php echo $fkkd['province']; ?></option>
					 <?php } ?>
					  
					  
					 </select>
                  </div>

		  
		  <?php 
		  $fvffffsdf=$value['city'];
		  if($fvffffsdf=='')
		  {
		  
		  ?>
	<div class="form-group" >
                    <label for="message-text" class="control-label">Select Province City</label>
					 <span id="city4564444">
                    <select name="city"  class="form-control" >
					 <option value=""> -- Select Province City-- </option>
					
					</select>
					</span>
                  </div>
		  <?php }else{ ?>	 
				 		
			<div class="form-group" >
                    <label for="message-text" class="control-label">Select Province City</label>
					
                    <select name="city"  class="form-control" >
		<?php 
$ddfs2=$value['province'];
$dffff=mysqli_query($con,"select * from province2 where province='$ddfs2' ");
while($ddddx=mysqli_fetch_array($dffff))
{
?>
	<option value="<?php echo $ddddx['city']; ?>" <?php if($ddddx['city']==$value['city']){?> selected="selected" <?php } ?>> <?php echo $ddddx['city']; ?></option>
<?php } ?>

					</select>
				
                  </div>
				  

		  <?php } ?>
				    
                  <input type="submit" name="submit" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>
<?php } } } ?>
</div>
  
    <?php require_once '../app/views/templates/privatefooter.php' ?>

	
	
	
	
	
	
	<script>
function getAge() {
var dateString = document.getElementById("date").value;
if(dateString !="")
{
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    var da = today.getDate() - birthDate.getDate();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    if(m<0){
        m +=12;
    }
    if(da<0){
        da +=30;
    }

  if(age < 18 || age > 100)
{
alert("Age "+age+" is restrict");
return false;
} else {
}
} else {
alert("please Enter your date of birth");
return false;
}
}


</script>


	<?php

	$message=$_GET['message'];
	if($message=='Profile updated')
	{
 ?>
 <script type="text/javascript">
 alert("Profile updated");
 </script>
<?php } ?>



	<?php

	$message=$_GET['message'];
	if($message=='Unable to update Profile')
	{
 ?>
	 <script type="text/javascript">
 alert("Unable to update Profile");
 </script>	
		
	<?php } ?>
	
	
	







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
        $('#view-modal').on('shown.bs.modal', function (event) {
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