
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><?php echo $this->lang->line('subject_mark');?></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form action="<?php echo base_url(); ?>subject_panel/save_input_one_mark/<?php echo $sub_one_assigned->assigned_id; ?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject: <?php echo $sub_one_assigned->subject_name; ?></th>
                                <th><?php echo $this->lang->line('year');?>: <?php echo $sub_one_assigned->year; ?></th>
                                <th><?php echo $this->lang->line('section'); ?>: <?php echo $sub_one_assigned->section; ?></th>
                                <th><?php echo $this->lang->line('class');?>: <?php echo $sub_one_assigned->class; ?></th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('student_name');?></th>
                                <th><?php echo $this->lang->line('roll');?></th>
                                <th><?php echo $add_mark->mark_title; ?> (<?php echo $add_mark->mark_number; ?>)</th>
                        <input type="hidden" name="add_mark_id" value="<?php echo $add_mark->add_mark_id; ?>">
                        <input type="hidden" name="assigned_id" value="<?php echo $add_mark->assigned_id; ?>">
                        <th>
                            <select  name="term" id="select01" class="chzn-select">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'term') {
                                        ?>
                                        <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($reg as $v_r) { ?>
                                <tr>
                                    <td><?php echo $v_r->reg_id;echo $v_r->all_reg_id; ?><input type="hidden" name="reg_id<?php echo $i; ?>" value="<?php echo $v_r->reg_id; ?>"></td>
                                    <td><?php echo $v_r->roll; ?></td>
                                    <td><input type="text" name="mark<?php echo $i; ?>">
                                        <input type="hidden" name="other" value="<?php echo $i; ?>">
                        <input type="hidden" name="all_reg_id<?php echo $i; ?>" value="<?php echo $v_r->all_reg_id;?>">
                                    </td>
                                    <td></td>
                                </tr>
    <?php $i++;
} ?>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" name="" value="Add Subject Mark" class="btn btn-success"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>