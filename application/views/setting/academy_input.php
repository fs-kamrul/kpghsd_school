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
            <form action="<?php echo base_url(); ?>setting_panel/save_info.html" method="post" class="form-horizontal"  enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="s_name"><?php echo $this->lang->line('school_name');?></label>
                        <div class="controls">
                            <input name="s_name" type="text" class="span6" id="s_name" value="<?php if($academy_info) echo $academy_info->s_name;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="address"><?php echo $this->lang->line('address');?></label>
                        <div class="controls">
                            <input name="s_address" type="text" class="span6" id="address" value="<?php if($academy_info) echo $academy_info->s_address;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="s_code"><?php echo $this->lang->line('school_code');?></label>
                        <div class="controls">
                            <input name="s_code" type="text" class="span6" id="s_code" required="" value="<?php if($academy_info) echo $academy_info->s_code;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email"><?php echo $this->lang->line('email');?></label>
                        <div class="controls">
                            <input name="email" type="text" class="span6" id="email"  value="<?php if($academy_info) echo $academy_info->email;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phone_number"><?php echo $this->lang->line('phone_number');?></label>
                        <div class="controls">
                            <input name="phone_number" type="text" class="span6" id="phone_number"  value="<?php if($academy_info) echo $academy_info->phone_number;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="site_url"><?php echo $this->lang->line('site_url');?></label>
                        <div class="controls">
                            <input name="site_url" type="text" class="span6" id="site_url"  value="<?php if($academy_info) echo $academy_info->site_url;?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="favicon"><?php echo $this->lang->line('favicon');?></label>
                        <div class="controls">
                            <input name="favicon" class="input-file uniform_on" id="favicon" type="file">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="logo"><?php echo $this->lang->line('logo');?></label>
                        <div class="controls">
                            <input name="logo" class="input-file uniform_on" id="logo" type="file">
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <!--<button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>-->
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>