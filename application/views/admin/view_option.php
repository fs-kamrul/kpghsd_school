<?php
$message = $this->session->userdata('message');
if ($message) {
    ?>

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><?php echo $this->lang->line('success');?> !</h4>
        <?php echo $message; ?>
    </div>
    <?php
    $this->session->unset_userdata('message');
}
?>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th>Option</th>
                        <th>Data</th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($option as $v_option) {
                        ?>
                        <tr>
                            <td><?php echo $v_option->opt_id; ?></td>
                            <td><?php echo $v_option->opt_a; ?></td>
                            <td><?php echo $v_option->data_a; ?></td>
                            <td>
                                <div style="margin-top:10px;">
                                    <p>
                                        <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                        <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>
                                        <button  class="btn btn-primary" id="notification-sticky"><i class="icon-pencil icon-white"></i><?php echo $this->lang->line('edit');?></button>-->
                                        <a href="<?php echo base_url(); ?>super_admin/opt_delete/<?php echo $v_option->opt_id; ?>" onclick="return check_delete();"><button  class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></button></a>


                                        <a href="#myAlert" data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></a>
                                    <div id="myAlert" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">&times;</button>
                                            <h3><?php echo $this->lang->line('confirm_delete');?></h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure Delete This Record.....</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a data-dismiss="modal" class="btn btn-primary" href="#"><?php echo $this->lang->line('confirm');?></a>
                                            <a data-dismiss="modal" class="btn" href="#"><?php echo $this->lang->line('cancel');?></a>
                                        </div>
                                    </div>



                                    </p>										
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <?php //echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
