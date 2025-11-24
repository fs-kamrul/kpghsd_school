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

<?php
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
        <div class="muted pull-left">Option Form</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>subject_panel/save_sub.html" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('subject_code');?></label>
                        <div class="controls">
                            <input name="sub_code" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('subject_name');?></label>
                        <div class="controls">
                            <input name="sub_name" type="text" class="span6" id="typeahead" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('class');?></label>
                        <div class="controls">
                            <select  name="class" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'class') {
                                        ?>
                                        <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('group');?></label>
                        <div class="controls">
                            <select  name="group_r" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'group') {
                                        ?>
                                        <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('total_mark');?></label>
                        <div class="controls">
                            <input name="sub_mark" type="text" class="span6" id="typeahead" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('pass_mark');?></label>
                        <div class="controls">
                            <select  name="pass_mark" id="select01" class="">
                                <?php
                                for ($i = 0; $i <= 100; $i++) {
                                    if ($i == 33) {
                                        ?>
                                <option value="<?php echo "0.".$i; ?>" selected=""><?php echo $i."%"; ?></option>
                                        <?php
                                    }else{
                                        ?>
                                        <option value="<?php echo "0.".$i; ?>"><?php echo $i."%"; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
                        <button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">View Subject</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>subject_panel/search_sub.html" method="post" class="form-horizontal">
                
                <samp><b><?php echo $this->lang->line('class');?></b></samp>
                <select  name="class" id="select01" class="">
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
                <samp><b><?php echo $this->lang->line('group');?></b></samp>
                <select  name="group_r" id="select01" class="">
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
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th><?php echo $this->lang->line('subject_code');?></th>
                        <th><?php echo $this->lang->line('subject_name');?></th>
                        <th><?php echo $this->lang->line('subject_mark');?></th>
                        <th><?php echo $this->lang->line('class');?></th>
                        <th><?php echo $this->lang->line('group');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($all_sub_show as $v_sub) {
                        ?>
                        <tr>
                            <td><?php echo $v_sub->sub_id; ?></td>
                            <td><?php echo $v_sub->sub_code; ?></td>
                            <td><?php echo $v_sub->sub_name; ?></td>
                            <td><?php echo $v_sub->sub_mark; ?></td>
                            <td><?php echo $v_sub->class; ?></td>
                            <td><?php echo $v_sub->group_r; ?></td>
                            <td>
                                <?php if($user_power == 'super_admin'){ ?>
                                <div style="margin-top:10px;">
                                    <p>
                                        <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                        <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>-->
<!--                                        <a href="#"><button  class="btn btn-primary" id="notification-sticky"><i class="icon-pencil icon-white"></i>--><?php //echo $this->lang->line('edit');?><!--</button></a>-->
                                        <a href="<?php echo base_url(); ?>subject_panel/sub_delete/<?php echo $v_sub->sub_id; ?>" onclick="return check_delete();"><button  class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></button></a>
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