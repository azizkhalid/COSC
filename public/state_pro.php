 	 <span id="city456">
	 <select name="city"  class="form-control" >
<?php 

$con = mysqli_connect("localhost","root","","cosc");
			
							
	 echo $country = $_GET['country'];
	
	$query1 = mysqli_query($con,"SELECT * FROM `province2` WHERE `province`='$country' order by id asc");
	
	while($data = mysqli_fetch_array($query1)) 
	{
?>

<option value="<?php echo $data['city']; ?>"> <?php echo $data['city']; ?> </option>

<?php
	}		
?>

</select>
</span>