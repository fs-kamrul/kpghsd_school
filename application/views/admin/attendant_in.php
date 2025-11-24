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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('action');?></th>
                        <!--<th><?php echo $this->lang->line('sl');?></th>-->
                        <th>Class Section Group</th>
                        <!--<th><?php echo $this->lang->line('section');?></th>-->
                        <!--<th><?php echo $this->lang->line('group');?></th>-->
                        <th><?php echo $this->lang->line('year');?></th>
                        <th><?php echo $this->lang->line('subject');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($all_class as $v_class_reg) {
                        ?>
                    <form action="<?php echo base_url(); ?>attendant_panel/only_att.html" method="post" class="form-horizontal">
                
                <input type="hidden" name="class" value="<?php echo $v_class_reg->class; ?>"/>
                <input type="hidden" name="section" value="<?php echo $v_class_reg->section; ?>"/>
                <input type="hidden" name="group_r" value="<?php echo $v_class_reg->group_r; ?>"/>
                <input type="hidden" name="year" value="<?php echo $v_class_reg->year; ?>"/>
                <input type="hidden" name="subject_id" value="<?php echo $v_class_reg->sub_id; ?>"/>
                        <tr>
                            <td><button type="submit" class="btn btn-primary">Set</button></td>
<!--                            <td><?php // echo $i;
                        $i++; ?></td>-->
                            <td><?php echo $v_class_reg->class.' - '.$v_class_reg->section.' - '.$v_class_reg->group_r; ?></td>
                            <!--<td><?php // echo $v_class_reg->section; ?></td>-->
                            <!--<td><?php // echo $v_class_reg->group_r; ?></td>-->
                            <!--<td><?php // echo $v_class_reg->total; ?></td>-->
                            <td><?php echo $v_class_reg->year; ?></td>
                            <td><?php echo $v_class_reg->sub_name; ?></td>
                        </tr>
                </form>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>