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
<script>
    function all_sum_result() {
        var tution_fee = document.getElementById("tution_fee");
        var tiffin_fee = document.getElementById("tiffin_fee");
        var fine = document.getElementById("fine");
        // var delay_fee = document.getElementById("delay_fee");
        var re_addmission_fee = document.getElementById("re_addmission_fee");
        var dev_fee = document.getElementById("dev_fee");
        var session_others_fee = document.getElementById("session_others_fee");
        var lab_fee = document.getElementById("lab_fee");
        var others_fee = document.getElementById("others_fee");

        if(tution_fee.value==''){
            var sum_1 = 0;
        }else{
            var sum_1 = tution_fee.value;
        }
        if(tiffin_fee.value==''){
            var sum_2 = 0;
        }else{
            var sum_2 = tiffin_fee.value;
        }
        if(fine.value==''){
            var sum_3 = 0;
        }else{
            var sum_3 = fine.value;
        }
        // if(delay_fee.value==''){
            var sum_4 = 0;
        // }else{
        //     var sum_4 = delay_fee.value;
        // }
        if(re_addmission_fee.value==''){
            var sum_5 = 0;
        }else{
            var sum_5 = re_addmission_fee.value;
        }
        if(dev_fee.value==''){
            var sum_6 = 0;
        }else{
            var sum_6 = dev_fee.value;
        }
        if(session_others_fee.value==''){
            var sum_7 = 0;
        }else{
            var sum_7 = session_others_fee.value;
        }
        if(lab_fee.value==''){
            var sum_8 = 0;
        }else{
            var sum_8 = lab_fee.value;
        }
        if(others_fee.value==''){
            var sum_9 = 0;
        }else{
            var sum_9 = others_fee.value;
        }
        var show_result = parseInt(sum_1) + parseInt(sum_2) + parseInt(sum_3) + parseInt(sum_4) + parseInt(sum_5) + parseInt(sum_6) + parseInt(sum_7) + parseInt(sum_8) + parseInt(sum_9);
        // alert(show_result);
        // x.value = x.value.toUpperCase();
        document.getElementById("show_result").innerHTML = show_result;
    }
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>baton_panel/baton_save.html" method="post" class="form-horizontal">
                <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="uniform_on" id="select_all"><?php echo $this->lang->line('check_all');?></th>
                            <!--<th><?php echo $this->lang->line('image');?></th>-->
                            <th><?php echo $this->lang->line('receite_no');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('id');?></th>
                            <th><?php echo $this->lang->line('name');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($all_class as $v_class_reg) {
                            ?>
                            <tr>
                                <td><input type="checkbox" class="checkbox" name="check[<?php echo $i; ?>]"></td>
                                <td><input style="width: 65px;" type="text" name="receite_no<?php echo $i; ?>" value=""></td>
                        <input type="hidden" name="class_b<?php echo $i; ?>" value="<?php echo $v_class_reg->class; ?>"/>
                        <input type="hidden" name="reg_id<?php echo $i; ?>" value="<?php echo $v_class_reg->reg_id; ?>">
                        <input type="hidden" name="group_b<?php echo $i; ?>" value="<?php echo $v_class_reg->group_r; ?>">
                        <input type="hidden" name="section_b<?php echo $i; ?>" value="<?php echo $v_class_reg->section; ?>">
                        <input type="hidden" name="year_stu_b<?php echo $i; ?>" value="<?php echo $v_class_reg->year; ?>">
                        <!--<td>
                            <img  width="80px" src="<?php // echo $v_class_reg->photo; ?>" alt="<?php //echo $v_class_reg->name; ?>">
                        </td>-->
                        <td><?php echo $v_class_reg->roll; ?><input type="hidden" name="roll<?php echo $i; ?>" value="<?php echo $v_class_reg->roll; ?>"></td>
                        <td><?php echo $v_class_reg->id; ?><input type="hidden" name="id<?php echo $i; ?>" value="<?php echo $v_class_reg->id; ?>"></td>
                        <td><?php echo $v_class_reg->name; ?><input type="hidden" name="name<?php echo $i; ?>" value="<?php echo $v_class_reg->name; ?>"></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>   <input type="hidden" name="other" value="<?php echo $i - 1; ?>">
                    </tbody>
                </table>
                <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                    <tbody> 
                        <tr>
                            <td style="background-color: #29c5ea;">
                                <samp style="color: red;"><b><?php echo $this->lang->line('tuition_fee');?></b></samp>
                            </td>
                            <td>
                                <input name="tution_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="tution_fee" required  >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <samp><b><?php echo $this->lang->line('tiffin_fee');?></b></samp>
                            </td>
                            <td>
                                <input name="tiffin_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="tiffin_fee">
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #29c5ea;">
                                <samp><b><?php echo $this->lang->line('fine');?></b></samp>
                            </td>
                            <td>
                                <input name="fine" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="fine">
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <samp><b>--><?php //echo $this->lang->line('development_fee');?><!--Delay Tution Fee</b></samp>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                <input name="delay_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="delay_fee">-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td style="background-color: #29c5ea;">
                                <samp><b><?php echo $this->lang->line('admission_fee');?></b></samp>
                            </td>
                            <td>
                                <input name="re_addmission_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="re_addmission_fee">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <samp><b><?php echo $this->lang->line('development_fee');?></b></samp>
                            </td>
                            <td>
                                <input name="dev_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="dev_fee">
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #29c5ea;">
                                <samp><b><?php echo $this->lang->line('session_fee');?></b></samp>
                            </td>
                            <td>
                                <input name="session_others_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="session_others_fee">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <samp><b><?php echo $this->lang->line('lab_fee');?></b></samp>
                            </td>
                            <td>
                                <input name="lab_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="lab_fee">
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #29c5ea;">
                                <samp><b><?php echo $this->lang->line('others_fee');?></b></samp>
                            </td>
                            <td>
                                <input name="others_fee" onkeyup="all_sum_result()" style="width: 50%;" type="text" class="span6" id="others_fee">
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #2b8c52;color: white;">
                                <samp><b><?php echo $this->lang->line('total');?></b></samp>
                            </td>
                            <td style="background-color: #2b8c52;color: white;">
                                <span id="show_result"></span>
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td style="color: red;">-->
<!--                                <samp><b>Entry Date</b></samp>-->
<!--                            </td>-->
<!--                            <td>-->
<!--                                datepicker-->
<!--                                <input name="entry_date" value="--><?php //echo date('m/d/Y');?><!--" style="width: 50%;" type="date" class="input-xlarge" id="alinfo" required="">-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td style="background-color: #00fd20;">
                                <samp><b><?php echo $this->lang->line('month');?> :</b></samp>
                                <select  name="month_b" id="select01" class="">
                                    <?php
                                    foreach ($month as $key => $v_option) {
                                        $m = date('m');
                                        if ($m == $key + 1) {
                                            ?>
                                            <option value="<?php echo $v_option; ?>" selected><?php echo $v_option; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $v_option; ?>"><?php echo $v_option; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="background-color: #00fd20;">
                                <samp><b><?php echo $this->lang->line('year');?> :</b></samp>
                                <select  name="year_b" id="select01" class="">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'year') {
                                            $ye = $v_option->data_a;
                                            $y = "";
                                            if ($year == "") {
                                                $y = date('Y');
                                            } else {
                                                $y = $year;
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
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary"> <?php echo $this->lang->line('submit');?></button>
            </form>
        </div>
    </div>
</div>
<script>
    //document.getElementById('class').value = '<?php //echo $all_class->data_a; ?>//';
    //document.getElementById('section').value = '<?php //echo $all_class->data_a; ?>//';
    //document.getElementById('year').value = '<?php //echo $all_class->data_a; ?>//';
</script>