<?php
$message = $this->session->userdata('message');
//$error = $this->session->userdata('error');
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
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4><?php echo $this->lang->line('error');?> !</h4>
        <?php echo $erroraaa; ?>
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
        <div class="span12">
            <form action="<?php echo base_url(); ?>baton_panel/save_baton_set_package" method="post" class="form-horizontal">
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('year');?> :</td>
                            <td>
                                <select  name="year" id="select01" class="">
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
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('class');?> :</td>
                            <td>
                                <select  name="class" id="class_id" >
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
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('group');?></td>
                            <td>
                                <select name="group"  id="group_r" class="">
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
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('package_name');?></td>
                            <td>
                                <select  name="package" id="select01" class="">
                                    <?php
                                    foreach ($baton_package as $v_option) {?>
                                        <option value="<?php echo $v_option->id; ?>"><?php echo $v_option->package_name; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_set_package');?></button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
    </div>
</div>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line('view');?> <?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>baton_panel/baton_set_package.html" method="post" class="form-horizontal">
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
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th><?php echo $this->lang->line('year');?></th>
                        <th><?php echo $this->lang->line('class');?></th>
                        <th><?php echo $this->lang->line('group');?></th>
                        <th><?php echo $this->lang->line('package_name');?></th>
                        <th><?php echo $this->lang->line('date');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
//                    echo '<pre>';
//                    print_r($baton_set_package);
                    foreach ($baton_set_package as $v_reg) {
                        ?>
                        <tr>
                            <td><?php echo $v_reg->id; ?></td>
                            <td><?php echo $v_reg->year; ?></td>
                            <td><?php echo $v_reg->class; ?></td>
                            <td><?php echo $v_reg->group_r; ?></td>
                            <td><?php echo $v_reg->package_name; ?></td>
                            <td><?php echo $v_reg->created_at; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>baton_panel/baton_set_delete/<?php echo $v_reg->id; ?>" onclick="return check_delete();"><button class="btn btn-danger"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('delete');?></button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>