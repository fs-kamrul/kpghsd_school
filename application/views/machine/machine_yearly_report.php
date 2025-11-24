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
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title);?></h2><?php //$mon=$month_p-1; ?>
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': '.$year.', ' . $this->lang->line('class') . ': '.$class.', ' . $this->lang->line('group') . ': '.$group_r;?></h2>
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
                            <!--<th><?php echo $this->lang->line('image');?></th>-->
                            <th><?php echo $this->lang->line('student_id');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('student_name');?></th>

                            <?php
                            echo '<th>'.date('F', strtotime($start_date)).'</th>';
                            for($i=1;$i<=11;$i++){
                                $j = $i+1;
                                echo '<th>'.date('F', strtotime($start_date . ' + '.$i.' Months')).'</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stu as $value) { ?>
                            <tr>
<!--                                <td>
                                    <img height="100" width="120" src="<?php // echo $value['photo']; ?>" alt="<?php // echo $value['name']; ?>">
                                </td>-->
                                <?php foreach ($value['row'] as $value2) { ?>
                                <td style="text-align: center;"><?php echo $value2; ?></td>
                                <?php } ?>
                        </tr>
                        <?php } ?>
<!--                        <tr>-->
<!--                            <td colspan="3" style="text-align: center;"><?php echo $this->lang->line('total_present');?></td>-->
<!---->
<!--                            <td colspan="3"></td>-->
<!--                        </tr>-->
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