<?php
include('../app/controllers/Last_log.php');
?>
<?php

//ini_set('display_errors', 0);
//error_reporting(E_ERROR | E_WARNING | E_PARSE); 

?>

<footer class="footer" style="background:#FFCB32">    
    <div class="row ">
    
        <div class="col-lg-12 w3-container " align="center"  style="height:55px">
            <h4>Last Date of Login: <b> <?php echo $da; ?></b></h4> 
            
        </div>
    </div>
</footer>
<footer class="footer" style="background:#333; color:#FFF">    
    <div class="row ">
    
        <div class="col-lg-12 w3-container " align="center">
            
            <p> Private Footer Copy &copy; <?php echo date('Y'); ?> </p>
        </div>
    </div>
</footer>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.tblReminders').DataTable();
});
</script>
</body>
</html>