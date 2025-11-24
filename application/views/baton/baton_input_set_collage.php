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

    <script>
        <!--
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
        function save_stu_batton(sttk,stuid,reg_id)
        {
//        document.getElementById('orderrow' + pid).style.display = "none";
            var sttk_next = 1;
        var roll = document.getElementById('roll' + sttk).innerHTML;
        var st_tk = document.getElementById('pos' + sttk).innerHTML;
        var class_c = document.getElementById('class_c').innerHTML;
        var year = document.getElementById('year').innerHTML;
        var group = document.getElementById('group').innerHTML;
        var section = document.getElementById('section').innerHTML;
        var month = document.getElementById('month' + sttk).value;
        var development_fee = document.getElementById('development_fee' + sttk).value;
            var session_fee = document.getElementById('session_fee' + sttk).value;
            var lab_fee = document.getElementById('lab_fee' + sttk).value;
            var admission_fee = document.getElementById('admission_fee' + sttk).value;
        var tution_fee = document.getElementById('tution_fee' + sttk).value;
        var tiffin_fee = document.getElementById('tiffin_fee' + sttk).value;
        var fine = document.getElementById('fine' + sttk).value;
        var delay_fee = document.getElementById('delay_fee' + sttk).value;

        if(month=='January' || month=='February' || month=='March' || month=='April' || month=='May' || month=='June'){
            var year_b = parseInt(year) +1;
        }else{
            var year_b = parseInt(year);
        }
//            var data_all=[];
//            data_all[0]='kamrul';
//            data_all[1]='islam';
//            alert('---'+group+'--');
             var receite_no = prompt('Roll: '+roll+'\nReceite no');
            //alert(receite_no);
            var bar = confirm('Are you sure you want to Submit Baton?');
            if (bar) {

            serverPage = "<?php echo base_url(); ?>baton_panel/save_baton_stu/" + class_c+"/"+year+"/"+group+"/"+section+"/"+st_tk+"/"+sttk+"/"+stuid+
                "/"+reg_id+"/"+month+"/"+development_fee+"/"+tution_fee+"/"+tiffin_fee+"/"+session_fee+"/"+lab_fee+"/"+admission_fee+"/"+fine+"/"+delay_fee+"/"+year_b+"/"+receite_no;
           sttk_next += parseInt(sttk);
//            $('#pos'+sttk).hide();
//            document.getElementById('posk'+sttk).innerHTML = st_tk;
//        var sell = document.getElementById('pos' + sttk).hide;
//        alert('kamrul');
//        alert(st_tk);
//        alert(sttk_next);
            xmlhttp.open("GET", serverPage);
            xmlhttp.onreadystatechange = function()
            {
//            alert(xmlhttp.readyState);
//            alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
//                    alert(xmlhttp.responseText);
                    var month_hide = parseInt(sttk_next-1);
                    $('#pos'+sttk).hide();
                    document.getElementById('posk'+sttk).innerHTML = xmlhttp.responseText;
                    $('#pos'+sttk_next).attr("disabled", false);
                    $('#pos_mon'+month_hide).hide();
//                    $('form#postbar input[type="submit"]').removeAttr('disabled');
                }
            }
           }
            xmlhttp.send(null);
        }
    </script>
<?php //$month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      $month = ['July', 'August', 'September', 'October', 'November', 'December','January', 'February', 'March', 'April', 'May', 'June'];
// print_r($month);?>
<?php
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
<?php //if ($class_b!='Anik') {?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
<!--        <div class="muted pull-right" style="padding-top: .5px;"><button class="btn btn-primary" onclick="printContent('printdiv')"><?php echo $this->lang->line('print');?></button></div>-->
    </div>
    <div class="block-content collapse in" id="printdiv">
        <style>
            table { border-collapse: collapse; }
            table, th, td { border: 1px solid black; }
            /*tr:nth-child(even) {background-color: #F2F3FF}*/
        </style>
        <link href="<?php echo base_url(); ?>css/tablea.css" rel="stylesheet" type="text/css"/>
        <div class="prhide">
<!--            <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;">Collectorate Public School & College, Nilphamari</h3>-->
            <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title);?></h2>
        </div>
        <div class="span12"  style="overflow-x:auto;">
            <table class="table">
                <thead>
                <tr>
                    <td style="text-align: center;" colspan="15"><strong><?php echo $this->lang->line('class');?>: <span id="class_c"><?php echo $class;?></span>, <?php echo $this->lang->line('year');?>: <span id="year"><?php echo $year;?></span>, <?php echo $this->lang->line('group');?>: <span id="group"><?php echo $group_r;?></span>, <?php echo $this->lang->line('section');?>: <span id="section"><?php echo $section;?></span></strong></td>
                </tr>
                    <tr>
                        <th rowspan="2"><?php echo $this->lang->line('id');?></th>
                        <th rowspan="2"><?php echo $this->lang->line('name');?></th>
                        <th colspan="6"><?php echo $year;?></th>
                        <th colspan="6"><?php echo $year+1;?></th>
                        <th rowspan="2"><?php echo $this->lang->line('total');?></th>
                    </tr>
                    <tr>
                        <?php foreach ($month as $key => $value) {
                         echo '<th>'.$value.'</th>';
                        }?>
                    </tr>
                </thead>
                <tbody>
                    <?php $sum=$sum_all=$cou_mon=$stu_array=$all_baton_show_tution=$all_baton_show_fee=$all_baton_show_january=$all_baton_show_january_fee=0;
                    $as = array();
//                    echo '<pre>';
//                    print_r($baton_set_package);
                    $array_1 = json_decode(json_encode($baton_set_package), True);
//                    echo '</pre>';
                    if(count($array_1)>0) {
                            $all_baton_show_tution      = $baton_set_package->tution_fee + $baton_set_package->tiffin_fee; // + $baton_set_package->tiffin_fee;
                            $all_baton_show_fee         = $baton_set_package->tution_fee + $baton_set_package->tiffin_fee + $baton_set_package->fine;
                            $all_baton_show_january     = $baton_set_package->development_fee + $baton_set_package->tution_fee + $baton_set_package->tiffin_fee + $baton_set_package->admission_fee + $baton_set_package->session_fee + $baton_set_package->lab_fee ;
                            $all_baton_show_january_fee = $baton_set_package->development_fee + $baton_set_package->tution_fee + $baton_set_package->tiffin_fee + $baton_set_package->admission_fee + $baton_set_package->session_fee + $baton_set_package->lab_fee + $baton_set_package->fine;
                    }else{ ?>
                        <script>
                            alert("This Class can not be set any package. Please set package Fast.");
                        </script>
                   <?php }
                    if(isset($all_class)){
                        foreach ($all_class as $key3 => $value3) { ?>
                            <tr>
                                <td><?php echo $value3->id; ?></td>
                                <td><?php echo $value3->name; ?></td>
                 <?php
                foreach ($month as $key1 => $value1) {
                    $monthly_id[$value3->id][$value1]['tk']=-1;
                    echo "<td style='text-align: center;'>";//<form action='".base_url()."baton_panel/baton_save_ajas.html' method='post' class='form-horizontal'>
                    if(isset($all_baton)){
//                        foreach ($all_baton as $key => $value) {
                            if(isset($all_baton[$value3->id]['mon'])){

                                 foreach ($all_baton[$value3->id]['mon'] as $key2 => $value2) {
                                     if ($all_baton[$value3->id]['stu_year'] == $value2['year'] && $value1!='January' && $value1!='February' && $value1!='March' && $value1!='April' && $value1!='May' && $value1!='June') {
                                         if ($value1 == $key2) {
                                             echo $value2['total'];
                                             $sum_all += $value2['total'];
                                             $sum += $value2['total'];
                                             $monthly_id[$value3->id][$value1]['tk'] = $value2['total'];
                                             $monthaa[$value1]['tk'] += $value2['total'];
                                         } elseif ($sum_all == 0) {
//                                        echo '+';
                                         }
                                     }elseif ($all_baton[$value3->id]['stu_year'] < $value2['year']) {
                                         if ($value1 == $key2) {
                                             echo $value2['total'];
                                             $sum_all += $value2['total'];
                                             $sum += $value2['total'];
                                             $monthly_id[$value3->id][$value1]['tk'] = $value2['total'];
                                             $monthaa[$value1]['tk'] += $value2['total'];
                                         } elseif ($sum_all == 0) {
//                                        echo '+';
                                         }
                                     }

                                 }
                            }else{}
                                 //$sum=0;

//                                }

                        }else{ }
//                        echo '<pre>';
//                    print_r($monthly_id);
//                    echo '<pre>';
//                    exit();
                    if(count($array_1)>0) {
                    if($monthly_id[$value3->id][$value1]['tk']<0){
                        $cou_mon++;
                        $stu_array++;
//                        $as[$stu_array]=$value1;
//                                             echo $cou_mon.">";substr($value1,0,3)
//                        echo 'cou_mon-'.$cou_mon.' key-'.$key1.'</br/>';
//                            echo $key1+1+6;
//                            echo ' year:'.$year.'<br/>';//.' ' .  $this->lang->line('month') . ':'.date("m").'=='.$cou_mon;
                        if($cou_mon==1){
                            if($key1==6){
                                $key1 = $key1 - 12;
//                                $year = $year+1;
                            }
//                            echo '('.$key1.')';
//                            echo 'n-year:'.$year.'<br/>';
//                            echo 'n-key-';
//                            echo $key1+1+6;
                            if ($key1+1+6<date("m")){
//                                echo 'dd--'.date("m").'-----'.$key1;
//                                 || date('Y')<$year+1
                                if($key1+1+6==7){
                                    ?>
                                    <span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                    <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary"><?php
if($baton_set_package->p_type==1) {
echo $all_baton_show_january_fee;
}else{
echo $all_baton_show_january;
}  ?></button>
                                    <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                    <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                    <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                    <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->development_fee; ?>">
                                    <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                    <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->admission_fee; ?>">
                                    <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->session_fee ; ?>">
                                    <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->lab_fee ; ?>">
                                    <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee ; ?>">
                                    <?php
                                    if($baton_set_package->p_type==1) { ?>
                                        <input type="hidden" id="fine<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->fine; ?>">
                                    <?php }else{ ?>
                                        <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                    <?php } ?>

                                    <?php
                                }else{
//                                    echo "<button id='pos".$stu_array."' class='btn btn-primary'>".$all_baton_show_fee."</button>";
                                    ?> <span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                    <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary"><?php
if($baton_set_package->p_type==1) {
echo $all_baton_show_fee;
}else{
echo $all_baton_show_tution;
} ?></button>
                                    <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                    <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                    <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                    <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                    <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee ; ?>">
                                    <?php
                                    if($baton_set_package->p_type==1) { ?>
                                        <input type="hidden" id="fine<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->fine; ?>">
                                    <?php }else{ ?>
                                        <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                    <?php } ?>

                                <?php }
                            }else{
                                if($key1+1+6==7){
                                    if($year<date('Y')){
                                       ?> <span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                        <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary"><?php 
if($baton_set_package->p_type==1) {
echo $all_baton_show_january_fee;
}else{
echo $all_baton_show_january;
}   ?></button>
                                        <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                        <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                        <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                        <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->development_fee; ?>">
                                        <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee; ?>">
                                        <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                        <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->admission_fee; ?>">
                                        <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->session_fee ; ?>">
                                        <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->lab_fee ; ?>">
                                        <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="0">
                                        <?php
                                        if($baton_set_package->p_type==1) { ?>
                                            <input type="hidden" id="fine<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->fine; ?>">
                                        <?php }else{ ?>
                                            <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                        <?php } ?>
                                    <?php  
                                    }else{
                                    ?> <span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                    <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary"><?php echo $all_baton_show_january; ?></button>
                                    <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                    <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                    <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                    <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->development_fee; ?>">
                                    <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee; ?>">
                                    <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                    <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->admission_fee; ?>">
                                    <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->session_fee ; ?>">
                                    <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->lab_fee ; ?>">
                                    <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                    <?php } ?>
                                    
                                    <?php
                                }else{
//                                    echo "<button id='pos".$stu_array."' class='btn btn-primary'>".$all_baton_show_fee."</button>";
//                                    echo '</br>355-'.$year.' Y-'.date('Y').'<br/>';
//                                    echo $key1+1+6;
                                    if($year<date('Y')){
//                                        echo $key1+1+6;
                                        if($key1+1+6==date('m')){
                                            ?>
                                            <span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                            <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary"><?php echo $all_baton_show_tution; ?></button>
                                            <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                            <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                            <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                            <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="0">
                                            <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee ; ?>">
                                            <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                            <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                            <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="0">
                                            <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="0">
                                            <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="0">
                                            <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="0">
                                            <?php
                                        }else {
                                            if($key1+1+6<13) {
//                                                echo 'kam';

                                                ?>
                                                <span id="pos_mon<?php echo $stu_array; ?>"
                                                      class="label label-success"><?php echo $value1; ?></span>
                                                <button id="pos<?php echo $stu_array; ?>"
 onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id; ?>','<?php echo $value3->reg_id; ?>')"
 class="btn btn-primary"><?php
if ($baton_set_package->p_type == 1) {
echo $all_baton_show_fee;
} else {
echo $all_baton_show_tution;
} ?></button>
                                                <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                                <span id="roll<?php echo $stu_array; ?>"
                                                      class="label label-important"><?php echo $value3->roll; ?></span>
                                                <input type="hidden" id="month<?php echo $stu_array; ?>"
                                                       value="<?php echo $value1; ?>">
                                                <input type="hidden" id="development_fee<?php echo $stu_array; ?>"
                                                       value="0">
                                                <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>"
                                                       value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                                <input type="hidden" id="admission_fee<?php echo $stu_array; ?>"
                                                       value="0">
                                                <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="delay_fee<?php echo $stu_array; ?>"
                                                       value="<?php echo $baton_set_package->tution_fee; ?>">
                                                <?php
                                                if ($baton_set_package->p_type == 1) { ?>
                                                    <input type="hidden" id="fine<?php echo $stu_array; ?>"
                                                           value="<?php echo $baton_set_package->fine; ?>">
                                                <?php } else { ?>
                                                    <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                                <?php } ?>
                                                <?php
                                            }else{
                                                if($key1+1-6<date('m')){
//                                                    echo $key1+1-6;
                                                    ?>
                                                    <span id="pos_mon<?php echo $stu_array; ?>"
                                                          class="label label-success"><?php echo $value1; ?></span>
                                                    <button id="pos<?php echo $stu_array; ?>"
    onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id; ?>','<?php echo $value3->reg_id; ?>')"
    class="btn btn-primary"><?php
if ($baton_set_package->p_type == 1) {
    echo $all_baton_show_fee;
} else {
    echo $all_baton_show_tution;
} ?></button>
                                                    <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                                    <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                                    <input type="hidden" id="month<?php echo $stu_array; ?>"  value="<?php echo $value1; ?>">
                                                    <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="0">
                                                    <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="0">
                                                    <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>"  value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                                    <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="0">
                                                    <input type="hidden" id="session_fee<?php echo $stu_array; ?>"  value="0">
                                                    <input type="hidden" id="lab_fee<?php echo $stu_array; ?>"  value="0">
                                                    <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee; ?>">
                                                    <?php
                                                    if($baton_set_package->p_type==1) { ?>
                                                        <input type="hidden" id="fine<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->fine; ?>">
                                                    <?php }else{ ?>
                                                        <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                                    <?php } ?>
                                               <?php }else{
//                                                echo $key1+1-6;
                                                ?>
                                                <span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                                <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary"><?php echo $all_baton_show_tution; ?></button>
                                                <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                                <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                                <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                                <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee ; ?>">
                                                <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                                <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="0">
                                                <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="0">
                                          <?php } }
                                            }
                                    }else{
                                    ?> <span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                    <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary"><?php echo $all_baton_show_tution; ?></button>
                                    <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                    <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                    <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                    <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee ; ?>">
                                    <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                    <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="0">
                                    <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="0">
                                <?php } }
                            }
                        }else{
//                            echo '(';echo $key1+1+6; echo ')';
                            if ($key1+1+6<date("m")){
                                //echo "<button id='pos".$stu_array."' class='btn btn-primary' disabled>".$all_baton_show_fee."</button>";
                                ?><span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary" disabled><?php echo $all_baton_show_tution; ?></button>
                                <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                    <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee ; ?>">
                                <?php
                            }else{
                                //echo "<button id='pos".$stu_array."' class='btn btn-primary' disabled>".$all_baton_show_tution."</button>";
                                ?><span id="pos_mon<?php echo $stu_array; ?>" class="label label-success"><?php echo $value1; ?></span>
                                <button id="pos<?php echo $stu_array; ?>" onclick="save_stu_batton('<?php echo $stu_array; ?>','<?php echo $value3->id;?>','<?php echo $value3->reg_id;?>')" class="btn btn-primary" disabled><?php echo $all_baton_show_tution; ?></button>
                                <span id="posk<?php echo $stu_array; ?>"></span><br/>
                                    <span id="roll<?php echo $stu_array; ?>" class="label label-important"><?php echo $value3->roll; ?></span>
                                <input type="hidden" id="month<?php echo $stu_array; ?>" value="<?php echo $value1; ?>">
                                <input type="hidden" id="development_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="tution_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tution_fee; ?>">
                                <input type="hidden" id="tiffin_fee<?php echo $stu_array; ?>" value="<?php echo $baton_set_package->tiffin_fee; ?>">
                                <input type="hidden" id="fine<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="admission_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="session_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="lab_fee<?php echo $stu_array; ?>" value="0">
                                <input type="hidden" id="delay_fee<?php echo $stu_array; ?>" value="0">
                                <?php
                            }
                        }
                    }
                                }else{ echo '';

                    }
                    echo '</td>';//</form>
                }
                        ?>
                            <td><?php echo $sum_all;

                            $sum_all=0; $cou_mon=0;?></td>
                        </tr>
                    <?php }
                    } //echo '<pre>'; print_r($sum);?>
                        <tr>
                            <td colspan="2" style="text-align: center;"><?php echo $this->lang->line('total');?></td>
                            <!--<td></td>-->
                            <?php foreach ($monthaa as $key => $value) {
                                 echo '<td>'.$value['tk'];
                             } ?>
                            <td><?php echo $sum; ?></td>
                        </tr>
                </tbody>
            </table>
            <?php
//            echo '<pre>';
//            print_r($as);
            ?>
            <?php

//            echo '<pre>';
//            print_r($monthly_id);
//            exit(); ?>
        </div>
    </div>
</div>
<?php //} ?>