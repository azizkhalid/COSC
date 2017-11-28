<?php require_once '../app/views/templates/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">


<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <h3>Profile</h3>
                <p class="lead"><?php echo $_SESSION['username']; ?> Profile</p>
                <ul>
                    <?php if (isset($_GET['message'])) { ?>
                        <li><?php echo $_GET['message']; ?></li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </div>
<?php

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
                    <input type="number" class="form-control" id="recipient-name" value="<?php echo $value['phone']; ?>" name="phone" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['fname']; ?>" name="fname" data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['lname']; ?>" name="lname" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Email</label>
                    <input type="email" class="form-control" id="recipient-name"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter Valid Email" value="<?php echo $value['email']; ?>" name="email" data-subject required>
                  </div>
				  
				  
				    
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
                    <input type="number" class="form-control" id="recipient-name" value="<?php echo $value['phone']; ?>" name="phone" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['fname']; ?>" name="fname" data-subject required>
                  </div>
				  
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="recipient-name"  value="<?php echo $value['lname']; ?>" name="lname" data-subject required>
                  </div>
				  
				  
				     <div class="form-group">
                    <label for="recipient-name" class="control-label">Email</label>
                    <input type="email" class="form-control" id="recipient-name"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter Valid Email" value="<?php echo $value['email']; ?>" name="email" data-subject required>
                  </div>
				  
				  
				    
                  <input type="submit" name="submit" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>
<?php } } ?>
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