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
            <form action="<?php echo base_url(); ?>profile_panel/change_password_submit.html" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="previous_password"><?php echo $this->lang->line('previous_password');?></label>
                        <div class="controls">
                            <input name="previous_password" type="password" class="span6" id="typeahead" value="" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="new_password"><?php echo $this->lang->line('new_password');?></label>
                        <div class="controls">
                            <input name="new_password" type="password" class="span6" id="address" value="" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="repeat_password"><?php echo $this->lang->line('repeat_password');?></label>
                        <div class="controls">
                            <input name="repeat_password" type="password" class="span6" id="typeahead" required="" value="">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('update');?></button>
                        <!--<button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>-->
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>