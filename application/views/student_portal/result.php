
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ form-element ] start -->
     <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo $this->lang->line('result');?></h5>
            </div>
            <div class="card-body">
                <form class="form-v1" action="<?php echo base_url(); ?>student_portal/result" method="POST">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-label-group">
                                <input type="text" name="studentID" id="studentID" class="form-control">
                                <label class="form-label" for="studentID"><?php echo $this->lang->line('student_id');?> :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-label-group">
                                <select class="form-select form-k1" name="session" id="session">
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
                                <label class="form-label form-level-k1" for="session"><?php echo $this->lang->line('session');?> :</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-label-group">
                                <select class="form-select form-k1" id="exam">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'term') {
                                            $cl = $v_option->data_a;
                                            if ($term == $cl) {
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
                                <label class="form-label form-level-k1" for="exam"><?php echo $this->lang->line('exam_type');?> :</label>
                            </div>
                        </div>

                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php if (!empty($resultsite) or !empty($sub_r)) { ?>
                            <button style="padding-left: 5px;" class="btn btn-success" onclick="printContent('printdiv')">Print</button>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if (!empty($resultsite) or !empty($sub_r)) { ?>

        <div class="col-md-12">
            <div class="card">
                <div id="printdiv" class="card-body">
                    <link href="<?php echo base_url(); ?>css/tablea.css" rel="stylesheet" type="text/css"/>
                    <div class="prhide">
                        <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;"><?php echo kamrul_site_info('s_name'); ?></h3>
                        <h2 style="text-align: center;font-size: 15px;">Academic Transcript of
                            <?php echo $exam_type;
                            if ($exam_type == "first_term") {
                                echo "1st";
                            } elseif ($exam_type == "second_term") {
                                echo "2nd";
                            } elseif ($exam_type == "third_term") {
                                echo "3th";
                            }else{
                                echo $exam_type;
                            }
                            ?>
                            Terminal Examination
                        </h2>
                    </div>
                    <table style="width: 100%">
                        <tbody>
                        <tr>
                            <td><h6 style="margin-bottom: 0px;">Name:</h6></td>
                            <td><?php echo $resultsite->name; ?></td>
                            <td colspan="4" rowspan="3"><img src="<?php echo base_url(); ?>images/logod.png" width="80px" alt=""/></td>
                            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td colspan="2" rowspan="5"><img src="<?php echo base_url(); ?>images/grd.PNG" width="140px" alt=""/></td>

                        </tr>
                        <tr>
                            <td><h6 style="margin-bottom: 0px;">Student ID:</h6></td><td><?php echo $resultsite->id; ?></td><td colspan="2"></td>
                        </tr>
                        <!--            <tr>
                <td><h6 style="margin-bottom: 0px;">Father Name:</h6></td>
                <td><?php // echo $resultsite->father_name; ?></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td><h6 style="margin-bottom: 0px;">Mother Name:</h6></td>
                <td><?php // echo $resultsite->mother_name; ?></td>
                <td colspan="2"></td>
            </tr>-->
                        <tr>
                            <td><h6 style="margin-bottom: 0px;">Class:</h6></td>
                            <td><?php echo $resultsite->class; ?></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td><h6 style="margin-bottom: 0px;">Year:</h6></td>
                            <td><?php echo $resultsite->year; ?></td>
                            <td><h6 style="margin-bottom: 0px;">Roll:</h6></td>
                            <td><?php echo $resultsite->roll; ?></td>
                        </tr>
                        <tr>
                            <td><h6 style="margin-bottom: 0px;">Group:</h6></td>
                            <td><?php echo $resultsite->group_r; ?></td>
                            <td><h6 style="margin-bottom: 0px;">Section:</h6></td>
                            <td><?php echo $resultsite->section; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <table id="gradient-style" summary="Meeting Results" style="width: 100%;text-align: center;">
                        <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Total Mark</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Grade Point</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $all_total=$total_sub=0;$count_point=0;$ron=0;
                        if($main_data){
                            foreach ($sub_info as $key1 => $value1) {
//            echo '<pre>'; print_r($key1);

                                $vn = $vn1 = $num = 0; $num1 = "";
                                $pf = $pfp = "";
                                foreach ($main_data[$key1] as $key2 => $value2) {
//                        print_r($key2);
                                    $pas=$value2['sub_mark'];
                                    $pas1=100/$pas;
                                    $pas2=$pas1*$value2['total'];
                                    $vn +=$pas2;
//                        $vn+=$value2['total'];

                                    $fo=$value2['add_f'];
                                    $pss=$value2['pass_mark']*$value2['sub_mark'];
                                    if ($value2['mark_pf'] == 'f') {
                                        $pf = "f";
                                    } elseif ($value2['mark_pf'] == 'p') {
                                        $pfp = "p";
                                    }
                                }
                                $all_total+=$vn;
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

                                if ($fo==1) {
//                        echo '';
                                    if ($str>2) {
                                        $count_point+=($str-2);
                                    }
                                }elseif ($fo==3) {
//                        echo '';
                                }  else {
                                    $total_sub++;
                                    if ($pf=="f") {
                                        $count_point=0;
                                        $ron=1;
                                    }  else {
                                        if ($ron==1) {
                                            $count_point=0;
                                        }  else {
                                            $count_point+=$str;
                                        }
                                    }
                                }

                                ?>
                                <tr>
                                    <td><?php echo $value1['sub_code'];?></td>
                                    <td style="text-align: left;"><?php
                                        if ($fo==1) {
                                            echo $key1.'*';
                                        }elseif ($fo==3) {
                                            echo $key1.'#';
                                        }  else {
                                            echo $key1;
                                        }  ?></td>
                                    <td><?php
                                        foreach ($main_data[$key1] as $key2 => $value2) {
//                        print_r($key2);
//                        $num+=$value2['total'];
                                            $pas=$value2['sub_mark'];
                                            $pas1=100/$pas;
                                            $pas2=$pas1*$value2['total'];
                                            $num +=$pas2;
//                        $sum_t = $pas2.'+'.$sum_t;
                                            $num1 =$pas2."+".$num1;
                                            $fo=$value2['add_f'];
                                        } //echo $num1;
                                        $plus = strlen($num1);
                                        echo $plusa = substr($num1, 0, $plus - 1);
                                        ?></td>
                                    <td><?php echo $stg; ?></td>
                                    <td><?php echo $str; ?></td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td>Total Mark</td>
                            <td>
                                <?php echo $all_total;?>
                            </td>
                            <td>CGPA</td>
                            <td>
                                <?php
                                if($total_sub==0){
                                    echo '0';
                                }  else {
                                    echo substr($count_point/$total_sub, 0, 4);
                                }
                                // echo substr($count_point/$total_sub, 0, 4);?>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- [ form-element ] end -->
</div>
<!-- [ Main Content ] end -->
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