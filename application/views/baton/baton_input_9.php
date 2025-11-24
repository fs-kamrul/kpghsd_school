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

<?php $month = ['July', 'August', 'September', 'October', 'November', 'December','January', 'February', 'March', 'April', 'May', 'June'];                   // print_r($month);?>
<?php $month2 = ['January', 'February', 'March', 'April', 'May', 'June'];                   // print_r($month);?>
<?php

if(!isset($baton_year)){
    $monthaa['July']['tk']=0;
    $monthaa['August']['tk']=0;
    $monthaa['September']['tk']=0;
    $monthaa['October']['tk']=0;
    $monthaa['November']['tk']=0;
    $monthaa['December']['tk']=0;
}else{
    $monthaa['July']['tk']=0;
    $monthaa['August']['tk']=0;
    $monthaa['September']['tk']=0;
    $monthaa['October']['tk']=0;
    $monthaa['November']['tk']=0;
    $monthaa['December']['tk']=0;
    $monthaa['January']['tk']=0;
    $monthaa['February']['tk']=0;
    $monthaa['March']['tk']=0;
    $monthaa['April']['tk']=0;
    $monthaa['May']['tk']=0;
    $monthaa['June']['tk']=0;
}
    
//    print_r($monthaa);
?>
<!--<script src="<?php // echo base_url(); ?>vendors/jquery-1.9.1.js"></script>-->
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
            <form action="<?php echo base_url(); ?>baton_panel/baton_report.html" method="post" class="form-horizontal">
                <samp><b><?php echo $this->lang->line('view');?>: </b></samp>
                <input type="checkbox" name="b_collage" value="1" <?php if($b_collage==1){?>checked=""<?php } ?>>  <?php echo $this->lang->line('collage');?>
                <input type="checkbox" name="b_date" value="1" <?php if($b_date==1){?>checked=""<?php } ?>>  <?php echo $this->lang->line('date');?>
                <input type="checkbox" name="b_total" value="1" <?php if($b_total==1){?>checked=""<?php } ?>>  <?php echo $this->lang->line('total');?><br/><hr>
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
        </div>
        <div class="span12">
            <table class="table">
                <thead>
                    <tr>
                        <th rowspan="2"><?php echo $this->lang->line('id');?></th>
                        <th rowspan="2"><?php echo $this->lang->line('roll');?></th>
                        <th rowspan="2"><?php echo $this->lang->line('name');?></th>
                        <th colspan="6"><?php echo $this->lang->line('year');?>: <?php echo $year_stu_b; ?></th>
                        <?php if(isset($baton_year)){ ?><th colspan="6"><?php echo $this->lang->line('year');?>: <?php echo $baton_year; ?></th><?php } ?>
                        <th rowspan="2"><?php echo $this->lang->line('total');?></th>
                    </tr>
                    <tr>
                        <?php
                        if(!isset($baton_year)){
                            $month = ['July', 'August', 'September', 'October', 'November', 'December'];
                        }
                        foreach ($month as $key => $value) {
                         echo '<th>'.$value.'</th>';
                        }?>
                    </tr>
                </thead>
                <tbody>
                    <?php $sum=$sum_all=0;
                    if(isset($all_baton)){
                        foreach ($all_baton as $key => $value) {
                            
                        ?>
                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['roll']; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <?php
                            foreach ($month as $key1 => $value1) {

                                     echo '<td>';
                                 foreach ($value['mon'] as $key2 => $value2) {
                                     if ($value1==$key2) {
                                         if ($value['stu_year'] == $value2['year'] && $value1!='January' && $value1!='February' && $value1!='March' && $value1!='April' && $value1!='May' && $value1!='June') {
                                             echo $value2['total'].'<br/>';
                                             echo $value2['dat'];

//                                         echo $value2['total'];
                                             $sum_all += $value2['total'];
                                             $sum += $value2['total'];
                                             $monthaa[$value1]['tk'] += $value2['total'];
                                        }elseif ($value['stu_year'] < $value2['year']) {
                                             echo $value2['total'].'<br/>';
                                             echo $value2['dat'];

//                                         echo $value2['total'];
                                             $sum_all += $value2['total'];
                                             $sum += $value2['total'];
                                             $monthaa[$value1]['tk'] += $value2['total'];
                                         }
                                     }else {
//                                        echo '-';
                                     }
                                 }//$sum=0;
                                 
                                 echo '</td>';
                                }?>
                            <td><?php echo $sum_all;
                            
                            $sum_all=0;?></td>
                        </tr>
                    <?php } } //echo '<pre>'; print_r($sum);?>
                        <tr>
                            <td colspan="3" style="text-align: center;"><?php echo $this->lang->line('total');?></td>
                            <!--<td></td>-->
                            <?php foreach ($monthaa as $key => $value) {
                                 echo '<td>'.$value['tk'];
                             } ?>
                            <td><?php echo $sum; ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php } ?>