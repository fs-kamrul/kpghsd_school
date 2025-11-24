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

<script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.js"></script>

<script>
    function all_sum_result() {
        var fine = document.getElementById("fine");
        var discount = document.getElementById("discount");
        var pay_amount = document.getElementById("pay_amount");
        var grand_total = document.getElementById("grand_total");
        var grand_total_pv = document.getElementById("grand_total_pv");

        if(fine.value==''){
            var sum_1 = 0;
        }else{
            var sum_1 = fine.value;
        }
        if(discount.value==''){
            var sum_2 = 0;
        }else{
            var sum_2 = discount.value;
        }
        if(pay_amount.value==''){
            var sum_3 = 0;
        }else{
            var sum_3 = pay_amount.value;
        }
        if(grand_total.value==''){
            var sum_4 = 0;
        }else{
            var sum_4 = grand_total.value;
        }
        if(grand_total_pv.value==''){
            var sum_5 = 0;
        }else{
            var sum_5 = grand_total_pv.value;
        }
        var show_result = parseInt(sum_1) - parseInt(sum_2) + parseInt(sum_4);
        var show_result_due = show_result - parseInt(sum_3);
        // alert(show_result);
        // x.value = x.value.toUpperCase();
        document.getElementById("grand_total_p").innerHTML = show_result;
        // document.getElementById("pay_amount").value = show_result;
        document.getElementById("grand_total_pv").value = show_result;

        document.getElementById("total_due").innerHTML = show_result_due;
        // document.getElementById("show_result").innerHTML = show_result;
    }
</script>
<?php //$month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];                   // print_r($month);?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>invoice_panel/invoice_show_submit" method="post" class="form-horizontal">
                <table class="table" >
                    <tbody>
                        <tr>
                            <td colspan="2" style="background-color: #0b5f31;color: white">
                                <?php echo $this->lang->line('student_name').': ' .$student_select->name;?>
                            </td>
                            <td style="background-color: #0b5f31;color: white">
                                <?php echo $this->lang->line('student_id').': ' .$student_select->id;?>
                            </td>
                            <td style="background-color: #0b5f31;color: white">
                                <?php echo $this->lang->line('roll').': ' .$student_select->roll;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $this->lang->line('class').': ' .$student_select->class;?>
                            </td>
                            <td>
                                <?php echo $this->lang->line('year').': ' .$student_select->year;?>
                            </td>
                            <td>
                                <?php echo $this->lang->line('section').': ' .$student_select->section;?>
                            </td>
                            <td>
                                <?php echo $this->lang->line('group').': ' .$student_select->group_r;?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <hr style="border-bottom:1px solid black;"/>
                <table class="table" >
                    <thead>
                            <tr class="">
<!--                                <td>--><?php //echo $this->lang->line('sl');?><!--</td>-->
<!--                                <td>--><?php //echo $this->lang->line('id');?><!--</td>-->
                                <td><?php echo $this->lang->line('month');?></td>
                                <td><?php echo $this->lang->line('level_amount');?></td>
                                <td><?php echo $this->lang->line('total');?></td>
                                <td><?php echo $this->lang->line('fine');?></td>
                                <td><?php echo $this->lang->line('total_amount');?></td>
                                <td><?php echo $this->lang->line('total_due');?></td>
                            </tr>

                    </thead>
                    <tbody>
                        <?php $g_total = $total_due = 0;
                        foreach ($student_data as $key=>$data){ ?>
                            <tr class="">
<!--                                <td>--><?php //echo $key+1;?><!--</td>-->
<!--                                <td>--><?php //echo $data->student_id;?><!--</td>-->
                                <td><?php echo $data->month_b . ', ' . $data->year_b;?></td>
                                <td><?php //echo $this->lang->line('tuition_fee').' : '.$data->tution_fee;
                                    if($data->tution_fee > 0){ echo ''.$this->lang->line('tuition_fee').' : '.$data->tution_fee; }
                                    if($data->previous_due > 0){ echo ''.$this->lang->line('previous_due').' : '.$data->previous_due; }
                                    if($data->re_addmission_fee > 0){ echo '<br/>'.$this->lang->line('admission_fee').' : '.$data->re_addmission_fee; }
                                    if($data->dev_fee > 0){ echo '<br/>'.$this->lang->line('development_fee').' : '.$data->dev_fee; }
                                    if($data->tiffin_fee > 0){ echo '<br/>'.$this->lang->line('tiffin_fee').' : '.$data->tiffin_fee; }
                                    if($data->lab_fee > 0){ echo '<br/>'.$this->lang->line('lab_fee').' : '.$data->lab_fee; }
                                    if($data->session_others_fee > 0){ echo '<br/>'.$this->lang->line('session_fee').' : '.$data->session_others_fee; }
                                    if($data->exam_fee > 0){ echo '<br/>'.$this->lang->line('exam_fee').' : '.$data->exam_fee; }
                                    if($data->tesitimonial_fee > 0){ echo '<br/>'.$this->lang->line('tesitimonial_fee').' : '.$data->tesitimonial_fee; }
                                    if($data->tc_fee > 0){ echo '<br/>'.$this->lang->line('tc_fee').' : '.$data->tc_fee; }
                                    if($data->board_reg > 0){ echo '<br/>'.$this->lang->line('board_reg').' : '.$data->board_reg; }
                                    if($data->cultural_fee > 0){ echo '<br/>'.$this->lang->line('cultural_fee').' : '.$data->cultural_fee; }
                                    if($data->scout_fee > 0){ echo '<br/>'.$this->lang->line('scout_fee').' : '.$data->scout_fee; }
                                    if($data->game_fee > 0){ echo '<br/>'.$this->lang->line('game_fee').' : '.$data->game_fee; }
                                    if($data->common_fee > 0){ echo '<br/>'.$this->lang->line('common_fee').' : '.$data->common_fee; }
                                    if($data->poor_fund > 0){ echo '<br/>'.$this->lang->line('poor_fund').' : '.$data->poor_fund; }
                                    if($data->magazine_fee > 0){ echo '<br/>'.$this->lang->line('magazine_fee').' : '.$data->magazine_fee; }
                                    if($data->id_card_fee > 0){ echo '<br/>'.$this->lang->line('id_card_fee').' : '.$data->id_card_fee; }
                                    if($data->library_fee > 0){ echo '<br/>'.$this->lang->line('library_fee').' : '.$data->library_fee; }
                                    if($data->receit_fee > 0){ echo '<br/>'.$this->lang->line('receit_fee').' : '.$data->receit_fee; }
                                    if($data->dev_study_fee > 0){ echo '<br/>'.$this->lang->line('dev_study_fee').' : '.$data->dev_study_fee; }
                                    if($data->computer_fee > 0){ echo '<br/>'.$this->lang->line('computer_fee').' : '.$data->computer_fee; }
                                    if($data->admission_form_fee > 0){ echo '<br/>'.$this->lang->line('admission_form_fee').' : '.$data->admission_form_fee; }
                                    if($data->batch_fee > 0){ echo '<br/>'.$this->lang->line('batch_fee').' : '.$data->batch_fee; }
                                    if($data->name_plate_fee > 0){ echo '<br/>'.$this->lang->line('name_plate_fee').' : '.$data->name_plate_fee; }
                                    if($data->mark_sheet_fee > 0){ echo '<br/>'.$this->lang->line('mark_sheet_fee').' : '.$data->mark_sheet_fee; }
                                    if($data->transportation_fee > 0){ echo '<br/>'.$this->lang->line('transportation_fee').' : '.$data->transportation_fee; }
                                    if($data->medical_fee > 0){ echo '<br/>'.$this->lang->line('medical_fee').' : '.$data->medical_fee; }
                                    if($data->kallnayan_fund > 0){ echo '<br/>'.$this->lang->line('kallnayan_fund').' : '.$data->kallnayan_fund; }
                                    if($data->electricity_fee > 0){ echo '<br/>'.$this->lang->line('electricity_fee').' : '.$data->electricity_fee; }
                                    if($data->syllabus_fee > 0){ echo '<br/>'.$this->lang->line('syllabus_fee').' : '.$data->syllabus_fee; }
                                    if($data->others_fee > 0){ echo '<br/>'.$this->lang->line('others_fee').' : '.$data->others_fee; }


                                    ?>  </td>
                                <td><?php echo $data->total_amnt;?></td>
                                <td><?php echo $data->fine;?></td>
                                <td><?php echo $data->g_total; $g_total+=$data->g_total; ?></td>
                                <td><?php echo $data->total_due; $total_due+=$data->total_due; ?></td>
                            </tr>
                            <input type="hidden" name="tbl_baton_invoice_id[]" value="<?php echo $data->id; ?>">
                            <input type="hidden" name="tbl_baton_month[<?php echo $data->id; ?>]" value="<?php echo $data->total_due; ?>">
                            <input type="hidden" name="tbl_baton_month_paid[<?php echo $data->id; ?>]" value="<?php echo $data->total_paid; ?>">
                            <input type="hidden" name="tbl_baton_month_fine[<?php echo $data->id; ?>]" value="<?php echo $data->fine; ?>">
                            <input type="hidden" name="tbl_baton_month_total_amnt[<?php echo $data->id; ?>]" value="<?php echo $data->total_amnt; ?>">
                            <input type="hidden" name="student_id" value="<?php echo $data->student_id; ?>">
                            <input type="hidden" name="reg_id" value="<?php echo $data->reg_id; ?>">
                            <input type="hidden" name="year_stu_b" value="<?php echo $data->year_stu_b; ?>">
                            <input type="hidden" name="class_b" value="<?php echo $data->class_b; ?>">
                            <input type="hidden" name="group_b" value="<?php echo $data->group_b; ?>">
                            <input type="hidden" name="section_b" value="<?php echo $data->section_b; ?>">
                            <input type="hidden" name="month_b" value="<?php echo $data->month_b; ?>">
                            <input type="hidden" name="year_b" value="<?php echo $data->year_b; ?>">
                        <?php } ?>

                        <tr class="">
                            <td colspan="8"></td>
                        </tr>
                        <tr class="">
                            <td colspan="2"><label style="float: right;"><?php echo $this->lang->line('fine');?> :</label></td>
                            <td colspan="4"><input onkeyup="all_sum_result()" type="text" id="fine" name="fine" value="0"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="">
                            <td colspan="2"><label style="float: right;"><?php echo $this->lang->line('less');?> :</label></td>
                            <td colspan="4"><input onkeyup="all_sum_result()" type="text" id="discount" name="discount" value="0"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="">
                            <td colspan="2"><label style="float: right;"><?php echo $this->lang->line('grand_total');?> :</label></td>
                            <td colspan="4"><label id="grand_total_p"><?php echo $total_due; ?></label>
                                <input type="hidden" id="grand_total" name="grand_total_main" value="<?php echo $total_due; ?>">
                                <input type="hidden" id="grand_total_pv" name="grand_total" value="<?php echo $total_due; ?>">
                            </td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="">
                            <td colspan="2"><label style="float: right;"><?php echo $this->lang->line('pay_amount');?> :</label></td>
                            <td colspan="4"><input onkeyup="all_sum_result()" type="text" id="pay_amount" name="pay_amount" value="0"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="">
                            <td colspan="2"><label style="float: right;"><?php echo $this->lang->line('total_due');?> :</label></td>
                            <td colspan="4"><label id="total_due"><?php echo $total_due; ?></label></td>
                            <td colspan="2"></td>
                        </tr>

                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit');?></button>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
    </div>
</div>

