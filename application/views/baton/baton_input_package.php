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
            <form action="<?php echo base_url(); ?>baton_panel/save_baton_package" method="post" class="form-horizontal">
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('baton_package_name');?> :</td>
                            <td>
                                <input name="package_name" required style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('tuition_fee');?> :</td>
                            <td>
                                <input name="tution_fee" required style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('tiffin_fee');?> :</td>
                            <td>
                                <input name="tiffin_fee" style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('fine');?> :</td>
                            <td>
                                <input name="fine" style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('admission_fee');?> :</td>
                            <td>
                                <input name="admission_fee" style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('development_fee');?> :</td>
                            <td>
                                <input name="development_fee" style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('session_fee');?> :</td>
                            <td>
                                <input name="session_fee" style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('lab_fee');?> :</td>
                            <td>
                                <input name="lab_fee" style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('baton_package_name');?> :</td>
                            <td>
                                <input name="others_fee" style="width: 50%;" class="span6" id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save_package');?></button>
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
        <div class="muted pull-left"><?php echo $this->lang->line('view');?><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th><?php echo $this->lang->line('package_name');?></th>
                        <th><?php echo $this->lang->line('tuition_fee');?></th>
                        <th><?php echo $this->lang->line('tiffin_fee');?></th>
                        <th><?php echo $this->lang->line('fine');?></th>
                        <th><?php echo $this->lang->line('admission_fee');?></th>
                        <th><?php echo $this->lang->line('development_fee');?></th>
                        <th><?php echo $this->lang->line('session_fee');?></th>
                        <th><?php echo $this->lang->line('lab_fee');?></th>
                        <th><?php echo $this->lang->line('others_fee');?></th>
                        <th><?php echo $this->lang->line('action');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($baton_package as $v_reg) {
                        ?>
                        <tr>
                            <td><?php echo $v_reg->id; ?></td>
                            <td><?php echo $v_reg->package_name; ?></td>
                            <td><?php echo $v_reg->tution_fee; ?></td>
                            <td><?php echo $v_reg->tiffin_fee; ?></td>
                            <td><?php echo $v_reg->fine; ?></td>
                            <td><?php echo $v_reg->admission_fee; ?></td>
                            <td><?php echo $v_reg->development_fee; ?></td>
                            <td><?php echo $v_reg->session_fee; ?></td>
                            <td><?php echo $v_reg->lab_fee; ?></td>
                            <td><?php echo $v_reg->others_fee; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>baton_panel/baton_package_delete/<?php echo $v_reg->id; ?>" onclick="return check_delete();" class="btn btn-danger" style="margin-bottom: 5px;"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('delete');?></a>
                                <?php if($v_reg->p_type==0){  ?>
                                    <a href="<?php echo base_url(); ?>baton_panel/baton_package_active/<?php echo $v_reg->id; ?>/1" onclick="return alert('Are You Sure Active This Package');" class="btn btn-warning"><i class="icon-refresh icon-white"></i> <?php echo $this->lang->line('active');?></a>
                                <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>baton_panel/baton_package_active/<?php echo $v_reg->id; ?>/0" onclick="return alert('Are You Sure Inactive This Package');" class="btn btn-info"><i class="icon-edit icon-white"></i> <?php echo $this->lang->line('inactive');?></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>