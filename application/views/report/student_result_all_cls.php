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
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12 anik-table-responsive" style="overflow-x:auto;">
            <form action="<?php echo base_url(); ?>pdf_panel/all_class_report.html" method="post" class="form-horizontal">
                <samp><b><?php echo $this->lang->line('year');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 110px;">
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
                <select  name="class" id="select01" class="" style="width: 110px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'class') {
                            $cl = $v_option->data_a;
                            if ($class == $cl) {
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

                <samp><b><?php echo $this->lang->line('term');?></b></samp>
                <select  name="term" id="select01" class="" style="width: 110px;">
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
                <samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 110px;">
                    <option value=""><?php echo $this->lang->line('all_section');?></option>
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'section') {
                            $cl = $v_option->data_a;
                            if ($section == $cl) {
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
                <select  name="group_r" id="select01" class="" style="width: 110px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'group') {
                            $cl = $v_option->data_a;
                            if ($group_r == $cl) {
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
                </select><br>
                <div style="display: inline-flex;">
                    <samp><b><?php echo $this->lang->line('type');?>:</b></samp>
                    <label class="radio-inline">
                        <input type="radio" name="ak" value="sum_mark" <?php if($ak=='sum_mark'){ echo 'checked'; } ?>>Sum Mark
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ak" value="with_out_sum_mark" <?php if($ak=='with_out_sum_mark'){ echo 'checked'; } ?>>Without Sum Mark
                    </label>
                </div>
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>

            </form>
        </div>
    </div>
</div>
<?php if ($class != "Anik") { ?>
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><?php echo $this->lang->line($title); ?></div>
            <div class="muted pull-right" style="padding-top: .5px;">
                <button class="btn btn-primary"
                        onclick="printContent('printdiv')"><?php echo $this->lang->line('print'); ?></button>
            </div>
        </div>
        <div class="block-content collapse in">
            <div class="span12 anik-table-responsive" id="printdiv" style="overflow-x:auto;">
                <style>
                    table {
                        border-collapse: collapse;
                    }

                    table, th, td {
                        border: 1px solid black;
                    }

                    /*tr:nth-child(even) {background-color: #F2F3FF}*/
                    @media print {
                        tfoot {
                            display: none;
                        }
                    }
                </style>
                <link href="<?php echo base_url(); ?>css/tablea.css" rel="stylesheet" type="text/css"/>
                <div class="prhide">
                    <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;"><?php echo $academy_info->s_name; ?></h3>
                    <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;"><?php echo $academy_info->s_address; ?></h3>
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line($title); ?></h2>
                    <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': ' . $year . ', ' . $this->lang->line('class') . ': ' . $class . ', ' . $this->lang->line('group') . ': ' . $group_r . ', ' . $this->lang->line('term') . ': ' . $term; ?></h2>
                </div>

                <form action="<?php echo base_url(); ?>pdf_panel/save_stu_data.html" method="POST">
                    <input type="hidden" name="year" value="<?php echo $year; ?>">
                    <input type="hidden" name="class" value="<?php echo $class; ?>">
                    <input type="hidden" name="term" value="<?php echo $term; ?>">
                    <!--<input type="hidden" name="section" value="<?php // echo $section; ?>">-->
                    <input type="hidden" name="group_r" value="<?php echo $group_r; ?>">
                    <table class="table">
                        <thead>

                        <tr>
                            <th><?php echo $this->lang->line('id'); ?></th>
                            <th><?php echo $this->lang->line('roll'); ?></th>
                            <th><?php echo $this->lang->line('section'); ?></th>
                            <th><?php echo $this->lang->line('name'); ?></th>
                            <?php foreach ($sub_info as $key => $value) { ?>
                                <th>
                                    <?php
                                    // foreach ($value['sub_info'] as $key1 => $value1) {
                                    echo $value['sub_code'];
                                    //                                }
                                    ?>
                                </th>
                            <?php } ?>
                            <th><?php echo $this->lang->line('gpa'); ?></th>
                            <th><?php echo $this->lang->line('cgpa'); ?></th>
                            <th><?php echo $this->lang->line('total'); ?></th>
                            <th>PT</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $vn = $vn1 = $pas = 0;
                        $pf = $pfp = "";
                        $count_to = 1;
                        $grade = new Grade();
                        if ($main_data) {
                            foreach ($main_data as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value['id']; ?>
                                        <input type="hidden" name="all_reg_id<?php echo $count_to; ?>"
                                               value="<?php echo $value['all_reg_id']; ?>">
                                    </td>
                                    <td><?php echo $value['roll']; ?></td>
                                    <td><?php echo $value['section']; ?>
                                        <input type="hidden" name="section<?php echo $count_to; ?>"
                                               value="<?php echo $value['section']; ?>">
                                    </td>
                                    <td><?php echo $value['name']; ?></td>

                                    <?php $sum_t = "";
                                    foreach ($sub_info as $key1 => $value1) { ?>
                                        <?php
                                        if (isset($value['mark'][$value1['sub_name'] . "_mark"])) {
                                            foreach ($value['mark'][$value1['sub_name'] . "_mark"] as $key2 => $value2) {

                                                $pas = $value2['sub_mark'];
                                                $pas1 = 100 / $pas;
                                                $pas2 = $pas1 * $value2['total'];
                                                $vn += $pas2;
                                                $vn1 += $pas2;
//                                                    $sum_t = $pas2.'+'.$sum_t.' @ ';
//                                                    echo $sum_t;
                                                if ($value2['mark_pf'] == 'f') {
                                                    $pf = "f";
                                                } elseif ($value2['mark_pf'] == 'p') {
                                                    $pfp = "p";
                                                }
                                            }
                                            if ($vn < ($value2['pass_mark'] * $value2['sub_mark'])) {
                                                $pf = "f";
                                            }
                                            if ($value2['add_f'] == 2 && $pf == "" && $pfp == "p") {
                                                echo '<td>(' . $grade->cut_plus_1($value[$value1['sub_name']]['to_mark']) . ')</td>';//$vn
                                            } elseif ($value2['add_f'] == 1 && $pf == "" && $pfp == "p") {
                                                echo '<td>(' . $grade->cut_plus_1($value[$value1['sub_name']]['to_mark']) . ')*</td>';//$vn
                                            } elseif ($value2['add_f'] == 2 && $pf == "f") {
                                                echo '<td style="background: red;">(' . $grade->cut_plus_1($value[$value1['sub_name']]['to_mark']) . ')</td>';//$vn
                                            } elseif ($value2['add_f'] == 1 && $pf == "f") {
                                                echo '<td style="background: red;">' . $grade->cut_plus_1($value[$value1['sub_name']]['to_mark']) . ')*</td>';//$vn
                                            } elseif ($value2['add_f'] == 3) {
                                                echo '<td style="background: yellow;">(' . $grade->cut_plus_1($value[$value1['sub_name']]['to_mark']) . ') #</td>';//$vn
                                            }
                                            $vn = 0;
                                            $sum_t = "";
                                            $pf = $pfp = "";
                                        } else {
                                            echo '<td>---</td>';
                                        }
                                    }
                                    echo '<td>' . $all_process[$value['id']]['gpa'];
                                    ?><input type="hidden" name="gpa<?php echo $count_to; ?>"
                                             value="<?php echo $all_process[$value['id']]['gpa']; ?>"><?php
                                    echo '</td>';
                                    echo '<td>' . $all_process[$value['id']]['cgpa'];
                                    ?><input type="hidden" name="cgpa<?php echo $count_to; ?>"
                                             value="<?php echo $all_process[$value['id']]['cgpa']; ?>"><?php
                                    echo '</td>';
                                    echo '<td>' . $vn1;
                                    ?><input type="hidden" name="total_mark<?php echo $count_to; ?>"
                                             value="<?php echo $vn1; ?>"><?php
                                    echo '</td>';
                                    echo '<td>' . $all_process[$value['id']]['position'];
                                    ?><input type="hidden" name="position<?php echo $count_to; ?>"
                                             value="<?php echo $all_process[$value['id']]['position']; ?>"><?php
                                    echo '</td>';
                                    $vn1 = 0;
                                    $count_to++;
                                    ?>
                                </tr>
                            <?php }
                        } ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <td><input type="hidden" name="opt" value="<?php echo $count_to - 1; ?>"></td>
                            <td><input type="submit" class="btn btn-primary" value="Submit"></td>
                            <td colspan="<?php echo count($sub_info) + 6; ?>"></td>
                        </tr>
                        </tfoot>
                    </table>
                </form>
                <br/>
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line('subject_code'); ?></th>
                        <th><?php echo $this->lang->line('subject_name'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($sub_info as $value12){
                    ?>
                    <tr>
                        <td><?php echo $value12['sub_code'] ?></td>
                        <td><?php echo $value12['sub_name'] ?></td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
            <?php
//                print_r($sub_info);
            ?>
        </div>
    </div>
</div>
<?php } ?>

