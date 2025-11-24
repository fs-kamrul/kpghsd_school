<?php
$montha = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];                   // print_r($month);

    //$grade = new Grade();
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
<style>
    th, tb{
        padding: 8px;
        line-height: 20px;
        text-align: left;
        border-top: 1px solid #DDD;
    }
</style>
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
        <div class="muted pull-right" style="padding-top: .5px;"><button class="btn btn-primary" onclick="printContent('printdiv')"><?php echo $this->lang->line('print');?></button></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>baton_panel/baton_due.html" method="post" class="form-horizontal">
                <samp><b><?php echo $this->lang->line('session');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 180px;">
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
                <samp><b><?php echo $this->lang->line('class');?></b></samp>
                <select  name="class" id="select01" class="" style="width: 180px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'class') {
                            $cl = $v_option->data_a;
                            if ($class == $cl) {
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
                <samp><b><?php echo $this->lang->line('pay_year');?></b></samp>
                <select  name="pay_year" id="select01" class="" style="width: 180px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'year') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($pay_year == "") {
                                $y = date('Y');
                            } else {
                                $y = $pay_year;
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
                <samp><b><?php echo $this->lang->line('pay_month');?></b></samp>
                <select  name="month" id="select01" class="" style="width: 100px;">
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
<!--                <samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 110px;">
                    <?php
//                    foreach ($option as $v_option) {
//                        $a = $v_option->opt_a;
//                        if ($a == 'section') {
//                            $cl = $v_option->data_a;
//                            if ($section == $cl) {
//                                ?>
                                <option value="//<?php // echo $v_option->data_a; ?>" selected><?php // echo $v_option->data_a; ?></option>
                                //<?php
//                            } else {
//                                ?>
                                <option value="//<?php // echo $v_option->data_a; ?>"><?php // echo $v_option->data_a; ?></option>
                                //<?php
//                            }
//                        }
//                    }
                    ?>
                </select>-->
<!--                <samp><b><?php echo $this->lang->line('group');?></b></samp>
                <select  name="group_r" id="select01" class="" style="width: 110px;">
                    <?php
//                    foreach ($option as $v_option) {
//                        $a = $v_option->opt_a;
//                        if ($a == 'group') {
//                            $cl = $v_option->data_a;
//                            if ($group_r == $cl) {
                                ?>
                                <option value="<?php echo $v_option->data_a; ?>" selected><?php echo $v_option->data_a; ?></option>
                                <?php
//                            } else {
                                ?>
                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                <?php
//                            }
//                        }
//                    }
                    ?>
                </select>-->
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>

            </form>
        </div>
        <div  id="printdiv">
            
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
            <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('session') . ': '.$year.', ' . $this->lang->line('class') . ': '.$class.', ' . $this->lang->line('pay_year') .' '.$pay_year.', ' . $this->lang->line('pay_month') .' '.$month;?></h2>
            </div>
            <?php if ($class != "Anik") { ?>
                <!--<form action="<?php // echo base_url(); ?>pdf_panel/save_stu_data.html" method="POST">-->
                    <table class="" border="2">
                        <thead>
                            <tr>
                                <th  style="width: 13%;">Class, Group, Section, Year</th>
                                <th style="width: 81%;">Student ROLL</th>
                            </tr>
                        </thead>
                        <tbody>
            <?php $grd=array("1"=>"A+","2"=>"A","3"=>"A-","4"=>"B","5"=>"C","6"=>"D","7"=>"F");
            $pay_baton = array();
            $grd_point=0;$grd_point_last=0;
            foreach ($main_all_stu as $key5 => $value5) {
                echo '<tr>';
                ?>
                <td style="vertical-align: auto;"><?php echo "$class, $value5->group_r,</br> $value5->section, $year";//, student(".count($main_a).")"; ?></td>
                <?php
                foreach ($main_data as $key => $value) {
                    foreach ($main_data[$key] as $key3 => $value3) {
                         foreach ($main_data[$key][$key3] as $key1 => $value1) {
                             $pay_baton[] = $value1['roll'];
                        }
                    }
                }
                echo '<td>';
                $stu_list_roll = $this->b_model->class_all_stu_reg_search($class,$year,$value5->section,$value5->group_r);
                foreach ($stu_list_roll as $key4 => $value4) {
                    if(in_array($value4->roll,$pay_baton)){
                    }else{
                        echo $value4->roll.", ";
                    }
                }
                echo '</td>';
                $pay_baton = array();

                echo '</tr>';
            } ?>
                        </tbody>
                    </table>
                <!--</form>-->
<?php } ?>
        </div>
    </div>
</div>

