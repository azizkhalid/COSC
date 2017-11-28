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
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Created date</th>
							<th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($data['reminders']) == 0){ ?>
                            <tr><td colspan="5">No reminders to display</td></tr>
                        <?php  } else { ?>
                            <?php foreach ($data['reminders'] as $key => $value) { ?>
                                <tr class="data-row">
                                    <td class="data-subject"><?php echo $value['subject']; ?></td>
                                    <td class="data-description"><?php echo $value['description']; ?></td>
                                    <td><?php echo date('d-M-Y H:i:sa', $value['created_date']); ?></td>
									<td><?php echo $value['username'];  ?></td>
                                    <td data-date="<?php echo date('d-M-Y H:i:sa', $value['created_date']); ?>" data-id="<?php echo $value['id']; ?>">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#view-modal" id="view-btn">View</button>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-modal" id="edit-btn">Edit</button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal" id="delete-btn">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>   
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Delete reminder?</h4>
              </div>
              <div class="modal-body">
                <p>Are you share to delete this reminder? &hellip;</p>
              </div>
              <div class="modal-footer">
                <a href="" class="btn btn-default delete-btn">Delete</a>
                <button type="button" class="btn btn-primary" data-modal-close>Close</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <div class="modal fade view-modal" tabindex="-1" role="dialog" id="view-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title">View reminder</h2>
              </div>
              <div class="modal-body">
                <p data-subject></p>
                <br>
                <blockquote data-description></blockquote>
                <hr>
                <small data-created-date></small>
                <br>

              </div>
              <div class="modal-footer">
                <button type="button" href="#" class="btn btn-primary" data-modal-close>Close</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade view-modal" id="edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit reminder</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('reminders/update'); ?>" method="post">
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Subject</label>
                    <input type="text" class="form-control" id="recipient-name" name="subject" data-subject>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Description</label>
                    <textarea class="form-control" id="message-text" name="description" data-description></textarea>
                  </div>
                  <input type="hidden" name="id" data-id>
                
              </div>
              <div class="modal-footer">
                <button type="submit" href="#" class="btn btn-default">Save</button>
                <button type="button" href="#" class="btn btn-primary" data-modal-close>Cancel</button>
              </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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