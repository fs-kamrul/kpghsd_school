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
            <form action="<?php echo base_url(); ?>student_info/stu_registration_view.html" method="post" class="form-horizontal">
                <samp><b><?php echo $this->lang->line('year');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 150px;">
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
                <select  name="class" id="select01" class="" style="width: 150px;">
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
                <select  name="section" id="select01" class="" style="width: 150px;">
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
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('id');?></th>
                        <th><?php echo $this->lang->line('roll');?></th>
                        <th><?php echo $this->lang->line('image');?></th>
                        <th><?php echo $this->lang->line('name');?></th>
                        <th><?php echo $this->lang->line('number');?></th>
                        <th><?php echo $this->lang->line('address');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($all_reg as $v_reg) {
                        ?>
                        <tr <?php if($v_reg->ending_date != '0000-00-00'){ ?> style="background-color: green;color: white;" <?php } ?>>
                            <td><?php echo $v_reg->id; ?></td>
                            <td><?php echo $v_reg->roll; ?></td>
                            <td>
                                <img height="100" width="120" src="<?php if($v_reg->photo!=""){ echo base_url() . $v_reg->photo; } ?>" alt="<?php echo $v_reg->name; ?>">
                            </td>
                            <td><?php echo $v_reg->name; ?><br/>
                                F: <?php echo $v_reg->father_name; ?><br/>
                                M: <?php echo $v_reg->mother_name; ?>
                            </td>
                            <td> Guardian: <?php echo $v_reg->mobile_number; ?><br/>
								Std: <?php echo $v_reg->stu_phone; ?>
                            </td>
                            <td><?php echo $v_reg->village; ?>,<br />
                                <?php echo $v_reg->post; ?>,<br />
                                <?php echo $v_reg->sub_district; ?>,<br />
                                <?php echo $v_reg->district; ?>,<br />
                                <?php echo $v_reg->division; ?>,<br />
                                <?php echo $v_reg->country; ?>
                            </td>
                            <td>
                                <?php if($user_power == 'super_admin'){ ?>
                                <div style="margin-top:10px;">
                                    <p>
                                        <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                        <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>-->
                                        <a href="<?php echo base_url(); ?>student_info/reg_edit/<?php echo $v_reg->reg_id; ?>"><button class="btn btn-primary"><i class="icon-pencil icon-white"></i><?php echo $this->lang->line('edit');?></button></a>
                                        <a href="<?php echo base_url(); ?>student_info/reg_delete/<?php echo $v_reg->reg_id; ?>" onclick="return check_delete();"><button class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></button></a>

                                    </p>										
                                </div>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>