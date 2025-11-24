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
            <form action="<?php echo base_url(); ?>mark_panel/save_add_mark.html" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('mark_title');?></label>
                        <div class="controls">
                            <!--<input name="mark_title" type="text" class="span6" id="typeahead" required="">-->
                            <select  name="mark_title" id="class_id" >
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'add_mark') {
                                            ?>
                                            <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mark_number');?></label>
                        <div class="controls">
                            <input name="mark_number" type="text" class="span6" id="mark" required="" onkeyup="checkmark()">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('pass_mark');?></label>
                        <div class="controls">
                            <input name="mark_pass" type="radio" class="span1" id="radio1" checked="" value="1"><label for="radio1" style="display: inline">Yes</label>
                            <input name="mark_pass" type="radio" class="span1" id="radio2" value="0"><label for="radio2" style="display: inline">No</label>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <a href="<?php echo base_url(); ?>mark_panel/mark_show" class="btn btn-warning">return</a>
                        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>
<script>
    function checkmark(){
        var x = document.getElementById("mark").value;
        var total = <?php echo $sub_mark-$totalmark; ?>;
        var c=parseFloat(x);
        if(total<=c){
            document.getElementById("mark").value=total;
        }else if(total>=c){
            document.getElementById("mark").value=c;
        }else{
            document.getElementById("mark").value='';
        }
            
    }
</script>
