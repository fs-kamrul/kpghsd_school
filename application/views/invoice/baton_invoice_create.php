<?php
$message = $this->session->userdata('message');
//$error = $this->session->userdata('error');
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
$erroraaa = $this->session->userdata('erroraaa');
if ($erroraaa) {
    ?>

    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><?php echo $this->lang->line('error');?> !</h4>
        <?php echo $erroraaa; ?>
    </div>
<?php
$this->session->unset_userdata('erroraaa');
}
?>

<?php //$month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];                   // print_r($month);?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>invoice_panel/invoice_show" method="post" class="form-horizontal">
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('student_id');?></td>
                            <td><input type="text" name="student_id"></td>
                            <td></td>
                        </tr>

                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('invoice');?></button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
    </div>
</div>

