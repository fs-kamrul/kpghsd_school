<?php
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
            <form action="<?php echo base_url(); ?>invoice_panel/admin_report.html" method="post" class="form-horizontal">
                <input type="hidden" name="admin_report" value="1">
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
<!--            <h2 style="text-align: center;font-size: 15px;">--><?php //echo $this->lang->line('year') . ': '.$year.', ' . $this->lang->line('class') . ': '.$class.', ' . $this->lang->line('term') .' '.$term;?><!--</h2>-->
            </div>
            <?php if ($admin_report != "Anik") { ?>
                            <h2 style="text-align: center;font-size: 15px;"><?php echo 'Total Student: ' . $total_stu_id;?></h2>
                <!--<form action="<?php // echo base_url(); ?>pdf_panel/save_stu_data.html" method="POST">-->
                    <table class="" border="2">
                        <thead>
                            <tr>
                                <th  style="width: 50%;">Class, Group, Section, Year</th>
<!--                                <th style="width: 6%;">Great</th>-->
                                <th style="width: 50%;">Total Student</th>
                            </tr>
                        </thead>
                        <tbody>
            <?php

            $sum = 0;
            foreach ($main_a as $key => $value) {
                echo '<tr>';
                echo "<td>$value->class_b, $value->group_b, $value->section_b, $value->year_stu_b</td>";
                $datasd['class_b'] =  $value->class_b;
                $datasd['group_b'] =  $value->group_b;
                $datasd['section_b'] =  $value->section_b;
                $datasd['year_stu_b'] =  $value->year_stu_b;
                $total_student = $this->b_model->admin_report_sql_count($datasd);
                $sum += $total_student;
                echo "<td>$total_student</td>";
                echo '</tr>';
            } ?>

<?php
//            $grd=array("1"=>"A+","2"=>"A","3"=>"A-","4"=>"B","5"=>"C","6"=>"D","7"=>"F");
//            $grd_point=0;$grd_point_last=0;
//                foreach ($main_data[$key] as $key3 => $value3) {
//                foreach ($grd as $key2 => $value2) {
//                   echo '<tr>';
//                   if ($value2=="A+") {
//                       $grd_point=5;$grd_point_last=5;
//                 ?>
<!--                <td rowspan="7" style="vertical-align: autoh;">--><?php //echo "$class, $key3,</br> $key, $year";//, student(".count($main_a).")"; ?><!--</td>-->
<!--                   --><?php //}elseif ($value2=="A") {
//                                $grd_point=4;$grd_point_last=4.99;
//                            }elseif ($value2=="A-") {
//                                $grd_point=3.5;$grd_point_last=3.99;
//                            }elseif ($value2=="B") {
//                                $grd_point=3;$grd_point_last=3.49;
//                            }elseif ($value2=="C") {
//                                $grd_point=2;$grd_point_last=2.99;
//                            }elseif ($value2=="D") {
//                                $grd_point=1;$grd_point_last=1.99;
//                            }elseif ($value2=="F") {
//                                $grd_point=0;$grd_point_last=0;
//                            }
//                echo "<td>$value2</td>";
//                echo '<td>';
//                     foreach ($main_data[$key][$key3] as $key1 => $value1) {
//                     if ($value1['cgpa']>=$grd_point && $value1['cgpa']<=$grd_point_last) {
//                         echo $value1['roll'].", ";
//                    }
//                    }
//                echo '</td>';
//            echo '</tr>';
//            } } }
            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total</td>
                            <td><?php echo $sum; ?></td>
                        </tr>
                        </tfoot>
                    </table>
                <!--</form>-->
<?php } ?>
        </div>
    </div>
</div>

