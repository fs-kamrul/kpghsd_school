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
        <div class="muted pull-left">Option Form</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>machine_attendant_panel/holly_day_save.html" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Form Date</label>
                        <div class="controls">
                            <input name="form_date" type="date" class="span6" id="typeahead" value="<?php echo date('Y-m-d');?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">To Date</label>
                        <div class="controls">
                            <input name="to_date" type="date" class="span6" id="typeahead" value="<?php echo date('Y-m-d');?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('detail');?></label>
                        <div class="controls">
                            <textarea id="select01" name="detail"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
                        <button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">View Subject</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th>Holly Day</th>
                        <th><?php echo $this->lang->line('detail');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 1;
                    foreach ($holly_day as $v_sub) {
                        ?>
                        <tr>
                            <td><?php echo $sl++; ?></td>
                            <td><?php echo $v_sub->holly_date; ?></td>
                            <td><?php echo $v_sub->detail; ?></td>
                            <td>
                                <div style="margin-top:10px;">
                                    <p>
                                        <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                        <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>-->
                                        <!--<a href="#"><button  class="btn btn-primary" id="notification-sticky"><i class="icon-pencil icon-white"></i><?php echo $this->lang->line('edit');?></button></a>-->
                                        <a href="<?php echo base_url(); ?>machine_attendant_panel/holly_day_delete/<?php echo $v_sub->id; ?>" onclick="return check_delete();"><button  class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></button></a>
                                    </p>										
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>