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

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>result_show/searchresult.html" method="post" class="form-horizontal">
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
                <samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 110px;">
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
                </select>
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>

            </form>
            <form action="<?php echo base_url(); ?>add_four_panel/save_add.html" method="POST">
                <table class="table">
                    <thead>

                        <tr>
                            <th><?php echo $this->lang->line('id');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('name');?></th>
                            <?php
                            foreach ($sub as $v_sub) {
                                ?>
                                <th><?php echo $v_sub->sub_code; ?></th>
                            <?php } ?>
                            <th><?php echo $this->lang->line('gpa');?></th>
                            <th><?php echo $this->lang->line('cgpa');?></th>
                            <th><?php echo $this->lang->line('total');?></th>
                            <th>PT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_reg as $v_reg) {
                            $total_num = $gp = $cgp = 0;
                            $i = $j = 0;
                            $igpf = 0;
                            ?>
                            <tr>

                                <td><?php echo $v_reg->id; ?></td>
                                <td><?php echo $v_reg->roll; ?></td>
                                <td><?php echo $v_reg->name; ?></td>
                                <?php
                                $sub = $this->sr_model->sub_name_and_four($v_reg->all_reg_id,$group_r,$class);
                                foreach ($sub as $v_sub) {
                                    $total_mark = $this->sr_model->sub_mark_result($term, $v_reg->all_reg_id, $v_sub->sub_id);
                                    $sum = 0;
                                    $pf_all=  array();
                                    if ($v_sub->add_f == null || $v_sub->add_f == 1 || $v_sub->add_f == 2) {
                                        foreach ($total_mark as $v_total_mark) {
                                            $sum = $sum + $v_total_mark->mark;
                                            $pf_all[]=$v_total_mark->mark_pf;
                                        }
//                                        echo '<pre>';
//                                        print_r($pf_all);
                                        $sum = (100 / $v_sub->sub_mark) * $sum;
                                        $total_num = $total_num + $sum;
                                        if ($v_sub->add_f == null && $sum != 0) {
                                            $cgp = $cgp + $grade->getNumberPoint($sum);
                                            if ($grade->getNumberPoint($sum) == 0) {
                                                $igpf = 1;
                                            }
                                            $i++;
                                            ?>
                                            <td><?php echo $sum; ?></td>
                                            <?php
                                        } else if ($v_sub->add_f == 1) { ?>
                                            
                                            <td <?php foreach ($pf_all as $value) {
                                                if($value=="f"){
                                                $we=2;
                                                ?>style="background: red;"<?php } }?>><?php echo $sum . "*"; ?></td>
                                            <?php
                                        } elseif($v_sub->add_f == 2) {
                                            ?>
                                            <td <?php foreach ($pf_all as $value1) {
                                                if($value1=="f"){
                                                $we=2;
                                                ?>style="background: red;"<?php } }?>><?php echo $sum; ?></td>
                                            <?php
                                        }   else { ?>
                                            <td>---</td>
                                        <?php }
                                        $gp = $gp + $grade->getNumberPoint($sum);
                                        $j++;
                                    } else {
                                        ?>
                                        <td></td>
                                        <?php
                                    }
                                }
                                $gp = $grade->getgpaav($gp, $i, $igpf);
                                $cgp = $grade->getgpaav($cgp, $i, $igpf);
                                ?>
                                <td><?php echo $position_r[$v_reg->all_reg_id]['cgp']; ?></td>
                                <td><?php echo $position_r[$v_reg->all_reg_id]['gp']; ?></td>
                                <td><?php echo $position_r[$v_reg->all_reg_id]['total_num']; ?></td>
                                <td><?php echo $position_r[$v_reg->all_reg_id]['position']; ?></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

