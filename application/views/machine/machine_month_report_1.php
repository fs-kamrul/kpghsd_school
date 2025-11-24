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
<script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.js"></script>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>

<?php
//$stu=  array();
//$stu=0;
//$stu[]['day']= " ";
$k=1; $vl=0; //$stu_p['a']=0;$stu_p['p']=0;
//if($months){
//foreach ($months as $key=>$value) {
//    $stu["$value->id"]["id"]=$value->id;
//    $stu["$value->id"]["roll"]=$value->roll;
//    $stu["$value->id"]["name"]=$value->name;
//    $stu["$value->id"]["photo"]=$value->photo;
//    $stu["$value->id"]["phn"]=$value->mobile_number;
//    for ($ai = 1; $ai <= 31; $ai++) {
//        
//        $stu["$value->id"]["new"]["$ai"]["day"]=$ai;
//        $stu["$value->id"]["new"]["$ai"]["att"]=0;
//    }
//}
//    echo '<pre>';
//    print_r($stu);
//////    print_r($stu_p);
////    exit();
//}
?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    <div class="muted pull-right" style="padding-top: .5px;"><button class="btn btn-primary" onclick="printContent('printdiv')"><?php echo $this->lang->line('print');?></button></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            
            <form action="<?php echo base_url(); ?>machine_attendant_panel/machine_report_month.html" method="post" class="form-horizontal">
                
<!--                <samp><b>Day</b></samp>
                <select  name="day" id="select01" class="" style="width: 150px;">
                    <?php
                    for ($i=0; $i<=31; $i++) {
//                            $d = "";
                            $d = date('d');
                            if ($d == $i) {
                                ?>
                                <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                            }
                    }
                    ?>
                </select>-->
                
<?php $month=['January','February','March','April','May','June','July','August','September','October','November','December'];   
        $month_day = array(
            'January'=>31,
            'February'=>28,
            'March'=>31,
            'April'=>30,
            'May'=>31,
            'June'=>30,
            'July'=>31,
            'August'=>31,
            'September'=>30,
            'October'=>31,
            'November'=>30,
            'December'=>31
            
        );
//        print_r($month_day);
        ?>
                
                
                <samp><b><?php echo $this->lang->line('year');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 100px;">
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
                <samp><b><?php echo $this->lang->line('month');?></b></samp>
                <select  name="month" id="select01" class="" style="width: 100px;">
                    <?php
                    foreach ($month as $key=>$v_option) {
                        if($month_p==''){
                            $m = date('m');
                        }else{
                            $m = $month_p;
                        }
                            
                            if ($m == $key+1) {
                                ?>
                                <option value="<?php if($key+1 < 10){ echo '0';} echo $key+1; ?>" selected><?php echo $v_option; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php if($key+1 < 10){ echo '0';} echo $key+1; ?>"><?php echo $v_option; ?></option>
                                <?php
                            }
                    }
                    ?>
                </select>
                <samp><b><?php echo $this->lang->line('session');?></b></samp>
                <select  name="session" id="select01" class="" style="width: 100px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'year') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($session == "") {
                                $y = date('Y');
                            } else {
                                $y = $session;
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
                <select onclick="show_subject('subject_show');"  name="class" id="class_id" style="width: 100px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'class') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($class == "") {
                                $y = 'Ten';
                            } else {
                                $y = $class;
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
                <samp><b><?php echo $this->lang->line('group');?></b></samp>
                <select onclick="show_subject('subject_show');"  name="group_r"  id="group_r" style="width: 150px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'group') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($group_r == "") {
                                //$y = 'Ten';
                            } else {
                                $y = $group_r;
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
                </select><br />
                <samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 100px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'section') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($section == "") {
                                //$y = 'Ten';
                            } else {
                                $y = $section;
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
                <div style="display: inline-flex;">
                    <samp><b><?php echo $this->lang->line('type');?>:</b></samp>
                    <label class="radio-inline">
                        <input type="radio" name="ak" value="num" <?php if($ak=='num'){ echo 'checked'; } ?>><?php echo $this->lang->line('present_absent');?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ak" value="num1" <?php if($ak=='num1'){ echo 'checked'; } ?>><?php echo $this->lang->line('in_out_time');?>
                    </label>
                </div>
                <input type="hidden" name="subject"  id="subject_name">
                <button type="submit" class="btn btn-primary"> <?php echo $this->lang->line('submit');?></button>
            </form>
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
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title);?></h2><?php $mon=$month_p-1; ?>
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': '.$year.', ' . $this->lang->line('class') . ': '.$class.', ' . $this->lang->line('group') . ': '.$group_r.', ' . $this->lang->line('month') . ': '.$month[$mon];?></h2>
                </div>
                <?php 
//                echo '<pre>';
//                print_r($stu);
//                echo '</pre>'; 
                if(!empty($stu)){
                ?>
            <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                    <thead>
                        <tr>
                            <!--<th><?php //echo $this->lang->line('image');?></th>-->
                            <th><?php echo $this->lang->line('student_id');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('student_name');?></th>
                            <?php foreach ($stu as $key => $value) {
                                foreach ($value['new'] as $key1 => $value1) {
                                if($k==1){
                                ?>
                            <th><?php echo $value1['day']; 
                                    $count_present['date_'.$value1['day']] = 0;
                            
                            ?></th>
                                <?php } else {     echo ' '; }  } $k++; }?>
                            <th style="text-align: center"><?php echo $this->lang->line('total_present');?></th>
                            <th style="text-align: center"><?php echo $this->lang->line('total_absent');?></th>
                            <th><?php echo $this->lang->line('mobile');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stu as $value) { ?>
                            <tr>
<!--                                <td>
                                    <img height="100" width="120" src="<?php // echo $value['photo']; ?>" alt="<?php // echo $value['name']; ?>">
                                </td>-->
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['roll']; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <?php foreach ($value['new'] as $key => $value1) { ?>
                                <td><?php if($value1['att']==1){
                                        
                                    $count_present['date_'.$value1['day']] += 1;
//                                            if($value1['present_count'])
                                        $plus = strlen($value1['time']);
                                        echo substr($value1['time'], 0, $plus - 1); 
                                        ?>
                                    <!--<i class="fa fa-check-square"></i>-->
                                <?php }  else { 
                                    $count_present['date_'.$value1['day']] += 0;
                                        echo $value1['time']; ?>
                                    <!--<i class="fa fa-remove red"></i>-->
                 <?php } ?></td>
                                <?php }?>
                                <td style="text-align: center"><?php
                                 foreach ($value['new'] as $key => $value1) {
                                     if ($value1['att']==1) {
                                         $vl+=$value1['att'];
                                     }
                                 } echo $vl; $vl=0;
                                ?>
                                </td>
                                <td style="text-align: center">
                                <?php
                                 foreach ($value['new'] as $key => $value1) {
                                     if ($value1['att']==0) {
                                         $vl+=1;
                                     }
                                 } echo $vl; $vl=0;
                                ?>
                                </td>
                                <td><?php echo $value['phn']; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" style="text-align: center;"><?php echo $this->lang->line('total_present');?></td>
                            <?php
                            $k=1;
                            foreach ($stu as $key => $value4) {
                                foreach ($value4['new'] as $key1 => $value5) {
                                if($k==1){
                                ?>
                            <td><?php echo $count_present['date_'.$value5['day']]; 
                            
                            ?></td>
                                <?php } else {     echo ' '; }  
                                
                                } $k++; }?>
                            <td colspan="3"></td>
                        </tr>
                    </tbody>
                </table>
                <?php } else {
                            echo 'Data Not Found.';
                        } ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('class').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('section').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('year').value = '<?php echo $all_class->data_a; ?>';
</script>