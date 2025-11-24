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
            <form action="<?php echo base_url(); ?>super_admin/save_teacher_reg.html" enctype="multipart/form-data" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('teacher_name');?></label>
                        <div class="controls">
                            <input name="admin_name" type="text" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" required="">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="fileInput"><?php echo $this->lang->line('photo');?></label>
                        <div class="controls">
                            <input name="photo" class="input-file uniform_on" id="fileInput" type="file">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="admin_email_address"><?php echo $this->lang->line('email_address');?> / Index No</label>
                        <div class="controls">
                            <input name="admin_email_address" type="text" class="span6" id="admin_email_address"  data-provide="admin_email_address" data-items="4" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="index_no">Index No</label>
                        <div class="controls">
                            <input name="index_no" type="text" class="span6" id="index_no"  data-provide="index_no" data-items="4" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Profession</label>
                        <div class="controls">
                            <select  name="profetion" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'profetion') {
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
                        <label class="control-label" for="department">Department</label>
                        <div class="controls">
                            <select  name="department" id="department" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'department') {
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
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('action');?></label>
                        <div class="controls">
                            <select  name="admin_action" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'user') {
                                        ?>
                                        <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
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
                            <input name="father_name" type="text" class="span6" id="typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mother_name');?></label>
                        <div class="controls">
                            <input name="mother_name" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01"><?php echo $this->lang->line('birth_date');?></label>
                        <div class="controls">
                            <input  name="birth_bate" type="text" class="input-xlarge datepicker" id="date01" value="<?php echo date("m/d/Y") ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01"><?php echo $this->lang->line('join_date');?></label>
                        <div class="controls">
                            <input name="join_date" type="text" class="input-xlarge datepicker" id="date01" value="<?php echo date("m/d/Y") ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('gender');?></label>
                        <div class="controls">
                            <select  name="gender" id="select01">
                                <script type="text/javascript">
                                    printGender();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('marital_status');?></label>
                        <div class="controls">
                            <select name="marital_status" id="select01">
                                <script type="text/javascript">
                                    printMaritalOption();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('blood_group');?></label>
                        <div class="controls">
                            <select name="blood_group" id="select01">
                                <script type="text/javascript">
                                    printBloodGroupOption();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('religion');?></label>
                        <div class="controls">
                            <select name="religion" id="select01">
                                <script type="text/javascript">
                                    printreligionOptions();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('nationality');?></label>
                        <div class="controls">
                            <select name="nationality" id="select01">
                                <option selected="">Bangladeshi</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('national_id_number');?></label>
                        <div class="controls">
                            <input name="national_id" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mobile_number');?></label>
                        <div class="controls">
                            <input name="mobile_number" type="text" class="span6" id="typeahead" required data-provide="typeahead" data-items="4" data-source='["017","018","019"]'>
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
                            <input name="village" type="text" class="span6" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('post');?></label>
                        <div class="controls">
                            <input name="post" type="text" class="span6" id="typeahead">
<!--                            <select name="post" id="select01">-->
<!--                                <option value="">Select....</option>-->
<!--                                <script type="text/javascript">-->
<!--                                    printCityOptions();-->
<!--                                </script>-->
<!--                            </select>-->
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('sub_district');?></label>
                        <div class="controls">
                            <input name="sub_district" type="text" class="span6" id="typeahead">
<!--                            <select name="sub_district" id="select01" >-->
<!--                                <option value="">Select....</option>-->
<!--                                <script type="text/javascript">-->
<!--                                    printCityOptions();-->
<!--                                </script>-->
<!--                            </select>-->
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('district_city');?></label>
                        <div class="controls">
                            <select name="district" id="select01">
                                <option value="">Select....</option>
                                <script type="text/javascript">
                                    printCity("Gaibandha");
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('division_state');?></label>
                        <div class="controls">
                            <select name="division" id="select01">
                                <option value="">Select division....</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur" selected>Rangpur</option>
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
                                    printCountry("BD");
                                </script>
                            </select>
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('zip_code');?></label>
                        <div class="controls">
                            <input name="zip_code" type="text" class="span6" id="typeahead" >
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