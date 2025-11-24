<?php
$grade = new Grade();
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
<script src="<?php echo base_url(); ?>vendors/jquery.table2excel.js"></script>
<style>
    .prhide {
        display: none;
    }
    .result_0{
        float: left;
        width: 180px;
    }tfoot{
        display: block;
    }
    @media print {
        .prhide {
            display: block;
        }
        tfoot{
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
<?php // if ($class != "Anik") { ?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
        <!--<div class="muted pull-right" style="padding-top: .5px;"><button class="btn btn-primary" onclick="printContent('printdiv')"><?php echo $this->lang->line('print');?></button></div>-->
    </div>
    <div class="block-content collapse in" style="overflow-x:auto;">
        <div class="span12 anik-table-responsive" id="printdiv" style="overflow-x:auto;">
            <style>
/*                table { border-collapse: collapse; }
                table, th, td { border: 1px solid black; }*/
                /*tr:nth-child(even) {background-color: #F2F3FF}*/
                @media print {
        tfoot{
            display: none;
        }
    }
            </style>
            <link href="<?php echo base_url(); ?>css/tablea.css" rel="stylesheet" type="text/css"/>
            <div class="prhide">
                <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;">Collectorate Public School & College, Nilphamari</h3>
                <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title);?></h2>
                <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': ' . $year . ', ' . $this->lang->line('class') . ': ' . $class . ', ' . $this->lang->line('term') .': ' . $term; ?></h2>
            </div>
            
                <form action="<?php echo base_url(); ?>pdf_panel/save_stu_data.html" method="POST">
                    <input type="hidden" name="year" value="<?php echo $year; ?>">
                    <input type="hidden" name="class" value="<?php echo $class; ?>">
                    <input type="hidden" name="term" value="<?php echo $term; ?>">
                    <!--<input type="hidden" name="section" value="<?php // echo $section; ?>">-->
                    <input type="hidden" name="group_r" value="<?php // echo $group_r; ?>">
                    <table class="table table-striped" id="table">
                        <thead>

                            <tr>
                                <th><?php echo $this->lang->line('mobile_number');?></th>
                                <th style="text-align: center">Massage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vn = $vn1 = $pas = 0;
                            $pf = $pfp = "";
                            $count_to = 1;
                            if (isset($main_data)) {
                                foreach ($main_data as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php // echo $value['roll']; ?>
                                        #<?php 
                                            if ($number==0) {
                                                        echo $value['mobile_number']; 
                                                    }  else {
                                                        echo $value['stu_phone']; 
                                                    }

                            ?>
                                        </td>
                                        <td> Dear guardian,
                                            <?php echo  $value['name'].' ,id: '.$value['id'].' . Get Result: '; ?>
                                        <?php foreach ($sub_info as $key1 => $value1) { ?>
                                            <?php
                                            if (isset($value['mark'][$value1['sub_name'] . "_mark"])) {
                                                foreach ($value['mark'][$value1['sub_name'] . "_mark"] as $key2 => $value2) {

                                                    $pas = $value2['sub_mark'];
                                                    $pas1 = 100 / $pas;
                                                    $pas2 = $pas1 * $value2['total'];
                                                    $vn +=$pas2;
                                                    $vn1 +=$pas2;
                                                    $pss=$value2['pass_mark']*$value2['sub_mark'];
                                                    if ($value2['mark_pf'] == 'f') {
                                                        $pf = "f";
                                                    } elseif ($value2['mark_pf'] == 'p') {
                                                        $pfp = "p";
                                                    }
                                                }
                                                
                    $str = $vn;
                if ($str<100 && $str>79 && $pf == "" && $pfp == "p"){
                $str = 5; $stg="A+";}
                else if ($str<80 && $str>69 && $pf == "" && $pfp == "p"){
                    $str = 4; $stg="A";}
                else if ($str<70 && $str>59 && $pf == "" && $pfp == "p"){
                    $str = 3.5; $stg="A-";}
                else if ($str<60 && $str>49 && $pf == "" && $pfp == "p"){
                    $str = 3; $stg="B";}
                else if ($str<50 && $str>39 && $pf == "" && $pfp == "p"){
                    $str = 2; $stg="C";}
                else if ($str<40 && $str>$pss-1 && $pf == "" && $pfp == "p"){
                    $str = 1; $stg="D";}
                else if ($str<33 && $str>-1 && $pf == "" && $pfp == "p"){
                    $str = 0; $stg="F"; $pf = "f";}
                else{
                    $str = 0;  $stg="F"; $pf = "f";}
                    
                    
                                                if ($vn < ($value2['pass_mark'] * $value2['sub_mark'])) {
                                                    $pf = "f";
                                                }
                                                if ($value2['add_f'] == 2 && $pf == "" && $pfp == "p") {
                                                    echo ' ' . $value1['sub_code'] .'-' . $vn . '(' .$stg.'), ';
                                                } elseif ($value2['add_f'] == 1 && $pf == "" && $pfp == "p") {
                                                    echo ' ' . $value1['sub_code'] .'*-'  . $vn . '(' .$stg.'), ';
                                                } elseif ($value2['add_f'] == 2 && $pf == "f") {
                                                    echo ' ' . $value1['sub_code'] .'-'  . $vn . '(' .$stg.'), ';
                                                } elseif ($value2['add_f'] == 1 && $pf == "f") {
                                                    echo ' ' . $value1['sub_code'] .'*-'  . $vn . '(' .$stg.'), ';
                                                } elseif ($value2['add_f'] == 3) {
                                                    echo ' ' . $value1['sub_code'] .'#-'  . $vn . '(' .$stg.'), ';
                                                }
                                                $vn = 0;
                                                $pf = $pfp = "";
                                            } else {
                                                
                                            }
                                        }
                                        echo ' ' . $this->lang->line('total_mark') .': '.$vn1.' , Cgpa: '.$all_process[$value['id']]['cgpa'] . ' ' . $academy_info->s_name . ' </td>';
                    $vn1 = 0;
                    $count_to++;
                    ?>
                                <input type="hidden" name="opt" value="<?php echo $count_to - 1; ?>">
                                </tr>
        <?php }
    } ?>

                        </tbody>
                    </table>
                </form>

        </div>
    </div>
</div>

<script>
    document.getElementById('class').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('section').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('year').value = '<?php echo $all_class->data_a; ?>';
</script>
<script type="text/javascript">
$("#table").table2excel({
    exclude: ".excludeThisClass",
    name: "Worksheet Name",
    filename: "Cpscn_sms_result.xls",
    fileext: ".xls"
});
</script>