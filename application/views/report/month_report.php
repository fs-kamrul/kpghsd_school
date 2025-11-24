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
<script>
    
//Create a boolean variable to check for a valid Internet Explorer instance.
    var xmlhttp = false;
//Check if we are using IE.
    try {
//If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
    } catch (e) {
//If not, then use the older active x object.
        try {
//If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
//Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
//If we are using a non-IE browser, create a javascript instance of the object.
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
    }
function show_subject(obj)
    {
//        document.getElementById('orderrow' + pid).style.display = "none";
//        var product_id = document.getElementById('product_id' + pid).innerHTML;
//        var product_q = document.getElementById('product_q' + pid).innerHTML;
//        var sell = document.getElementById('sell' + pid).value;
//        var quantity = document.getElementById('quantity' + pid).value;
        var cls_s = document.getElementById('class_id').value;
        var grp = document.getElementById('group_r').value;
        serverPage = "<?php echo base_url(); ?>subject_panel/show_sub/" + cls_s+"/"+grp;
        
//        alert(cls_s);
//        alert(serverPage);
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function()
        {
//            alert(xmlhttp.readyState);
//            alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById(obj).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
    function show_subject_one(obj)
    {
//        document.getElementById('orderrow' + pid).style.display = "none";
//        var product_id = document.getElementById('product_id' + pid).innerHTML;
//        var product_q = document.getElementById('product_q' + pid).innerHTML;
//        var sell = document.getElementById('sell' + pid).value;
//        var quantity = document.getElementById('quantity' + pid).value;
        var grp = document.getElementById('subject_show').value;
//        var cls_s = document.getElementById('class_id').value;
//        var grp = document.getElementById('group_r').value;
        serverPage = "<?php echo base_url(); ?>subject_panel/show_sub_one/" + grp;
        
//        alert(cls_s);
//        alert(serverPage);
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function()
        {
//            alert(xmlhttp.readyState);
//            alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById(obj).value = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>
<?php
$stu=  array();
//$stu=0;
//$stu[]['day']= " ";
$k=1; $vl=0; //$stu_p['a']=0;$stu_p['p']=0;
if($months){
foreach ($months as $key=>$value) {
    $stu["$value->id"]["id"]=$value->id;
    $stu["$value->id"]["roll"]=$value->roll;
    $stu["$value->id"]["name"]=$value->name;
    $stu["$value->id"]["photo"]=$value->photo;
    $stu["$value->id"]["phn"]=$value->mobile_number;
    $stu["$value->id"]["new"]["$value->day"]["day"]=$value->day;
    $stu["$value->id"]["day"]=$value->day;
    if($value->valid_att==0){
    $stu["$value->id"]["new"]["$value->day"]["att"]=$value->valid_att;
    }else{
    $stu["$value->id"]["new"]["$value->day"]["att"]=$value->valid_att;
    //$stu_p['a']+=$value->valid_att;
    }
}
//    echo '<pre>';
//    print_r($stu);
////    print_r($stu_p);
//    exit();
}
?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    <div class="muted pull-right" style="padding-top: .5px;"><button class="btn btn-primary" onclick="printContent('printdiv')"><?php echo $this->lang->line('print');?></button></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            
            <form action="<?php echo base_url(); ?>attendant_panel/report_month.html" method="post" class="form-horizontal">
                
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
                
<?php $month=['January','February','March','April','May','June','July','August','September','October','November','December'];                   // print_r($month);?>
                <samp><b><?php echo $this->lang->line('month');?></b></samp>
                <select  name="month" id="select01" class="" style="width: 100px;">
                    <?php
                    foreach ($month as $key=>$v_option) {
                            $m = date('m');
                            if ($m == $key+1) {
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
                <select onclick="show_subject('subject_show');"  name="group"  id="group_r" style="width: 150px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'group') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($group == "") {
                                //$y = 'Ten';
                            } else {
                                $y = $group;
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
                <br/><samp><b><?php echo $this->lang->line('subject');?></b></samp>
                <select  onclick="show_subject_one('subject_name');" name="subject_name" id="subject_show">
                                    
                                </select>
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
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title);?></h2>
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': '.$year.', ' . $this->lang->line('class') . ': '.$class.', ' . $this->lang->line('group') . ': '.$group.', Subject Name: '.$subject;?></h2>
                </div>
            <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                    <thead>
                        <tr>
                            <!--<th><?php echo $this->lang->line('image');?></th>-->
                            <th><?php echo $this->lang->line('student_id');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('student_name');?></th>
                            <?php foreach ($stu as $key => $value) {
                                foreach ($value['new'] as $key1 => $value1) {
                                if($k==1){
                                ?>
                            <th><?php echo $value1['day']; 
                            
                            ?></th>
                                <?php } else {     echo ' '; }  } $k++; }?>
                            <th style="text-align: center"><?php echo $this->lang->line('total_present');?></th>
                            <th style="text-align: center"><?php echo $this->lang->line('total_absent');?></th>
                            <!--<th><?php echo $this->lang->line('mobile');?></th>-->
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
                                <td><?php if($value1['att']==1){ ?>
                                    <i class="fa fa-check-square"></i>
                                <?php }  else { ?>
                                    <i class="fa fa-remove red"></i>
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
                                <!--<td><?php // echo $value['phn']; ?></td>-->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('class').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('section').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('year').value = '<?php echo $all_class->data_a; ?>';
</script>