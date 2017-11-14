<?php
include('../app/controllers/Login_attempts.php');
?>
<footer class="footer" style="background:#FFCB32; height:10px">    
    
</footer>
<footer class="footer" style="background:#333;color:#FFF; height:55px">    
    <div class="row">
    
        <div class="col-lg-12" align="center" >
             <p style=" color:#FFF">Login attempts today : <?php echo $number_of_rows; ?> </p>
              <p>Public Footer Copy &copy; <?php echo date('Y'); ?> </p>
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