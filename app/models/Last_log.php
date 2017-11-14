<?php require_once '../app/views/templates/header.php' ?>
<?php

    
		$pdo = new PDO("mysql:host=localhost;dbname=cosc", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





?>
<?php $ab=$_SESSION['username']?>
<?php
    $sql = "SELECT time FROM `login_log` where username='".$ab."' ORDER by id DESC limit 2" ;

	
		
		 $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        while($row = $result->fetch()){
      
                $abc=  $row['time'] ;
  //echo $abc;            
        }
		 
	}
	
	else{
	$abc= date("d-m-Y"); 
	
    }


unset($pdo);    


?>