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
$erroraaa = $this->session->userdata('erroraaa');
if ($erroraaa) {
    ?>
    <div class="alert alert-error">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $this->lang->line('error');?> !</strong> <?php echo $erroraaa; ?>
    </div>
    <?php
    $this->session->unset_userdata('erroraaa');
}
?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12" style="overflow-x:auto;">
            <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th><?php echo $this->lang->line('class');?></th>
                        <th><?php echo $this->lang->line('section');?></th>
                        <th><?php echo $this->lang->line('group');?></th>
                        <th><?php echo $this->lang->line('year');?></th>
                        <th><?php echo $this->lang->line('student_id');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                        <th><?php echo $this->lang->line('manual');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($all_class as $v_class_reg) {
                        ?>
                        <tr>
                    <form action="<?php echo base_url(); ?>baton_panel/all_class_baton_set.html" method="post" class="form-horizontal">
                
                <input type="hidden" name="class" value="<?php echo $v_class_reg->class; ?>"/>
                <input type="hidden" name="section" value="<?php echo $v_class_reg->section; ?>"/>
                <input type="hidden" name="group_r" value="<?php echo $v_class_reg->group_r; ?>"/>
                <input type="hidden" name="year" value="<?php echo $v_class_reg->year; ?>"/>
                            <td><?php echo $i;
                        $i++; ?></td>
                            <td><?php echo $v_class_reg->class; ?></td>
                            <td><?php echo $v_class_reg->section; ?></td>
                            <td><?php echo $v_class_reg->group_r; ?></td>
                            <td><?php echo $v_class_reg->year; ?></td>
                            <td>
                                <select  name="student_id" id="select01" class="">
                                    <?php
                                        $s_id_info = $this->setting_model->class_student_reg_search($v_class_reg->class,$v_class_reg->year,$v_class_reg->section,$v_class_reg->group_r);
                                    ?>
                                    <option value=""><?php echo $this->lang->line('all_student');?></option>
                                    <?php
                                    foreach ($s_id_info as $data) {
                                                ?>
                                                <option value="<?php echo $data->id; ?>"><?php echo $data->id; ?></option>
                                                <?php

                                        }

                                    ?>
                                </select>
                            </td>
                            <td><input type="hidden" readonly name="b_collage" value="<?php if($v_class_reg->class=='Eleven' || $v_class_reg->class=='Twelve'){?>1<?php } ?>" >
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button></td>
                </form>
                            <form action="<?php echo base_url(); ?>baton_panel/all_class_baton.html" method="post" class="form-horizontal">

                                <input type="hidden" name="class" value="<?php echo $v_class_reg->class; ?>"/>
                                <input type="hidden" name="section" value="<?php echo $v_class_reg->section; ?>"/>
                                <input type="hidden" name="group_r" value="<?php echo $v_class_reg->group_r; ?>"/>
                                <input type="hidden" name="year" value="<?php echo $v_class_reg->year; ?>"/>

                            <td><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('manual_search');?></button></td>
                            </form>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>