<?php require_once '../app/views/templates/header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <br>
            <div class="col-lg-12">
                <h3>Reports</h3>
                <p class="lead"> Add New Report</p>
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
        <div class="col-md-8">
            <div class="table">
                <form action="<?php echo base_url('reminders/save'); ?>" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Subject</label>
                    <input type="text" class="form-control" id="recipient-name" name="subject" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Description</label>
                    <textarea class="form-control" id="message-text" name="description" data-description></textarea>
                  </div>
                  <input type="submit" name="submit" class="btn btn-info">
                  <input type="reset" value="Reset" class="btn btn-warning">            
                </form>
            </div>
        </div>
    </div>

    
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