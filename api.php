<?php require_once '../app/views/templates/header.php' ?>
<?php
$con = mysqli_connect("localhost","root","","cosc");


 	$sql="select * from personaldetails";
	
$query=mysqli_query($con,$sql);
while($data123=mysqli_fetch_assoc($query))
{



$sub_category12=$data123['u_id'];
$sql12=mysqli_query($con,"select * from notes where username='$sub_category12'");
$pp=mysqli_fetch_array($sql12);
$uname12=$pp['username'];


$ssss=mysqli_query($con,"select * from login_log where  username='$sub_category12'  and type='success' ORDER BY `login_log`.`id` DESC");						
$ssssqqq=mysqli_fetch_array($ssss);

$fff=mysqli_query($con,"select * from notes where username='$sub_category12' and deleted='0'");
$count12=mysqli_num_rows($fff);

if($uname12==$sub_category12)
{



							$uid=$uname12;
							$phone=$data123['phone'];
							 $name=$data123['fname']." ".$data123['lname'];
						 $email=$data123['email'];
						 $date=$ssssqqq['date'];
						 
							$total=$count12;
}

 $posts['Username']=$uid;
 $posts['PhoneNumber']=$phone;
   $posts['Full_Name']=$name;
    $posts['Email']=$email;
	 $posts['Date']=$date;
	  $posts['Total_Notes']=$total;

 $new[]=$posts;
 
}
  

 		   $jsondata['Report']=$new;    

			   $jsondata['success']='1';
			   $jsondata['error_code']='0';
			   echo json_encode($jsondata);
	

?>
<?php require_once '../app/views/templates/privatefooter.php' ?>