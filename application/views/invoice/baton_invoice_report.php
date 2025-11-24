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
<?php $montha = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];     //,'Previous Due'              // print_r($month);?>
<?php
    $monthaa['January']['tk']=0;
    $monthaa['February']['tk']=0;
    $monthaa['March']['tk']=0;
    $monthaa['April']['tk']=0;
    $monthaa['May']['tk']=0;
    $monthaa['June']['tk']=0;
    $monthaa['July']['tk']=0;
    $monthaa['August']['tk']=0;
    $monthaa['September']['tk']=0;
    $monthaa['October']['tk']=0;
    $monthaa['November']['tk']=0;
    $monthaa['December']['tk']=0;
    $monthaa['Previous Due']['tk']=0;

//    print_r($monthaa);
?>
<style>
    .prhide {
        display: none;
    }
    .result_0{
        float: left;
        width: 180px;
    }
    @media print {
        .prhide {
            display: block;
        }
    }
</style>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>invoice_panel/invoice_report.html" method="post" class="form-horizontal">
<!--                <samp><b>View: </b></samp>
                <input type="checkbox" name="b_date" value="1" <?php // if($b_date==1){?>checked=""<?php // } ?>>  date
                <input type="checkbox" name="b_total" value="1" <?php // if($b_total==1){?>checked=""<?php // } ?>>  Total<br/><hr>-->
                <samp><b><?php echo $this->lang->line('session');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 80px;">

                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'year') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($year_stu_b == "") {
                                $y = date('Y');
                            } else {
                                $y = $year_stu_b;
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
                <samp><b><?php echo $this->lang->line('class');?></b></samp>
                <select  name="class" id="select01" class="" style="width: 80px;">
                    <!--<option value=""><?php echo $this->lang->line('all_class');?></option>-->
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'class') {
                            $cl = $v_option->data_a;
                            if ($class_b == $cl) {
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

                <samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 70px;">
                    <!--<option value=""><?php echo $this->lang->line('all_section');?></option>-->
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'section') {
                            $cl = $v_option->data_a;
                            if ($section_b == $cl) {
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
                <samp><b><?php echo $this->lang->line('group');?></b></samp>
                <select  name="group_r" id="select01" class="" style="width: 150px;">
                    <!--<option value=""><?php echo $this->lang->line('all_group');?></option>-->
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'group') {
                            $cl = $v_option->data_a;
                            if ($group_b == $cl) {
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
                <samp><b><?php echo $this->lang->line('month');?></b></samp>
                <select  name="month" id="select01" class="" style="width: 100px;">
                    <option></option>
                    <?php
                    foreach ($montha as $key=>$v_option) {
//                            $m = date('m');
                            $m = "";
                            if ($month == "") {
                                $m = date('m');
                            } else {
                                $m = $month;
//                                echo '<option>'.$m.'-'.$montha[$month].'</option>';
                            }
                            if ($m == $v_option) {
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
<!--                class="input-xlarge datepicker" id="alinfo"-->
<!--                <samp><b>--><?php //echo $this->lang->line('date');?><!--: </b></samp>-->
<!--                --><?php //if (isset($entry_date)) { ?>
<!--                <input name="entry_date" value="--><?php //echo $entry_date;?><!--" style="width: 90px;" type="text" class="datepicker" id="alinfo">-->
<!--                --><?php //}else{ ?>
<!--                <input name="entry_date" value="" style="width: 90px;" type="text" class="datepicker" id="alinfo">-->
<!--                --><?php //   }?>
                <samp><b><?php echo $this->lang->line('student_id');?>: </b></samp>
                <?php if (isset($student_id)) { ?>
                    <input name="student_id" value="<?php echo $student_id;?>" style="width: 90px;" type="text" class="" id="alinfo">
                <?php }else{ ?>
                    <input name="student_id" value="" style="width: 90px;" type="text" class="" id="alinfo">
                <?php    }?>

                <samp><b><?php echo $this->lang->line('date');?>: </b></samp>
                <samp><b><?php echo $this->lang->line('form');?> </b></samp>
                <input name="form_date" value="<?php if(isset($form_date)){ echo $form_date; } ?>" style="width: 90px;" type="text" class="datepicker" id="alinfo">
                <samp><b><?php echo $this->lang->line('to');?>: </b></samp>
                <input name="to_date" value="<?php if(isset($to_date)){ echo $to_date; } ?>" style="width: 90px;" type="text" class="datepicker" id="alinfo">
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>
            </form>
        </div>
    </div>
</div>
<?php if ($class_b!='Anik') {?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line('view');?> <?php echo $this->lang->line($title);?></div>
        <div class="muted pull-right" style="padding-top: .5px;"><button class="btn btn-primary" onclick="printContent('printdiv')"><?php echo $this->lang->line('print');?></button></div>
    </div>
    <div class="block-content collapse in" id="printdiv">
        <style>
            table { border-collapse: collapse; }
            table, th, td { border: 1px solid black; }
            /*tr:nth-child(even) {background-color: #F2F3FF}*/
        </style>
        <link href="<?php echo base_url(); ?>css/tablea.css" rel="stylesheet" type="text/css"/>
        <div class="prhide">
            <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;"><?php echo $academy_info->s_name; ?></h3>
            <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;"><?php echo $academy_info->s_address; ?></h3>
            <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title);?></h2>
        <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': '.$year_stu_b.', '
                . $this->lang->line('class') . ': '.$class_b.', '
                . $this->lang->line('group') . ': '.$group_b.', '
                .  $this->lang->line('section') . ': '.$section_b;
        ?><?php if($form_date !=''){ echo 'Form : ' . $form_date . 'TO : ' . $to_date; } ?></h2>
        </div>
        <div class="span12">
            <table class="table box-table-a">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('roll');?></th>
                        <th><?php echo $this->lang->line('id');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('due');?></th>
                        <th><?php echo $this->lang->line('fine');?></th>
                        <th><?php echo $this->lang->line('discount');?></th>
                        <th><?php echo $this->lang->line('service_charge');?></th>
                        <th><?php echo $this->lang->line('pay_amount');?></th>
                        <th><?php echo $this->lang->line('receite_no');?></th>
                        <th><?php echo $this->lang->line('date');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
//                    foreach ($all_b as $key => $value) {
                    $sum=  array();
                        $sum['total_amnt']= $due = $fine = $discount = $pay_amount = $service_charge = 0;
//                    }
                            $sum_all=0;
                    if(isset($all_baton)){
                        foreach ($all_baton as $key => $value) {
                            $data['stu_info'] = $this->sa_model->student_information_by_stu_id($value->student_id);
                            ?>
                        <tr>
                            <td><?php echo $data['stu_info']->roll; ?></td>
                            <td><?php echo $value->student_id; ?></td>
                            <td><?php echo $data['stu_info']->name; ?></td>

                            <td style="text-align: center;"><?php echo $value->due; ?></td>
                            <td style="text-align: center;"><?php echo $value->fine; ?></td>
                            <td style="text-align: center;"><?php echo $value->discount; ?></td>
                            <td style="text-align: center;"><?php echo $value->service_charge; ?></td>
                            <td style="text-align: center;"><?php echo $value->pay_amount; ?></td>
                            <td style="text-align: center;"><?php echo $value->id; ?></td>
                            <td style="text-align: center;"><?php echo date("d M, Y", strtotime($value->create_at)); ?></td>

                        </tr>
                    <?php
                            $due += $value->due;
                            $fine += $value->fine;
                            $service_charge += $value->service_charge;
                            $discount += $value->discount;
                            $pay_amount += $value->pay_amount;
//                        $sum['total_amnt']+=$value->pay_amount;
                    $sum_all=0;
                        } } ?>
                        <tr>
                            <td colspan="3" style="text-align: center;"><?php echo $this->lang->line('grand_total');?></td>
                            <!--<td></td>-->
                            <td style="text-align: center;"> <?php //echo $due; ?></td>
                            <td style="text-align: center"><?php  echo $fine; ?></td>
                            <td style="text-align: center"><?php  echo $discount; ?></td>
                            <td style="text-align: center"><?php  echo $service_charge; ?></td>
                            <td style="text-align: center"><?php  echo $pay_amount; ?></td>
                            <td style="text-align: center" colspan="2"><?php  //echo $due; ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>