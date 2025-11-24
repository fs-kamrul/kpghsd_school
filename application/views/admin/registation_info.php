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
            <form action="<?php echo base_url(); ?>student_info/reg_save.html" enctype="multipart/form-data" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('id');?></label>
                        <div class="controls">
                            <input name="id" type="text" class="span6" id="typeahead" required >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('full_name');?></label>
                        <div class="controls">
                            <input name="name" type="text" class="span6" id="alinfo" required  >
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('student_number');?></label>
                        <div class="controls">
                            <input name="stu_phone" type="text" class="span6" id="alinfo">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="navbar navbar-inner block-header" style="border: 1px solid #D4D4D4;" >
                            <div class="muted pull-left"><?php echo $this->lang->line('must_be_input');?> ***</div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('roll');?></label>
                        <div class="controls">
                            <input name="roll" type="text" class="span6" id="typeahead" required  data-provide="typeahead" data-items="4" data-source='["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59"]'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('class');?></label>
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
                        <label class="control-label" for="select01"><?php echo $this->lang->line('section');?></label>
                        <div class="controls">
                            <select  name="section" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'section') {
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
                        <label class="control-label" for="select01"><?php echo $this->lang->line('year');?></label>
                        <div class="controls">
                            <select  name="year" id="select01" class="">
                                <?php
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'year') {
                                        $ye = $v_option->data_a;
                                        $y = date('Y');
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
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('group');?></label>
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
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('job_category');?></label>
                        <div class="controls">
                            <input name="job_category" type="text" class="span6" id="typeahead">
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
                            <input  name="birth_bate" type="" class="input-xlarge datepicker" id="date01" value="<?php echo date("m/d/Y") ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01"><?php echo $this->lang->line('join_date');?></label>
                        <div class="controls">
                            <input name="join_date" type="" class="input-xlarge datepicker" id="date01" value="<?php echo date("m/d/Y") ?>">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput"><?php echo $this->lang->line('photo');?></label>
                        <div class="controls">
                            <input name="photo" class="input-file uniform_on" id="fileInput" type="file">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('gender');?></label>
                        <div class="controls">
                            <select  name="gender" id="select01" class="chzn-select">
                                <script type="text/javascript">
                                    printGender();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('marital_status');?></label>
                        <div class="controls">
                            <select name="marital_status" id="select01" class="chzn-select">
                                <script type="text/javascript">
                                    printMarital("Single");
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('blood_group');?></label>
                        <div class="controls">
                            <select name="blood_group" id="select01" class="chzn-select">
                                <option>Select <?php echo $this->lang->line('blood_group');?></option>
                                <script type="text/javascript">
                                    printBloodGroupOption();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('person_type');?></label>
                        <div class="controls">
                            <select name="person_type" id="select01" class="chzn-select">
                                <option selected="">Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('religion');?></label>
                        <div class="controls">
                            <select name="religion" id="select01" class="chzn-select">
                                <script type="text/javascript">
                                    printreligionOptions();
                                </script>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('nationality');?></label>
                        <div class="controls">
                            <select name="nationality" id="select01" class="chzn-select">
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
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('email_address');?></label>
                        <div class="controls">
                            <input name="email" type="email" class="span6" id="typeahead">
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
                            <input name="post" type="text" class="span6" id="alinfo">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('sub_district');?></label>
                        <div class="controls">
                            <input name="sub_district" type="text" class="span6" id="alinfo">
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
                        <a href="#myAlert" data-toggle="modal" class="btn btn-primary"><?php echo $this->lang->line('save');?></a>
                        <button type="reset" class="btn"><?php echo $this->lang->line('cancel');?></button>
                    </div>
                    <div id="myAlert" class="modal hide">
                        <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">&times;</button>
                            <h3>Student Registration</h3>
                        </div>
                        <div class="modal-body">
                            <p>Are you Sure...</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('confirm');?></button>
                            <a data-dismiss="modal" class="btn" href="#"><?php echo $this->lang->line('cancel');?></a>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>