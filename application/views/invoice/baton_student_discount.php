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
<?php $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];                   // print_r($month);?>

<script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>invoice_panel/save_invoice_set_package.html" method="post" class="form-horizontal">
                <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                    <thead>
                        <tr>
<!--                            <th><input type="checkbox" class="uniform_on" id="select_all">--><?php //echo $this->lang->line('check_all');?><!--</th>-->
                            <!--<th><?php echo $this->lang->line('image');?></th>-->
                            <th><?php echo $this->lang->line('discount');?></th>
                            <th><?php echo $this->lang->line('id');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('name');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($all_class as $v_class_reg) {
                            ?>
                            <tr>
<!--                                <td><input type="checkbox" class="checkbox" name="check[--><?php //echo $i; ?><!--]"></td>-->
                                <td>
<!--                                    <input type="text" name="previous_due--><?php //echo $i; ?><!--" value="">-->
                                <select name="discount<?php echo $i; ?>">
                                    <?php for($ij=0;$ij<=100;$ij++){ ?>
                                    <option value="<?php echo $ij; ?>"><?php echo $ij; ?> %</option>
                                    <?php } ?>
                                </select></td>
                        <input type="hidden" name="class_b<?php echo $i; ?>" value="<?php echo $v_class_reg->class; ?>"/>
                        <input type="hidden" name="reg_id<?php echo $i; ?>" value="<?php echo $v_class_reg->reg_id; ?>">
                        <input type="hidden" name="group_b<?php echo $i; ?>" value="<?php echo $v_class_reg->group_r; ?>">
                        <input type="hidden" name="section_b<?php echo $i; ?>" value="<?php echo $v_class_reg->section; ?>">
                        <input type="hidden" name="year_stu_b<?php echo $i; ?>" value="<?php echo $v_class_reg->year; ?>">
                        <!--<td>
                            <img  width="80px" src="<?php // echo $v_class_reg->photo; ?>" alt="<?php //echo $v_class_reg->name; ?>">
                        </td>-->
                        <td><?php echo $v_class_reg->id; ?><input type="hidden" name="id<?php echo $i; ?>" value="<?php echo $v_class_reg->id; ?>"></td>
                        <td><?php echo $v_class_reg->roll; ?><input type="hidden" name="roll<?php echo $i; ?>" value="<?php echo $v_class_reg->roll; ?>"></td>
                        <td><?php echo $v_class_reg->name; ?><input type="hidden" name="name<?php echo $i; ?>" value="<?php echo $v_class_reg->name; ?>"></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>   <input type="hidden" name="other" value="<?php echo $i - 1; ?>">

                        <input type="hidden" name="class" value="<?php echo $class; ?>"/>
                        <input type="hidden" name="group_r" value="<?php echo $group_r; ?>">
                        <input type="hidden" name="year" value="<?php echo $year; ?>">
                        <input type="hidden" name="tbl_baton_package_id" value="<?php echo $tbl_baton_package_id; ?>">
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary"> <?php echo $this->lang->line('generate');?></button>
            </form>
        </div>
    </div>
</div>
<script>
    //document.getElementById('class').value = '<?php //echo $all_class->data_a; ?>//';
    //document.getElementById('section').value = '<?php //echo $all_class->data_a; ?>//';
    //document.getElementById('year').value = '<?php //echo $all_class->data_a; ?>//';
</script>