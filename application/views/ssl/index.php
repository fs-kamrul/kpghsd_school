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
<?php $montha = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; //,'Previous Due'                  // print_r($month);?>
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
                <form action="<?php echo base_url(); ?>sslcommerz_collection" method="post" class="form-horizontal">
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

                    <samp><b><?php echo $this->lang->line('student_id');?>: </b></samp>
                    <?php if (isset($student_id)) { ?>
                        <input name="student_id" value="<?php echo $student_id;?>" style="width: 90px;" type="text" class="" id="alinfo">
                    <?php }else{ ?>
                        <input name="student_id" value="" style="width: 90px;" type="text" class="" id="alinfo">
                    <?php    }?>
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>
<!--                    <div style="display: flex;margin-top: 10px;">-->
<!--                        <samp><b>--><?php //echo $this->lang->line('date');?><!--: </b></samp>-->
<!--                        <samp><b>--><?php //echo $this->lang->line('form');?><!-- </b></samp>-->
<!--                        <input name="form_date" value="--><?php //if(isset($form_date)){ echo $form_date; } ?><!--" style="width: 90px;" type="text" class="datepicker" id="alinfo">-->
<!--                        <samp><b>--><?php //echo $this->lang->line('to');?><!--: </b></samp>-->
<!--                        <input name="to_date" value="--><?php //if(isset($to_date)){ echo $to_date; } ?><!--" style="width: 90px;" type="text" class="datepicker" id="alinfo">-->
<!--                        <input type="radio" id="design1" name="designGroup" value="design1" --><?php //if($designGroup == 'design1'){ echo 'checked'; } ?><!-- >-->
<!--                        <label for="design1">Design 1</label>-->
<!---->
<!--                        <input type="radio" id="design2" name="designGroup" value="design2" --><?php //if($designGroup == 'design2'){ echo 'checked'; } ?><!-- >-->
<!--                        <label for="design2">Design 2</label>-->
<!--                        <button type="submit" class="btn btn-primary">--><?php //echo $this->lang->line('search');?><!--</button><hr>-->
<!--                    </div>-->
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
                        . $this->lang->line('class') . ': '.$class_b . ', '
                        . $this->lang->line('group') . ': '.$group_b.', '
                        . $this->lang->line('section') . ': '.$section_b;
                    ?><?php if($form_date !=''){ echo 'Form : ' . $form_date . 'TO : ' . $to_date; } ?></h2>
            </div>
            <div class="span12" style="overflow-x:auto;">
                <table class="table box-table-a">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('roll');?></th>
                        <!--                        <th>Tution Fee</th>-->
                        <!--                        <th>Tiffin Fee</th>-->
                        <!--                        <th>Fine</th>-->
                        <!--                        <th>Delay Fee</th>-->
                        <!--                        <th>Re Admission Fee</th>-->
                        <!--                        <th>Dev Fee</th>-->
                        <!--                        <th>Session Fee</th>-->
                        <!--                        <th>Lab Fee</th>-->
                        <?php
                        $tution_fee_a = $tiffin_fee_a = $fine_a = $delay_fee_a = $re_addmission_fee_a = $dev_fee_a = $session_others_fee_a = $lab_fee_a = 0;
                        $exam_fee_a = $tesitimonial_fee_a = $tc_fee_a = $board_reg_a = $cultural_fee_a = $scout_fee_a = $game_fee_a = $common_fee_a = $poor_fund_a = $magazine_fee_a = $id_card_fee_a = 0;
                        $receit_fee_a = $dev_study_fee_a = $computer_fee_a = $previous_due_a = $others_fee_a = 0;
                        foreach ($all_empty as $key=>$value_baton){
                            if($value_baton != 0) { ?>
                                <th><?php
                                    if ($key == 'tution_fee') {
                                        $tution_fee_a = $value_baton;
                                        echo $this->lang->line('tuition_fee');
                                    } elseif ($key == 'tiffin_fee') {
                                        $tiffin_fee_a = $value_baton;
                                        echo $this->lang->line('tiffin_fee');
                                    } elseif ($key == 'fine') {
                                        $fine_a = $value_baton;
                                        echo $this->lang->line('fine');
                                    } elseif ($key == 'delay_fee') {
                                        $delay_fee_a = $value_baton;
                                        echo $this->lang->line('delay_fee');
                                    } elseif ($key == 're_addmission_fee') {
                                        $re_addmission_fee_a = $value_baton;
                                        echo $this->lang->line('admission_fee');
                                    } elseif ($key == 'dev_fee') {
                                        $dev_fee_a = $value_baton;
                                        echo $this->lang->line('development_fee');
                                    } elseif ($key == 'session_others_fee') {
                                        $session_others_fee_a = $value_baton;
                                        echo $this->lang->line('others_fee');
                                    } elseif ($key == 'lab_fee') {
                                        $lab_fee_a = $value_baton;
                                        echo $this->lang->line('lab_fee');
                                    } elseif ($key == 'exam_fee') {
                                        $exam_fee_a = $value_baton;
                                        echo $this->lang->line('exam_fee');
                                    } elseif ($key == 'tesitimonial_fee') {
                                        $tesitimonial_fee_a = $value_baton;
                                        echo $this->lang->line('tesitimonial_fee');
                                    } elseif ($key == 'tc_fee') {
                                        $tc_fee_a = $value_baton;
                                        echo $this->lang->line('tc_fee');
                                    } elseif ($key == 'board_reg') {
                                        $board_reg_a = $value_baton;
                                        echo $this->lang->line('board_reg');
                                    } elseif ($key == 'cultural_fee') {
                                        $cultural_fee_a = $value_baton;
                                        echo $this->lang->line('cultural_fee');
                                    } elseif ($key == 'scout_fee') {
                                        $scout_fee_a = $value_baton;
                                        echo $this->lang->line('scout_fee');
                                    } elseif ($key == 'game_fee') {
                                        $game_fee_a = $value_baton;
                                        echo $this->lang->line('game_fee');
                                    } elseif ($key == 'common_fee') {
                                        $common_fee_a = $value_baton;
                                        echo $this->lang->line('common_fee');
                                    } elseif ($key == 'poor_fund') {
                                        $poor_fund_a = $value_baton;
                                        echo $this->lang->line('poor_fund');
                                    } elseif ($key == 'magazine_fee') {
                                        $magazine_fee_a = $value_baton;
                                        echo $this->lang->line('magazine_fee');
                                    } elseif ($key == 'id_card_fee') {
                                        $id_card_fee_a = $value_baton;
                                        echo $this->lang->line('id_card_fee');
                                    } elseif ($key == 'receit_fee') {
                                        $receit_fee_a = $value_baton;
                                        echo $this->lang->line('receit_fee');
                                    } elseif ($key == 'dev_study_fee') {
                                        $dev_study_fee_a = $value_baton;
                                        echo $this->lang->line('dev_study_fee');
                                    } elseif ($key == 'computer_fee') {
                                        $computer_fee_a = $value_baton;
                                        echo $this->lang->line('computer_fee');
                                    } elseif ($key == 'previous_due') {
                                        $previous_due_a = $value_baton;
                                        echo $this->lang->line('previous_due');
                                    } elseif ($key == 'others_fee') {
                                        $others_fee_a = $value_baton;
                                        echo $this->lang->line('others_fee');
                                    }
                                    ?></th>
                            <?php } } ?>
                        <th><?php echo $this->lang->line('total');?></th>
                        <th><?php echo $this->lang->line('total_pay');?></th>
                        <th><?php echo $this->lang->line('due');?></th>
                        <th><?php echo $this->lang->line('t_id');?></th>
                        <th><?php echo $this->lang->line('month');?></th>
                        <th><?php echo $this->lang->line('year');?></th>
                        <th><?php echo $this->lang->line('discount_present');?></th>
                        <!--                        <th>--><?php //echo $this->lang->line('receite_no');?><!--</th>-->
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
                    $sum['total_amnt']=$sum['total_pay']=$sum['due']=$sum['total_due']=0;
                    //                    }
                    $sum_all=0;
                    if(isset($all_b)){
                        foreach ($all_b as $key => $value) {

                            ?>
                            <tr>
                                <td><?php echo $value->roll; ?></td>
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
                                <?php if($exam_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->exam_fee; ?></td>
                                <?php } ?>
                                <?php if($tesitimonial_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->tesitimonial_fee; ?></td>
                                <?php } ?>
                                <?php if($tc_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->tc_fee; ?></td>
                                <?php } ?>
                                <?php if($board_reg_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->board_reg; ?></td>
                                <?php } ?>
                                <?php if($cultural_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->cultural_fee; ?></td>
                                <?php } ?>
                                <?php if($scout_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->scout_fee; ?></td>
                                <?php } ?>
                                <?php if($game_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->game_fee; ?></td>
                                <?php } ?>
                                <?php if($common_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->common_fee; ?></td>
                                <?php } ?>
                                <?php if($poor_fund_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->poor_fund; ?></td>
                                <?php } ?>
                                <?php if($magazine_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->magazine_fee; ?></td>
                                <?php } ?>
                                <?php if($id_card_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->id_card_fee; ?></td>
                                <?php } ?>
                                <?php if($receit_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->receit_fee; ?></td>
                                <?php } ?>
                                <?php if($dev_study_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->dev_study_fee; ?></td>
                                <?php } ?>
                                <?php if($computer_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->computer_fee; ?></td>
                                <?php } ?>
                                <?php if($previous_due_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->previous_due; ?></td>
                                <?php } ?>
                                <?php if($others_fee_a != 0){ ?>
                                    <td style="text-align: center;"><?php echo $value->others_fee; ?></td>
                                <?php } ?>
                                <td style="text-align: center;"><?php echo $value->total_amnt + $value->fine; ?></td>
                                <td style="text-align: center;"><?php echo $value->total_paid; ?></td>
                                <td style="text-align: center;"><?php echo $value->total_due; ?></td>
                                <!--                            <td style="text-align: center;">--><?php //echo $value->total_amnt + $value->fine - $value->total_paid; ?><!--</td>-->
                                <td style="text-align: center;"><?php echo $value->admin_email_address; ?></td>
                                <td style="text-align: left;"><?php echo $value->month_b; ?></td>
                                <td style="text-align: center;"><?php echo $value->year_b; ?></td>
                                <!--                            <td style="text-align: center;">--><?php //echo $value->rt_no; ?><!--</td>-->
                                <td style="text-align: center;"><?php echo $value->discount_present; ?>%</td>

                            </tr>
                            <?php
                            $sum['total_amnt']+=$value->total_amnt + $value->fine;
                            $sum['total_pay']+=$value->total_paid;
                            $sum['due']+=$value->total_due;
                            $sum['total_due']+= $value->total_amnt + $value->fine - $value->total_paid;
                            $sum_all=0;
                        } } //echo '<pre>'; print_r($sum);?>
                    <tr>
                        <td colspan="1" style="text-align: center;"><?php echo $this->lang->line('grand_total');?></td>
                        <!--<td></td>-->
                        <?php foreach ($all_empty as $key21 => $value21) {
                            if($value21 != 0) {
                                echo '<td style="text-align: center;">' . $value21 . '</td>';
                            }
                        }
                        echo '<td style="text-align: center;">'.$sum['total_amnt'].'</td>';
                        echo '<td style="text-align: center;">'.$sum['total_pay'].'</td>';
                        echo '<td style="text-align: center;">'.$sum['due'].'</td>';
                        //echo '<td style="text-align: center;">'.$sum['total_due'].'</td>';
                        ?>
                        <td colspan="5"><?php // echo $sum; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>