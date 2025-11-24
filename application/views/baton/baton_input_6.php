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
<?php $montha = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];                   // print_r($month);?>
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
            <form action="<?php echo base_url(); ?>baton_panel/top_sheet.html" method="post" class="form-horizontal">
<!--                <samp><b>View: </b></samp>
                <input type="checkbox" name="b_date" value="1" <?php // if($b_date==1){?>checked=""<?php // } ?>>  date
                <input type="checkbox" name="b_total" value="1" <?php // if($b_total==1){?>checked=""<?php // } ?>>  Total<br/><hr>-->
                <samp><b><?php echo $this->lang->line('year');?></b></samp>
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
                <samp><b><?php echo $this->lang->line('date');?>: </b></samp>
                <?php if (isset($entry_date)) { ?>
                <input name="entry_date" value="<?php echo $entry_date;?>" style="width: 90px;" type="text" class="datepicker" id="alinfo">
                <?php }else{ ?>
                <input name="entry_date" value="" style="width: 90px;" type="text" class="datepicker" id="alinfo">
                <?php    }?>
                <samp><b><?php echo $this->lang->line('student_id');?>: </b></samp>
                <?php if (isset($student_id)) { ?>
                    <input name="student_id" value="<?php echo $student_id;?>" style="width: 90px;" type="text" class="" id="alinfo">
                <?php }else{ ?>
                    <input name="student_id" value="" style="width: 90px;" type="text" class="" id="alinfo">
                <?php    }?>
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
        <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': '.$year_stu_b.', ' . $this->lang->line('class') . ': '.$class_b.', ' . $this->lang->line('group') . ': '.$group_b.', ' .  $this->lang->line('section') . ': '.$section_b;?></h2>
        </div>
        <div class="span12">
            <table class="table box-table-a">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('roll');?></th>
                        <th><?php echo $this->lang->line('id');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
<!--                        <th>Tution Fee</th>-->
<!--                        <th>Tiffin Fee</th>-->
<!--                        <th>Fine</th>-->
<!--                        <th>Delay Fee</th>-->
<!--                        <th>Re Admission Fee</th>-->
<!--                        <th>Dev Fee</th>-->
<!--                        <th>Session Fee</th>-->
<!--                        <th>Lab Fee</th>-->
                        <?php
                        $tution_fee_a = $tiffin_fee_a = $fine_a = $delay_fee_a = $re_addmission_fee_a = $dev_fee_a = $session_others_fee_a = $lab_fee_a = $others_fee_a = 0;
                        foreach ($all_empty as $key=>$value_baton){
                            if($value_baton != 0) { ?>
                            <th><?php
                                    if ($key == 'tution_fee') {
                                        $tution_fee_a = $value_baton;
                                        echo 'Tution Fee';
                                    } elseif ($key == 'tiffin_fee') {
                                        $tiffin_fee_a = $value_baton;
                                        echo 'Tiffin Fee';
                                    } elseif ($key == 'fine') {
                                        $fine_a = $value_baton;
                                        echo 'Fine';
                                    } elseif ($key == 'delay_fee') {
                                        $delay_fee_a = $value_baton;
                                        echo 'Delay Fee';
                                    } elseif ($key == 're_addmission_fee') {
                                        $re_addmission_fee_a = $value_baton;
                                        echo 'Re Admission Fee';
                                    } elseif ($key == 'dev_fee') {
                                        $dev_fee_a = $value_baton;
                                        echo 'Dev Fee';
                                    } elseif ($key == 'session_others_fee') {
                                        $session_others_fee_a = $value_baton;
                                        echo 'Session Fee';
                                    } elseif ($key == 'lab_fee') {
                                        $lab_fee_a = $value_baton;
                                        echo 'Lab Fee';
                                    } elseif ($key == 'others_fee') {
                                        $others_fee_a = $value_baton;
                                        echo 'Others Fee';
                                    }
                                ?></th>
                        <?php } } ?>
                        <th><?php echo $this->lang->line('total');?></th>
                        <th><?php echo $this->lang->line('t_id');?></th>
                        <th><?php echo $this->lang->line('month');?></th>
                        <th><?php echo $this->lang->line('year');?></th>
                        <th><?php echo $this->lang->line('receite_no');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
//                    foreach ($all_b as $key => $value) {
                    $sum=  array();
//                        $sum['tution_fee']=0;
//                        $sum['tiffin_fee']=0;
//                        $sum['fine']=0;
//                        $sum['delay_fee']=0;
//                        $sum['re_addmission_fee']=0;
//                        $sum['dev_fee']=0;
//                        $sum['session_others_fee']=0;
//                        $sum['lab_fee']=0;
                        $sum['total_amnt']=0;
//                    }
                            $sum_all=0;
                    if(isset($all_b)){
                        foreach ($all_b as $key => $value) {

                            ?>
                        <tr>
                            <td><?php echo $value->roll; ?></td>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <?php if($tution_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->tution_fee; ?></td>
                                <?php } if($tiffin_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->tiffin_fee; ?></td>
                            <?php } if($fine_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->fine; ?></td>
                            <?php } if($delay_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->delay_fee; ?></td>
                            <?php } if($re_addmission_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->re_addmission_fee; ?></td>
                            <?php } if($dev_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->dev_fee; ?></td>
                            <?php } if($session_others_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->session_others_fee; ?></td>
                            <?php } if($lab_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->lab_fee; ?></td>
                            <?php } ?>
                            <?php if($others_fee_a != 0){ ?>
                            <td style="text-align: center;"><?php echo $value->others_fee; ?></td>
                            <?php } ?>
                            <td style="text-align: center;"><?php echo $value->total_amnt; ?></td>
                            <td style="text-align: center;"><?php echo $value->admin_email_address; ?></td>
                            <td style="text-align: center;"><?php echo $value->month_b; ?></td>
                            <td style="text-align: center;"><?php echo $value->year_b; ?></td>
                            <td style="text-align: center;"><?php echo $value->receite_no; ?></td>

                        </tr>
                    <?php //  $sum_all+=$value->total_amnt;
//                        $sum['tution_fee']+=$value->tution_fee;
//                        $sum['tiffin_fee']+=$value->tiffin_fee;
//                        $sum['fine']+=$value->fine;
//                        $sum['delay_fee']+=$value->delay_fee;
//                        $sum['re_addmission_fee']+=$value->re_addmission_fee;
//                        $sum['dev_fee']+=$value->dev_fee;
//                        $sum['session_others_fee']+=$value->session_others_fee;
//                        $sum['lab_fee']+=$value->lab_fee;
                        $sum['total_amnt']+=$value->total_amnt;
                    $sum_all=0;
                        } } //echo '<pre>'; print_r($sum);?>
                        <tr>
                            <td colspan="3" style="text-align: center;"><?php echo $this->lang->line('grand_total');?></td>
                            <!--<td></td>-->
                            <?php foreach ($all_empty as $key21 => $value21) {
                                if($value21 != 0) {
                                    echo '<td style="text-align: center;">' . $value21 . '</td>';
                                }
                             }
                            echo '<td style="text-align: center;">'.$sum['total_amnt'].'</td>'; ?>
                            <td colspan="4"><?php // echo $sum; ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>