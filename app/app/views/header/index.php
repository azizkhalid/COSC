<?php require_once '../app/views/templates/header.php' ?>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <h3>Header</h3>
                <p class="lead"> Add New Header Image</p>
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
	<?php 
	$con = mysqli_connect("localhost","root","","cosc");

							$sql="select * from header";
							$query=mysqli_query($con,$sql);
							$row=mysqli_fetch_array($query);
							?>
    <div class="row">
        <div class="col-md-8">
            <div class="table">
                <form action=""  enctype="multipart/form-data" method="post">
				<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Uplode Header Image</label><br>
                     <img src="public/images/<?php echo $row['file'];?>" style="height:100px; width:150px0px;" ><br>
<input type="file" class="form-control" value="<?php echo $row['file'];?>"  id="recipient-name" name="file" data-subject>
                  </div>
               <input type="submit" name="submit" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>

    
<?php

if(isset($_POST['submit']))
{

	$id=$_POST['id'];
				$file=$_FILES['file']['name'];
				if($file!='')
	{
	$img_tmp=$_FILES['file']['tmp_name'];

	move_uploaded_file($img_tmp,"images/".$file);
	 mysqli_query($con,"UPDATE header set `file`='$file' WHERE id='$id'");
	
	}	

	
}	


?>
    <?php require_once '../app/views/templates/privatefooter.php' ?>
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
