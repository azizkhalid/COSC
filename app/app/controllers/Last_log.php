<?php

    
		$pdo = new PDO("mysql:host=localhost;dbname=cosc", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




        //Check if entry exists within last 60 seconds
		$ab=$_SESSION['username'];
        $sql = "SELECT date FROM login_log where username='".$ab."' ORDER by id DESC limit 2";
        $query = $pdo->prepare($sql);
        $result= $query->execute();
		if($result) 
		{
			if($query->rowCount()>0)
		{
			foreach($query as $row)
        {
          
		
				$da=$row['date'];
		 		
				
				
		}
		
						//echo $da;

      
    }
		}
	
