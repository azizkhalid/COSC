<?php
     
	
    $pdo = new PDO("mysql:host=localhost;dbname=cosc", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);






 $da=date("d-m-Y");


    $sql = "SELECT COUNT(date) from login_log where date='".$da."'" ;

	
		
		 $result = $pdo->query($sql);
		 
 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 

		 
	//echo $number_of_rows;


unset($pdo);
?>
