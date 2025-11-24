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
<?php
$erroraaa = $this->session->userdata('erroraaa');
if ($erroraaa) {
    ?>
    <div class="alert alert-error">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $this->lang->line('error');?> !</strong> <?php echo $erroraaa; ?>
    </div>
    <?php
    $this->session->unset_userdata('erroraaa');
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
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('email_address');?></th>
                        <th><?php echo $this->lang->line('profession');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl=1;
                    foreach ($teach as $v_reg) {
                        ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td>
                                <img height="100" width="120" src="<?php if($v_reg->photo!=""){ echo base_url() . $v_reg->photo; } ?>" alt="<?php echo $v_reg->admin_name; ?>">
                            </td>
                            <td><?php echo $v_reg->admin_name; ?></td>
                            <td><?php echo $v_reg->admin_email_address; ?></td>
                            <td><?php echo $v_reg->profetion; ?></td>
                            <td>
                                <?php if($user_power == 'super_admin'){ ?>
                                <div style="margin-top:10px;">
                                    <p>
                                        <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                        <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>-->
                                        <a href="<?php echo base_url(); ?>super_admin/teacher_edit/<?php echo $v_reg->admin_id; ?>"><button class="btn btn-primary"><i class="icon-pencil icon-white"></i><?php echo $this->lang->line('edit');?></button></a>
                                        <a href="<?php echo base_url(); ?>super_admin/teacher_delete/<?php echo $v_reg->admin_id; ?>" onclick="return check_delete();"><button class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></button></a>

                                    </p>										
                                </div>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>