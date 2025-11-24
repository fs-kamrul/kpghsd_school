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
                    <select  name="class" id="select01" class="" style="width: 150px;">
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
                        . $this->lang->line('class') . ': '.$class_b . ', '
                        . $this->lang->line('group') . ': '.$group_b.', '
                        . $this->lang->line('section') . ': '.$section_b;
                    ?></h2>
            </div>
            <div class="span12" style="overflow-x:auto;">
                <table class="table box-table-a">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th><?php echo $this->lang->line('student_id');?></th>
                        <th><?php echo $this->lang->line('t_id');?></th>
                        <th><?php echo $this->lang->line('amount');?></th>
                        <th><?php echo $this->lang->line('amount');?></th>
                        <th>Message</th>
                        <th>Receipt No</th>
                        <th><?php echo $this->lang->line('month');?></th>
                        <th><?php echo $this->lang->line('year');?></th>
                        <th>Status</th>
                        <th>ReCheck</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sum_all=0;
                    if(isset($all_b)){
                        foreach ($all_b as $key => $value) {

                            ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $value->student_id; ?></td>
                                <td style="text-align: center;"><?php echo $value->customer_order_id; ?></td>
                                <td style="text-align: center;"><?php echo $value->total_pay; ?></td>
                                <td style="text-align: center;"><?php echo $value->pay_amount; ?></td>
                                <td style="text-align: center;"><?php echo $value->sp_message; ?></td>
                                <td style="text-align: center;"><?php echo $value->receipte_no; ?></td>
                                <td style="text-align: left;"><?php echo $value->month_b; ?></td>
                                <td style="text-align: center;"><?php echo $value->year_b; ?></td>
                                <td style="text-align: center; <?php if($value->status == 1){ echo ' background-color: #0b5f31;color: white;';} ?>"><?php
                                    if($value->status == 1){
                                        echo 'Success';
                                    }elseif ($value->status == 2) {
                                        echo 'Failed';
                                    }elseif ($value->status == 0) {
                                        echo 'Processing';
                                    }
                                   // echo $value->status; ?></td>
                                <td style="text-align: center;"><?php
                                    if ($value->status == 0) {
                                        echo "<a class='btn btn-warning' target='_blank' href='" . base_url() . 'sslcommerz/success_ssl_ipn/'. $value->customer_order_id . "'>ReCheck</a>";
                                    }
                                   // echo $value->status; ?></td>
                            </tr>
                            <?php

                        } } //echo '<pre>'; print_r($sum);?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>