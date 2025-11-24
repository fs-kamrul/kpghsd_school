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
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>subject_panel/reg_search.html" method="post" class="form-horizontal">
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
                <select  name="class" onclick="show_subject('subject_show');" id="class_id" style="width: 150px;">
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

                <samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 100px;">
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
                <select  name="group_r" id="select01" class="" style="width: 150px;">
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
            <?php if ($all_data == 1) { ?>
                <form action="<?php echo base_url(); ?>subject_panel/reg_update.html" method="post" class="form-horizontal">
                    <table class="table"  cellpadding="0" cellspacing="0" border="0" id="example">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('roll');?></th>
                                <th><?php echo $this->lang->line('class');?></th>
                                <th><?php echo $this->lang->line('student_name');?></th>
                                <th><?php echo $this->lang->line('roll');?></th>
                                <th><?php echo $this->lang->line('group');?></th>
                                <th><?php echo $this->lang->line('section');?></th>
                                <th><?php echo $this->lang->line('tag_id');?></th>
                                <th><?php echo $this->lang->line('year');?></th>
                                <!--<th><?php echo $this->lang->line('action');?></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($search_reg as $v_search_reg) {
                                ?>
                                <tr>
                                    <td><?php
                                        echo $v_search_reg->roll;
                                        ?>
                                        <input type="hidden" name="all_reg_id<?php echo $i; ?>" value="<?php echo $v_search_reg->all_reg_id; ?>">
                                        <input type="hidden" name="group_r" value="<?php echo $group_r; ?>">
                                        <input type="hidden" name="section" value="<?php echo $section; ?>">
                                    </td>
                                    <td><?php echo $v_search_reg->class; ?><input type="hidden" name="class" value="<?php echo $v_search_reg->class; ?>"></td>
                                    <td><?php echo $v_search_reg->name; ?><input type="hidden" name="" value="<?php echo $v_search_reg->name; ?>"></td>
                                    <td><input type="text" style="width: 100px" name="roll<?php echo $i; ?>" value="<?php echo $v_search_reg->roll; ?>"></td>
                                    <td>
                                        <select  name="group_r<?php echo $i; ?>" id="select01" class="" style="width: 100px;">
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
                                    </td>
                                    <td>
                                        <select  name="section<?php echo $i; ?>" id="select01" class="" style="width: 100px;">
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
                                    </td>
                                    <td>
                                        <?php $tag = $this->sp_model->select_tag($v_search_reg->reg_id)?>
                                        <input type="text" name="rfid_tag<?php echo $i; ?>" value="<?php if($tag){ echo $tag->rfid_tag; }else{}  ?>" style="width: 100px">
                                        <input type="hidden" name="reg_id<?php echo $i; ?>" value="<?php echo $v_search_reg->reg_id; ?>" style="width: 100px">
                                        <input type="hidden" name="stu_id<?php echo $i; ?>" value="<?php echo $v_search_reg->id; ?>" style="width: 100px">
                                        <?php if($tag){ ?>
                                        <a href="<?php echo base_url(); ?>subject_panel/tag_delete/<?php echo $tag->id; ?>" class="btn btn-inverse"><i class="icon-trash icon-white"></i></a>
                                        <?php }?>
                                    </td>
                                    <td><?php echo $v_search_reg->year; ?><input type="hidden" name="year" value="<?php echo $v_search_reg->year; ?>"></td>
<!--                                    <td>
                                        <div style="margin-top:10px;">
                                            <p>
                                                <a href="<?php // echo base_url(); ?>subject_panel/delete_reg/<?php // echo $v_search_reg->all_reg_id; ?>" onclick="return check_delete();"><img src="<?php // echo base_url(); ?>images/dele.JPG"></a>
                                            </p>
                                        </div>
                                    </td>-->
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>   <input type="hidden" name="other" value="<?php echo $i - 1; ?>">
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-inverse"><i class="icon-refresh icon-white"></i> <?php echo $this->lang->line('update_all_info');?></button>
                </form>
<?php } ?>
        </div>
    </div>
</div>
<script>
    document.getElementById('class').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('section').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('year').value = '<?php echo $all_class->data_a; ?>';
</script>