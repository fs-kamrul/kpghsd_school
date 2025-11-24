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
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal" action="<?php echo base_url(); ?>notice_panel/save_notice" enctype="multipart/form-data" method="POST">
                    <fieldset>
                        <!--<legend>New Notice</legend>-->
                        <div class="control-group">
                            <label class="control-label" for="typeahead"><?php echo $this->lang->line('notice_title');?></label>
                            <div class="controls">
                                <input type="text" class="span9" id="typeahead" name="n_title">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="select01">Department</label>
                            <div class="controls">
                                <select id="select01" class="chzn-select" name="n_dept">
                                    <option>All</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput"><?php echo $this->lang->line('notice_file');?></label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" type="file" name="n_file">
                                <p>Any kind of file like pdf,doc,xlsx  </p>
                            </div>
                        </div>
<!--                        <div class="control-group">
                            <label class="control-label" for="fileInput"><?php echo $this->lang->line('image');?></label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" type="file" name="n_image">
                            </div>
                        </div>-->
                        <div class="control-group">
                            <label class="control-label" for="textarea2"><?php echo $this->lang->line('notice_detail');?></label>
                            <div class="controls">
                                <textarea class="input-xlarge textarea" placeholder="Enter text ..." style="width: 710px; height: 200px" name="n_contain"></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('public_notice');?></button>
                            <button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /block -->
</div>