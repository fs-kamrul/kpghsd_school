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
            <form action="<?php echo base_url(); ?>super_admin/opsion_save.html" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="select01">Option</label>
                        <div class="controls">
                            <select  name="opt_a" id="select01" class="">
                                <option>select....</option>
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'Option') {
                                        ?>
                                        <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Data</label>
                        <div class="controls">
                            <input name="data_a" type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="order">Order</label>
                        <div class="controls">
                            <input name="order" type="text" class="span6" id="order" >
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