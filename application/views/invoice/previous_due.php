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
$sdata = array();
$sdata['session']  = $this->session->userdata('session');
$sdata['year'] = $this->session->userdata('year');
$sdata['class']  = $this->session->userdata('class');
$sdata['group_r']  = $this->session->userdata('group_r');
$sdata['month_s']  = $this->session->userdata('month_s');
?>

<?php $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];                   // print_r($month);?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>invoice_panel/previous_due_show" method="post" class="form-horizontal">
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('session');?> :</td>
                            <td>
                                <select  name="year" id="select01" class="">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'year') {
                                            $ye = $v_option->data_a;
                                            $y = "";
                                            if ($sdata['session'] == "") {
                                                $y = date('Y');
                                            } else {
                                                $y = $sdata['session'];
                                            }
                                            if ($y == $ye) {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>" selected><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('class');?> :</td>
                            <td>
                                <select  name="class" id="class_id" >
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'class') {
                                            ?>
                                            <option value="<?php echo $v_option->data_a; ?>" <?php echo ($sdata['class'] == $v_option->data_a) ? 'selected' : ''; ?> ><?php echo $v_option->data_a; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('section');?></td>
                            <td>
                                <select name="section"  id="group_r" class="">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'section') {
                                            ?>
                                    <option value="<?php echo $v_option->data_a; ?>"  <?php echo ($sdata['group_r'] == $v_option->data_a) ? 'selected' : ''; ?> ><?php echo $v_option->data_a; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('group');?></td>
                            <td>
                                <select name="group"  id="group_r" class="">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'group') {
                                            ?>
                                    <option value="<?php echo $v_option->data_a; ?>"  <?php echo ($sdata['group_r'] == $v_option->data_a) ? 'selected' : ''; ?> ><?php echo $v_option->data_a; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>

                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('generate_invoice');?></button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </form>
<?php
if ($sdata['session']) {
    $this->session->unset_userdata($sdata);
}
?>
        </div>
    </div>
</div>

