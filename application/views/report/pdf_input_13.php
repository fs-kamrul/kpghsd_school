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
            <form action="<?php echo base_url(); ?>pdf_panel/student_info.html" method="post" class="form-horizontal">
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
                <select  name="class" id="select01" class="" style="width: 80px;">
                    <!--<option value=""><?php echo $this->lang->line('all_class');?></option>-->
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
                <samp><b><?php echo $this->lang->line('group');?></b></samp>
                <select  name="group_r" id="select01" class="" style="width: 150px;">
<!--                    <option value=""><?php echo $this->lang->line('all_group');?></option>-->
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'group') {
                            $cl = $v_option->data_a;
                            if ($group_r == $cl) {
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
                <div style="display: inline-flex;">
                    <samp><b><?php echo $this->lang->line('type');?>:</b></samp>
                    <label class="radio-inline">
                        <input type="radio" name="ak" value="num" <?php if($ak=='num'){ echo 'checked'; } ?>><?php echo $this->lang->line('all_info');?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ak" value="num1" <?php if($ak=='num1'){ echo 'checked'; } ?>><?php echo $this->lang->line('only_number');?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ak" value="num2" <?php if($ak=='num2'){ echo 'checked'; } ?>><?php echo $this->lang->line('id_card_info');?>
                    </label>
                </div>
<!--				<samp><b>Type</b></samp>
				<input type="radio" name="ak" value="num" checked >All Info
				<input type="radio" name="ak" value="num1">Only Number-->
                <!--<samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 70px;">
                    <option value=""><?php echo $this->lang->line('all_section');?></option>
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
                
                <samp><b>Month</b></samp>
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
                <samp><b>Date: </b></samp>
                <?php // if (isset($entry_date)) { ?>
                <input name="entry_date" value="<?php echo $entry_date;?>" style="width: 90px;" type="date" class="input-xlarge datepicker" id="alinfo">
                <?php // }else{ ?>
                <input name="entry_date" value="" style="width: 90px;" type="date" class="input-xlarge datepicker" id="alinfo">
                <?php //    }?>-->
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>
            </form>
        </div>
    </div>
</div>
<?php if ($class!='Anik') {?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
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
            <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;">Collectorate Public School & College, Nilphamari</h3>
            <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title);?></h2>
        <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': '.$year.', ' . $this->lang->line('class') . ': '.$class.' ' . $this->lang->line('group') . ': '.$group_r;?></h2>
        </div>
         <!--style="overflow-x:auto;"--> 
        <div class="span12">
            <table class="table box-table-a">
                <thead>
                    <tr>
                        <th style="text-align: center;"><?php echo $this->lang->line('id');?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('roll');?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('section');?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('name');?></th>
                        <th style="text-align: center;"><?php echo $this->lang->line('student_number');?></th>
                        <th style="text-align: center;">Father Number</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($all_b)){
                        foreach ($all_b as $key => $value) { ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $value->id; ?></td>
                            <td style="text-align: center;"><?php echo $value->roll; ?></td>
                            <td style="text-align: center;"><?php echo $value->section; ?></td>
                            <td style="text-align: center;"><?php echo $value->name; ?></td>
                            <td style="text-align: center;"><?php echo $value->stu_phone; ?></td>
                            <td style="text-align: center;"><?php echo $value->mobile_number; ?></td>
                            
                        </tr>
                    <?php // 
                        } } //echo '<pre>'; print_r($sum);?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>