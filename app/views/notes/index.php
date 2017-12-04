<?php require_once '../app/views/templates/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <h3>Reports</h3>
                <p class="lead"> List of all reports</p>
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


    <div class="row">
        <div class="col-lg-12">
            <p> <?php //$data['message']?> </p>
            <div class="table">
                <table class="tblReminders">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
							<th>Name</th>
                            <th>Last Login</th>
							 <th>Total Notes</th>
                        </tr>
                    </thead>
                    <tbody>
					
					
					<?php
					
					//$data['notes']=array_unique($data['notes']);
					
					?>
					
                        <?php if (count($data['notes']) == 0){ ?>
                            <tr><td colspan="5">No Report to display</td></tr>
                        <?php  } else { ?>
                            <?php 
							
							$aa[]='';
							foreach ($data['notes'] as $key => $value) {
								
							

							if (!in_array($value['u_id'], $aa)){
								
								$aa[]=$value['u_id'];	
							
		?>
                                <tr class="data-row">
                                    <td><?php echo $value['u_id']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
									<td><?php echo $value['fname']." ".$value['lname'];  ?></td>
                                     <td>
									
                                   <?php
                                   $date_check=1;
								   foreach ($data['check123'] as $key123 => $value123) {

                                    if( $value123['username']==$value['u_id'])
								   {
									   
									  if($date_check==1)
									  { 
									   
									   echo $value123['date']."<br>";
									   
									  }
									  
									  $date_check++;
									  
									   
								   }	
									
									
								   }
									 ?> 
									 </td>
									<td>
									
									<?php
                                   $date_check123=0;
								   foreach ($data['check456'] as $key456 => $value456) {
if( $value456['username']==$value['u_id'])
								   {
									   $date_check123=$date_check123+1;
									   
								   }
									

								 } ?>									
									<?php echo $date_check123; ?>
									</td>
                                </tr>
                            <?php } } ?>   
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div>
    <h3 align="center" style="color:#900; border:2px solid #009; background:#FFCB32; margin-bottom:30px"><b>Data In Jason Format</b></h3>
    <div align="right">
    <form ction='index.php' method='post'>
    <input type="submit" id="json_data" name="json_data" class="btn btn-primary" value="Export Data" />
    </form>
    </div>
    <div align="center" >
       <?php
include('../app/controllers/api.php');
?>
<hr />
<?php
	if(isset($_POST['json_data']))
	{
	$filename=date("Y-m-d");
$myFile = $filename.".txt";
$fh = fopen($myFile, 'a+') or die("can't open file");
$stringData = json_encode($jsondata);
fwrite($fh, $stringData);
fclose($fh);
	}
 ?>  
</div>

    </div>
  
    
  
    <?php require_once '../app/views/templates/privatefooter.php' ?>
   