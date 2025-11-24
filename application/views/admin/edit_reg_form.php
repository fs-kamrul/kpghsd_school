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
        <div class="muted pull-left"><?php echo $this->lang->line('edit_registration_form');?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <!--<form action="<?php // echo base_url(); ?>student_info/reg_update" enctype="multipart/form-data" method="post" class="form-horizontal">-->
            <form action="<?php echo base_url(); ?>student_info/reg_update" enctype="multipart/form-data" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('id');?></label>
                        <div class="controls">
                            <input name="reg_id" value="<?php echo $reg_info->reg_id; ?>" type="hidden" class="span6" id="typeahead">
                            <input name="id" type="text" class="span6" value="<?php echo $reg_info->id; ?>" id="typeahead" required >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('full_name');?></label>
                        <div class="controls">
                            <input name="name" value="<?php echo $reg_info->name; ?>" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('student_number');?></label>
                        <div class="controls">
                            <input name="stu_phone" value="<?php echo $reg_info->stu_phone; ?>" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="birth_registration_number"><?php echo $this->lang->line('birth_registration_number');?></label>
                        <div class="controls">
                            <input name="birth_registration_number" value="<?php echo $reg_info->birth_registration_number; ?>" type="text" class="span6" id="birth_registration_number">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="previous_school_name"><?php echo $this->lang->line('previous_school_name');?></label>
                        <div class="controls">
                            <input name="previous_school_name" value="<?php echo $reg_info->previous_school_name; ?>" type="text" class="span6" id="previous_school_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="navbar navbar-inner block-header" style="border: 1px solid #D4D4D4;">
                            <div class="muted pull-left"><?php echo $this->lang->line('basic_information');?></div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('father_name');?></label>
                        <div class="controls">
                            <input name="father_name" value="<?php echo $reg_info->father_name; ?>" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="yearly_income"><?php echo $this->lang->line('yearly_income');?></label>
                        <div class="controls">
                            <input name="yearly_income" value="<?php echo $reg_info->yearly_income; ?>" type="text" class="span6" id="yearly_income">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('job_category');?></label>
                        <div class="controls">
                            <input name="job_category" value="<?php echo $reg_info->job_category; ?>" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mother_name');?></label>
                        <div class="controls">
                            <input name="mother_name" value="<?php echo $reg_info->mother_name; ?>" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01"><?php echo $this->lang->line('birth_date');?></label>
                        <div class="controls">
                            <input  name="birth_bate" value="<?php echo $reg_info->birth_bate; ?>" type="" class="input-xlarge datepicker" id="date01">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01"><?php echo $this->lang->line('join_date');?></label>
                        <div class="controls">
                            <input name="join_date" value="<?php echo $reg_info->join_date; ?>" type="" class="input-xlarge datepicker" id="date01">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput"><?php echo $this->lang->line('photo');?></label>
                        <div class="controls">
                            <input name="photo"  class="input-file uniform_on" id="fileInput" type="file">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('gender');?></label>
                        <div class="controls">
                            <select  name="gender" id="select01">
                                <option value="">Select....</option>
                                <script>
                                    printGend('<?php echo $reg_info->gender; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('marital_status');?></label>
                        <div class="controls">
                            <select name="marital_status" id="select01">
                                <option value="">Select....</option>
                                <script>
                                    printMarital('<?php echo $reg_info->marital_status; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('disabled');?></label>
                        <div class="controls">
                            <select name="disabled_o" id="select01">
                                <option value="">Select....</option>
                                <script>
                                    printDisabledSelect('<?php echo $reg_info->disabled_o; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('blood_group');?></label>
                        <div class="controls">
                            <select name="blood_group" id="select01">
                                <option value="">Select....</option>
                                <script>
                                    printBloodGroup('<?php echo $reg_info->blood_group; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('person_type');?></label>
                        <div class="controls">
                            <?php $p = $reg_info->person_type; ?>
                            <select name="person_type" value="" id="select01">
                                <option value="">Student</option>
                                <?php if ($p == "") { ?>
                                    <option value="Student">Student</option>
                                <?php } else { ?>
                                    <option value="Student" selected="">Student</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('religion');?></label>
                        <div class="controls">
                            <select name="religion" id="select01">
                                <option value="">Select....</option>
                                <script>
                                    printreligion('<?php echo $reg_info->religion; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('nationality');?></label>
                        <div class="controls">
                            <select name="nationality" value="" id="select01">
                                <option value="">Select....</option>
                                <option selected="" value="<?php echo $reg_info->nationality; ?>"><?php echo $reg_info->nationality; ?></option>
                                <option value="Bangladeshi">Bangladeshi</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('national_id_number');?></label>
                        <div class="controls">
                            <input name="national_id" value="<?php echo $reg_info->national_id; ?>" type="text" class="span6" id="typeahead"  >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mobile_number');?></label>
                        <div class="controls">
                            <input name="mobile_number" value="<?php echo $reg_info->mobile_number; ?>" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('email_address');?></label>
                        <div class="controls">
                            <input name="email" type="email" value="<?php echo $reg_info->email; ?>" class="span6" id="typeahead" >
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
                            <input name="village" value="<?php echo $reg_info->village; ?>" type="text" class="span6" id="typeahead" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('post');?></label>
                        <div class="controls">
                            <input name="post" type="text" class="span6" id="alinfo" value="<?php echo $reg_info->post; ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('sub_district');?></label>
                        <div class="controls">
                            <input name="sub_district" value="<?php echo $reg_info->sub_district; ?>" type="text" class="span6" id="alinfo">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('district_city');?></label>
                        <div class="controls">
                            <select name="district" id="select01">
                                <option value="">Select....</option>
                                <script>
                                    printCity('<?php echo $reg_info->district; ?>');
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('division_state');?></label>
                        <div class="controls">
                            <select name="division" value="<?php echo $reg_info->division; ?>" id="select01">
                                <?php if ($reg_info->division != "") { ?>
                                <option value="<?php echo $reg_info->division; ?>" selected=""><?php echo $reg_info->division; ?></option>
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
                                <script>
                                    printCountry('<?php echo $reg_info->country; ?>');
                                </script>
                            </select>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('zip_code');?></label>
                        <div class="controls">
                            <input name="zip_code" value="<?php echo $reg_info->zip_code; ?>" type="text" class="span6" id="typeahead" >
                        </div>
                    </div>
                    <div class="form-actions">
                        <div style="margin-top:10px;">
                            <p>
                                <button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button>
                                <button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>
                            </p>										
                        </div>
                        <!--<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
                        <button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>-->
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>