<?php require_once '../app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hey, <?=$_SESSION['username']?></h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
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
    <div>
 
   
    </div>
<?php

/* print_R($_SESSION);
die;
 */
 $con = mysqli_connect("localhost","root","","cosc");

$name=$_SESSION['username'];
$sql=mysqli_query($con,"select * from personaldetails where u_id='$name'");
$ddddd=mysqli_num_rows($sql);
if($name!='admin')
	{
if($ddddd==0)
{
	
	?>
	<div class="row">
        <div class="col-lg-12">
                  <center><h3> <p style="    color: red;">Please Update Youre Profile <a href="http://localhost/profile/index" class="btn btn-warning">Click Heare</a></p></h3></center>
        </div>
    </div>
<?php }else{
?>
<div class="row">
        <div class="col-lg-12">
           <center><h3> <p style="    color: green;">Youre Profile Scussfully Updated</p></h3></center>
        </div>
    </div>
<?php } } ?>
    <div class="row">
        <div class="col-lg-12">
            <p> We Welcome <?=$data['message']?> </p>
        </div>
    </div>

    <?php require_once '../app/views/templates/privatefooter.php' ?>
