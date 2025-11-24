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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/virtualselect/virtual-select.min.css" />
    <script src="<?php echo base_url(); ?>assets/virtualselect/virtual-select.min.js"></script>
<?php $month = [ 1=>'January', 2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July', 8=>'August', 9=>'September', 10=>'October', 11=>'November', 12=>'December'];                   // print_r($month);?>
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
    <div class="block-content collapse in" style="overflow: auto">
        <div class="span12">
            <form action="<?php echo base_url(); ?>invoice_panel/monthly_report.html" method="post" class="form-horizontal">
                <samp><b><?php echo $this->lang->line('form');?>: </b></samp>
                <select  name="form_month" id="select01" class="" style="width: 150px;">
                    <?php
                    foreach ($month as $value) {
                        if ($form_month == $value) {
                            ?>
                            <option value="<?php echo $value; ?>" selected><?php echo $value; ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <samp><b><?php echo $this->lang->line('to');?>: </b></samp>
                <select  name="to_month" id="select01" class="" style="width: 150px;">
                    <?php
                    foreach ($month as $value) {
                        if ($to_month == $value) {
                            ?>
                            <option value="<?php echo $value; ?>" selected><?php echo $value; ?></option>
                            <?php
                        } else {
                            if (!isset($to_month) && $value == 'December') {
                                ?>
                                <option value="<?php echo $value; ?>" selected><?php echo $value; ?></option>
                                <?php
                            }else{
                            ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php
                            }
                        }
                    }
                    ?>
                </select>
                <samp><b><?php echo $this->lang->line('year');?>: </b></samp>
                <div id="example-select" name="invoice_year"></div>
                <?php
                //print_r($invoice_year);
                ?>
                <script>
                    set_value = '';
                    <?php if ($invoice_year != "") {
                    if (count($custom_invoice_year) > 1) {
                        ?>
                    set_value = [<?php echo $invoice_year; ?>];
                        <?php
                            }else{
                            ?>
                    set_value = <?php echo $invoice_year; ?>;
                        <?php
                        }
                    }else{ ?>
                        set_value = <?php echo date('Y'); ?>;
                       <?php }?>

                    myOptions = [
                       <?php foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'year') {
                            $get_year = $v_option->data_a;
                            $now_year = "";
                            if ($invoice_year == "") {
                                $now_year = date('Y');
                            } else {
                                ?>
                                <?php
                                $now_year = $invoice_year;
                            }
                            if ($now_year == $get_year) {

                                ?>
                        { label: '<?php echo $get_year; ?>', value: '<?php echo $get_year; ?>' },
                                <?php
                            } else {
                                ?>
                                { label: '<?php echo $get_year; ?>', value: '<?php echo $get_year; ?>' },
                                <?php
                            }
                        }
                    }
                    ?>
                    ],
                    VirtualSelect.init({
                        ele: '#example-select',
                        options: myOptions,
                        multiple: true,
                        autofocus: true,
                        selectedValue: set_value,
                        allOptionsSelectedText: 'All',
                        required: true,
                    });
                </script>
                <br/><hr>

                <samp><b><?php echo $this->lang->line('year');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 150px;">
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
                <select  name="section" id="select01" class="" style="width: 150px;">
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
    <div class="block-content collapse in" id="printdiv" style="overflow: auto;">
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
        </div>
        <div class="span12">
            <?php
//            echo "<pre>";
//            print_r($custom_invoice_year);
//            print_r($month);
            $form_month_number =  array_search($form_month,$month);
            $to_month_number =  array_search($to_month,$month);
//            echo $form_month_number . '</br>';
//            echo $to_month_number . '</br>';
////            $first_rowspan =  13 - $form_month_number;
////            echo $first_rowspan;
//            echo "</pre>";
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2"><?php echo $this->lang->line('id');?></th>
                        <th rowspan="2"><?php echo $this->lang->line('roll');?></th>
                        <th rowspan="2"><?php echo $this->lang->line('name');?></th>
                        <?php
                        foreach ($custom_invoice_year as $key=>$value){
                            $count_invoice_year = count($custom_invoice_year);
                            if($key == 0){
                                $colspan[$key] =  13 - $form_month_number;
                            }elseif($key == $count_invoice_year-1){
                                $colspan[$key] =  $to_month_number;
                            }else{
                                $colspan[$key] =  12;
                            }
//                            echo  '->' . $colspan[$key] . '<-';
                        ?>
                            <th colspan="<?php echo $colspan[$key]; ?>"><?php echo $this->lang->line('year');?>: <?php echo $value; ?></th>
                        <?php
                        }
                        ?>
                        <?php if(isset($baton_year)){ ?><th colspan="6"><?php echo $this->lang->line('year');?>: <?php echo $baton_year; ?></th><?php } ?>
                        <th rowspan="2"><?php echo $this->lang->line('total');?></th>
                    </tr>
                    <tr>
                        <?php
                        $form_month_number =  array_search($form_month,$month);
                        $to_month_number =  array_search($to_month,$month);
                        foreach ($custom_invoice_year as $key=>$value){
                            $count_invoice_year = count($custom_invoice_year);
                            if($key == 0){
                                $colspan[$key] =  $form_month_number;
                                foreach ($month as $key2 => $value2) {
                                    if($key2 >= $colspan[$key]){
                                        $some_amount[$value2 . $value] = 0;
                                        ?>
                                        <th><?php echo $value2; ?></th>
                                        <?php
                                    }
                                }
                            }elseif($key == $count_invoice_year-1){
                                $colspan[$key] =  $to_month_number;
                                foreach ($month as $key2 => $value2) {
                                    if($key2 <= $colspan[$key]){
                                        $some_amount[$value2 . $value] = 0;
                                        ?>
                                        <th><?php echo $value2; ?></th>
                                        <?php
                                    }
                                }
                            }else{
                                $colspan[$key] =  1;
                                foreach ($month as $key2 => $value2) {
                                    if($key2 >= $colspan[$key]){
                                        $some_amount[$value2 . $value] = 0;
                                        ?>
                                        <th><?php echo $value2; ?></th>
                                        <?php
                                    }
                                }
                            }

                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($all_student)){
                        foreach ($all_student as $key => $value) {
                            $sum=$sum_all=$total_month=0;
                        ?>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->roll; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <?php
                            $form_month_number =  array_search($form_month,$month);
                            $to_month_number =  array_search($to_month,$month);
//                            $some_amount = array();
                            foreach ($custom_invoice_year as $key=>$value3){
                                $count_invoice_year = count($custom_invoice_year);
                                if($key == 0){
                                    $colspan[$key] =  $form_month_number;
                                    foreach ($month as $key2 => $value2) {
                                        if($key2 >= $colspan[$key]){
                                            $total_month ++;
                                            $baton_info = $this->b_model->select_student_monthly_report($value3, $value2, $value->id);
                                            ?>
                                            <th><?php if($baton_info) {
                                                    echo $baton_info->total_paid;
                                                    $some_amount[$value2 . $value3] += $baton_info->total_paid;
                                                    $sum_all += $baton_info->total_paid;
                                                }else{ echo 0; } ?></th>
                                            <?php
                                        }
                                    }
                                }elseif($key == $count_invoice_year-1){
                                    $colspan[$key] =  $to_month_number;
                                    foreach ($month as $key2 => $value2) {
                                        if($key2 <= $colspan[$key]){
                                            $total_month ++;
                                            $baton_info = $this->b_model->select_student_monthly_report($value3, $value2, $value->id);
                                            ?>
                                            <th><?php if($baton_info) {
                                                    echo $baton_info->total_paid;
                                                    $some_amount[$value2 . $value3] += $baton_info->total_paid;
                                                    $sum_all += $baton_info->total_paid;
                                                }else{ echo 0; } ?></th>
                                            <?php
                                        }
                                    }
                                }else{
                                    $colspan[$key] =  1;
                                    foreach ($month as $key2 => $value2) {
                                        if($key2 >= $colspan[$key]){
                                            $total_month ++;
                                            $baton_info = $this->b_model->select_student_monthly_report($value3, $value2, $value->id);
                                            ?>
                                            <th><?php if($baton_info) {
                                                    echo $baton_info->total_paid;
                                                    $some_amount[$value2 . $value3] += $baton_info->total_paid;
                                                    $sum_all += $baton_info->total_paid;
                                                }else{ echo 0; } ?></th>
                                            <?php
                                        }
                                    }
                                }

                            }
                            ?>
                            <td><?php echo $sum_all;
                            
                            $sum_all=0;?></td>
                        </tr>
                    <?php } } //echo '<pre>'; print_r($some_amount); echo '</pre>'; ;?>
                        <tr>
                            <td colspan="3" style="text-align: center;"><?php echo $this->lang->line('total');?></td>
<!--                            <td></td>-->
                            <?php foreach ($some_amount as $key => $value) {
                                 echo '<td style="text-align: center;">'.$value . '</td>';
                             } ?>
                            <td style="text-align: center;"><?php echo array_sum($some_amount) ; ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>