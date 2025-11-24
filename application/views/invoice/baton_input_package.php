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
            <?php if(!isset($record)){ ?>
            <form action="<?php echo base_url(); ?>invoice_panel/save_invoice_package" method="post" class="form-horizontal">
            <?php }else{ ?>
                <form action="<?php echo base_url(); ?>invoice_panel/update_invoice_package" method="post" class="form-horizontal">
                    <input type="hidden" name="package_id" value="<?php echo $record->id; ?>">
            <?php } ?>
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('package_name');?> :</td>
                            <td>
                                <input name="package_name" required style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->package_name.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('tuition_fee');?> :</td>
                            <td>
                                <input name="tution_fee" required style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->tution_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('tiffin_fee');?> :</td>
                            <td>
                                <input name="tiffin_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->tiffin_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
<!--                        <tr class="">-->
<!--                            <td></td>-->
<!--                            <td>--><?php //echo $this->lang->line('fine');?><!-- :</td>-->
<!--                            <td>-->
<!--                                <input name="fine" style="width: 50%;" class="span6" id="alinfo" type="text">-->
<!--                            </td>-->
<!--                            <td></td>-->
<!--                        </tr>-->
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('admission_fee');?> :</td>
                            <td>
                                <input name="admission_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->admission_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('development_fee');?> :</td>
                            <td>
                                <input name="development_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->development_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('session_fee');?> :</td>
                            <td>
                                <input name="session_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->session_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('lab_fee');?> :</td>
                            <td>
                                <input name="lab_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->lab_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('exam_fee');?> :</td>
                            <td>
                                <input name="exam_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->exam_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('tesitimonial_fee');?> :</td>
                            <td>
                                <input name="tesitimonial_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->tesitimonial_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('tc_fee');?> :</td>
                            <td>
                                <input name="tc_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->tc_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('board_reg');?> :</td>
                            <td>
                                <input name="board_reg" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->board_reg.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('cultural_fee');?> :</td>
                            <td>
                                <input name="cultural_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->cultural_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('scout_fee');?> :</td>
                            <td>
                                <input name="scout_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->scout_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('game_fee');?> :</td>
                            <td>
                                <input name="game_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->game_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('common_fee');?> :</td>
                            <td>
                                <input name="common_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->common_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('poor_fund');?> :</td>
                            <td>
                                <input name="poor_fund" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->poor_fund.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('magazine_fee');?> :</td>
                            <td>
                                <input name="magazine_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->magazine_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('id_card_fee');?> :</td>
                            <td>
                                <input name="id_card_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->id_card_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('library_fee');?> :</td>
                            <td>
                                <input name="library_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->library_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('receit_fee');?> :</td>
                            <td>
                                <input name="receit_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->receit_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('dev_study_fee');?> :</td>
                            <td>
                                <input name="dev_study_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->dev_study_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('computer_fee');?> :</td>
                            <td>
                                <input name="computer_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->computer_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="admission_form_fee"><?php echo $this->lang->line('admission_form_fee');?> :</td>
                            <td>
                                <input name="admission_form_fee" style="width: 50%;" <?php if(isset($record)){ echo 'value="'.$record->admission_form_fee.'"'; } ?> class="span6" id="admission_form_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="batch_fee"><?php echo $this->lang->line('batch_fee');?> :</td>
                            <td>
                                <input name="batch_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->batch_fee.'"'; } ?> id="batch_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="name_plate_fee"><?php echo $this->lang->line('name_plate_fee');?> :</td>
                            <td>
                                <input name="name_plate_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->name_plate_fee.'"'; } ?> id="name_plate_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="mark_sheet_fee"><?php echo $this->lang->line('mark_sheet_fee');?> :</td>
                            <td>
                                <input name="mark_sheet_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->mark_sheet_fee.'"'; } ?> id="mark_sheet_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="transportation_fee"><?php echo $this->lang->line('transportation_fee');?> :</td>
                            <td>
                                <input name="transportation_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->transportation_fee.'"'; } ?> id="transportation_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="medical_fee"><?php echo $this->lang->line('medical_fee');?> :</td>
                            <td>
                                <input name="medical_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->medical_fee.'"'; } ?> id="medical_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="kallnayan_fund"><?php echo $this->lang->line('kallnayan_fund');?> :</td>
                            <td>
                                <input name="kallnayan_fund" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->kallnayan_fund.'"'; } ?> id="kallnayan_fund" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="electricity_fee"><?php echo $this->lang->line('electricity_fee');?> :</td>
                            <td>
                                <input name="electricity_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->electricity_fee.'"'; } ?> id="electricity_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td id="syllabus_fee"><?php echo $this->lang->line('syllabus_fee');?> :</td>
                            <td>
                                <input name="syllabus_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->syllabus_fee.'"'; } ?> id="syllabus_fee" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('other_fee');?> :</td>
                            <td>
                                <input name="others_fee" style="width: 50%;" class="span6" <?php if(isset($record)){ echo 'value="'.$record->others_fee.'"'; } ?> id="alinfo" type="text">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary">
                                    <?php
                                    if(isset($record)){
                                        echo $this->lang->line('update_package');
                                    }else{
                                        echo $this->lang->line('save_package');
                                    }
                                    ?>
                                </button>
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
        <div class="span12" style="overflow-x:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('sl');?></th>
                        <th><?php echo $this->lang->line('package_name');?></th>
                        <th><?php echo $this->lang->line('tuition_fee');?></th>
                        <th><?php echo $this->lang->line('tiffin_fee');?></th>
<!--                        <th>--><?php //echo $this->lang->line('fine');?><!--</th>-->
                        <th><?php echo $this->lang->line('admission_fee');?></th>
                        <th><?php echo $this->lang->line('development_fee');?></th>
                        <th><?php echo $this->lang->line('session_fee');?></th>
                        <th><?php echo $this->lang->line('lab_fee');?></th>
                        <th><?php echo $this->lang->line('exam_fee');?></th>
                        <th><?php echo $this->lang->line('tesitimonial_fee');?></th>
                        <th><?php echo $this->lang->line('tc_fee');?></th>
                        <th><?php echo $this->lang->line('board_reg');?></th>
                        <th><?php echo $this->lang->line('cultural_fee');?></th>
                        <th><?php echo $this->lang->line('scout_fee');?></th>
                        <th><?php echo $this->lang->line('game_fee');?></th>
                        <th><?php echo $this->lang->line('common_fee');?></th>
                        <th><?php echo $this->lang->line('poor_fund');?></th>
                        <th><?php echo $this->lang->line('magazine_fee');?></th>
                        <th><?php echo $this->lang->line('id_card_fee');?></th>
                        <th><?php echo $this->lang->line('library_fee');?></th>
                        <th><?php echo $this->lang->line('receit_fee');?></th>
                        <th><?php echo $this->lang->line('dev_study_fee');?></th>
                        <th><?php echo $this->lang->line('computer_fee');?></th>
                        <th><?php echo $this->lang->line('admission_form_fee');?></th>
                        <th><?php echo $this->lang->line('batch_fee');?></th>
                        <th><?php echo $this->lang->line('name_plate_fee');?></th>
                        <th><?php echo $this->lang->line('mark_sheet_fee');?></th>
                        <th><?php echo $this->lang->line('transportation_fee');?></th>
                        <th><?php echo $this->lang->line('medical_fee');?></th>
                        <th><?php echo $this->lang->line('kallnayan_fund');?></th>
                        <th><?php echo $this->lang->line('electricity_fee');?></th>
                        <th><?php echo $this->lang->line('syllabus_fee');?></th>
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
<!--                            <td>--><?php //echo $v_reg->fine; ?><!--</td>-->
                            <td><?php echo $v_reg->admission_fee; ?></td>
                            <td><?php echo $v_reg->development_fee; ?></td>
                            <td><?php echo $v_reg->session_fee; ?></td>
                            <td><?php echo $v_reg->lab_fee; ?></td>
                            <td><?php echo $v_reg->exam_fee; ?></td>
                            <td><?php echo $v_reg->tesitimonial_fee; ?></td>
                            <td><?php echo $v_reg->tc_fee; ?></td>
                            <td><?php echo $v_reg->board_reg; ?></td>
                            <td><?php echo $v_reg->cultural_fee; ?></td>
                            <td><?php echo $v_reg->scout_fee; ?></td>
                            <td><?php echo $v_reg->game_fee; ?></td>
                            <td><?php echo $v_reg->common_fee; ?></td>
                            <td><?php echo $v_reg->poor_fund; ?></td>
                            <td><?php echo $v_reg->magazine_fee; ?></td>
                            <td><?php echo $v_reg->id_card_fee; ?></td>
                            <td><?php echo $v_reg->library_fee; ?></td>
                            <td><?php echo $v_reg->receit_fee; ?></td>
                            <td><?php echo $v_reg->dev_study_fee; ?></td>
                            <td><?php echo $v_reg->computer_fee; ?></td>
                            <td><?php echo $v_reg->admission_form_fee; ?></td>
                            <td><?php echo $v_reg->batch_fee; ?></td>
                            <td><?php echo $v_reg->name_plate_fee; ?></td>
                            <td><?php echo $v_reg->mark_sheet_fee; ?></td>
                            <td><?php echo $v_reg->transportation_fee; ?></td>
                            <td><?php echo $v_reg->medical_fee; ?></td>
                            <td><?php echo $v_reg->kallnayan_fund; ?></td>
                            <td><?php echo $v_reg->electricity_fee; ?></td>
                            <td><?php echo $v_reg->syllabus_fee; ?></td>
                            <td><?php echo $v_reg->others_fee; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>invoice_panel/invoice_package_delete/<?php echo $v_reg->id; ?>" onclick="return check_delete();" class="btn btn-danger" style="margin-bottom: 5px;"><i class="icon-remove icon-white"></i> <?php echo $this->lang->line('delete');?></a>
                                <a href="<?php echo base_url(); ?>invoice_panel/invoice_package_edit/<?php echo $v_reg->id; ?>"  class="btn btn-primary" style="margin-bottom: 5px;"><i class="icon-edit icon-white"></i> <?php echo $this->lang->line('edit');?></a>
                                <?php if($v_reg->p_type==0){  ?>
                                    <a href="<?php echo base_url(); ?>invoice_panel/invoice_package_active/<?php echo $v_reg->id; ?>/1" onclick="return alert('Are You Sure Active This Package');" class="btn btn-warning"><i class="icon-refresh icon-white"></i> <?php echo $this->lang->line('active');?></a>
                                <?php }else{ ?>
                                    <a href="<?php echo base_url(); ?>invoice_panel/invoice_package_active/<?php echo $v_reg->id; ?>/0" onclick="return alert('Are You Sure Inactive This Package');" class="btn btn-info"><i class="icon-edit icon-white"></i> <?php echo $this->lang->line('inactive');?></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>