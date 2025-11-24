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
        <div class="muted pull-left"><?php echo $this->lang->line('registration_form');?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>super_admin/teacher_reg_update" enctype="multipart/form-data" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('teacher_name');?></label>
                        <div class="controls">
                            <input name="admin_id" value="<?php echo $main_a->admin_id; ?>" type="hidden" class="span6" id="typeahead">
                            <input name="admin_name" value="<?php echo $main_a->admin_name; ?>" type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" required="">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="fileInput"><?php echo $this->lang->line('photo');?></label>
                        <div class="controls">
                            <input name="photo" class="input-file uniform_on" id="fileInput" type="file">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('email_address');?></label>
                        <div class="controls">
                            <input name="admin_email_address" value="<?php echo $main_a->admin_email_address; ?>" type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" required data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Profession</label>
                        <div class="controls">
                            <?php $p = $main_a->profetion; ?>
                            <select  name="profetion" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'profetion') {
                                        if ($p==$v_option->data_a) {
                                        ?>
                                            <option value="<?php echo $v_option->data_a; ?>" selected=""><?php echo $v_option->data_a; ?></option>
                                        <?php
                                        }  else { ?>
                                            <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                        <?php }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('action');?></label>
                        <div class="controls">
                            <?php $ac = $main_a->admin_action; ?>
                            <select  name="admin_action" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'user') {
                                        ?>
                                        <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                        <?php
                                    }if ($ac==$v_option->data_a) {
                                        ?>
                                        <option value="<?php echo $v_option->data_a; ?>" selected=""><?php echo $v_option->data_a; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="control-group">
                        <div class="navbar navbar-inner block-header" style="border: 1px solid #D4D4D4;">
                            <div class="muted pull-left"><?php echo $this->lang->line('basic_information');?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('father_name');?></label>
                        <div class="controls">
                            <input name="father_name" value="<?php echo $main_a->father_name; ?>" type="text" class="span6" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mother_name');?></label>
                        <div class="controls">
                            <input name="mother_name" type="text" value="<?php echo $main_a->mother_name; ?>" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01"><?php echo $this->lang->line('birth_date');?></label>
                        <div class="controls">
                            <input  name="birth_bate" type="text"  value="<?php echo $main_a->birth_bate; ?>" class="input-xlarge datepicker" id="date01" value="<?php echo date("m/d/Y") ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01"><?php echo $this->lang->line('join_date');?></label>
                        <div class="controls">
                            <input name="join_date" type="text" value="<?php echo $main_a->join_date; ?>" class="input-xlarge datepicker" id="date01" value="<?php echo date("m/d/Y") ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('gender');?></label>
                        <div class="controls">
                            <select  name="gender" id="select01">
                                <script type="text/javascript">
                                    printGend('<?php echo $main_a->gender; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('marital_status');?></label>
                        <div class="controls">
                            <select name="marital_status" id="select01">
                                <script type="text/javascript">
                                    printMarital('<?php echo $main_a->marital_status; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('blood_group');?></label>
                        <div class="controls">
                            <select name="blood_group" id="select01">
                                <script type="text/javascript">
                                    printBloodGroup('<?php echo $main_a->blood_group; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('religion');?></label>
                        <div class="controls">
                            <select name="religion" id="select01">
                                <script type="text/javascript">
                                    printreligion('<?php echo $main_a->religion; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('nationality');?></label>
                        <div class="controls">
                            <select name="nationality" id="select01">
                                <option value="">Select....</option>
                                <option selected="" value="<?php echo $main_a->nationality; ?>"><?php echo $main_a->nationality; ?></option>
                                <option value="Bangladeshi">Bangladeshi</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('national_id_number');?></label>
                        <div class="controls">
                            <input name="national_id" type="text" value="<?php echo $main_a->national_id; ?>" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mobile_number');?></label>
                        <div class="controls">
                            <input name="mobile_number" type="text" value="<?php echo $main_a->mobile_number; ?>" class="span6" id="typeahead" required data-provide="typeahead" data-items="4" data-source='["017","018","019"]'>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="navbar navbar-inner block-header" style="border: 1px solid #D4D4D4;" >
                            <div class="muted pull-left"><?php echo $this->lang->line('present_address_information');?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('village');?></label>
                        <div class="controls">
                            <input name="village" type="text"  value="<?php echo $main_a->village; ?>" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('post');?></label>
                        <div class="controls">
                            <input name="post" type="text"  value="<?php echo $main_a->post; ?>" class="span6" id="typeahead">
<!--                            <select name="post" id="select01">-->
<!--                                <option value="">Select....</option>
                                <script>
                                    printCity('<?php //echo $main_a->post; ?>');
                                </script>
                            </select>-->
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('sub_district');?></label>
                        <div class="controls">
                            <input name="sub_district" type="text"  value="<?php echo $main_a->sub_district; ?>" class="span6" id="typeahead">
                            <!--<select name="sub_district" id="select01">
                                <option value="">Select....</option>
                                <script>
                                    printCity('<?php //echo $main_a->sub_district; ?>');
                                </script>
                            </select>-->
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('district_city');?></label>
                        <div class="controls">
                            <select name="district" id="select01">
                                <option value="">Select....</option>
                                <script type="text/javascript">
                                    printCity('<?php echo $main_a->district; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('division_state');?></label>
                        <div class="controls">
                            <select name="division">
                                <?php if ($main_a->division != "") { ?>
                                <option value="<?php echo $main_a->division; ?>" selected=""><?php echo $main_a->division; ?></option>
                                <?php } ?>
                                <option value="">Select division....</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Sylhet">Sylhet</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('country');?></label>
                        <div class="controls">
                            <select name="country" id="select01">
                                <option value="">Select Country....</option>
                                <script type="text/javascript">
                                    printCountry('<?php echo $main_a->country; ?>');
                                </script>
                            </select>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('zip_code');?></label>
                        <div class="controls">
                            <input name="zip_code" type="text" value="<?php echo $main_a->zip_code; ?>" class="span6" id="typeahead" >
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-inverse">Update</button>
                        <button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>