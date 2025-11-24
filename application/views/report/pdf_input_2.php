<div id="book" class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>

    <div class="block-content collapse in">
        <div class="span12">

            <form action="<?php echo base_url(); ?>pdf_panel/id_card_back_border_show" method="post" class="form-horizontal">

                <!-- ========== USER TYPE SELECTION ========== -->
                <div class="control-group">
                    <label class="control-label">User Type:</label>
                    <div class="controls">
                        <label class="radio inline" style="margin-right: 10px">
                            <input type="radio" name="user_type" value="student" checked
                                   onclick="toggleUserType('student');"> Student
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="user_type" value="teacher"
                                   onclick="toggleUserType('teacher');"> Teacher
                        </label>
                    </div>
                </div>

                <!-- ========== YEAR ========== -->
                <div class="control-group">
                    <label class="control-label"><?php echo $this->lang->line('year');?>:</label>
                    <div class="controls">
                        <select name="year" id="year" class="input-medium">
                            <?php foreach ($option as $v_option):
                                if ($v_option->opt_a == 'year'):
                                    $ye = $v_option->data_a;
                                    $y = $year ?: date('Y');
                                    $selected = ($y == $ye) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $ye; ?>" <?php echo $selected; ?>><?php echo $ye; ?></option>
                                <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- ========== CLASS ========== -->
                <div class="control-group">
                    <label class="control-label"><?php echo $this->lang->line('class');?>:</label>
                    <div class="controls">
                        <select name="class" id="class_id" class="input-medium">
                            <?php foreach ($option as $v_option):
                                if ($v_option->opt_a == 'class'): ?>
                                    <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- ========== SECTION ========== -->
                <div class="control-group">
                    <label class="control-label"><?php echo $this->lang->line('section');?>:</label>
                    <div class="controls">
                        <select name="section" id="section" class="input-medium">
                            <?php foreach ($option as $v_option):
                                if ($v_option->opt_a == 'section'): ?>
                                    <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- ========== GROUP ========== -->
                <div class="control-group">
                    <label class="control-label"><?php echo $this->lang->line('group');?>:</label>
                    <div class="controls">
                        <select name="group_r" id="group_r" class="input-medium">
                            <?php foreach ($option as $v_option):
                                if ($v_option->opt_a == 'group'): ?>
                                    <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- ========== OPTION SET ========== -->
                <div class="control-group">
                    <label class="control-label">Option Set:</label>
                    <div class="controls">
                        <label class="radio inline" style="margin-right: 10px">
                            <input type="radio" onclick="toggleDesignSet('dvNormal','dvRfid');"
                                   name="option_set" value="1" checked> Normal Design
                        </label>
                        <label class="radio inline">
                            <input type="radio" onclick="toggleDesignSet('dvRfid','dvNormal');"
                                   name="option_set" value="2"> RFID Design
                        </label>
                    </div>
                </div>

                <!-- ========== STUDENT DESIGN SELECTIONS ========== -->
                <div id="dvNormal" class="control-group">
                    <label class="control-label">Design Name:</label>
                    <div class="controls">
                        <?php for ($i=1; $i<=2; $i++): ?>
                            <label class="radio inline" style="margin-right: 10px">
                                <input type="radio" name="design" value="<?php echo $i; ?>" <?php echo $i==8 ? 'checked' : ''; ?>>
                                Design <?php echo $i; ?>
                            </label>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- ========== RFID DESIGN SELECTION ========== -->
                <div id="dvRfid" class="control-group" style="display:none;">
                    <label class="control-label">RFID Design Name:</label>
                    <div class="controls">
                        <?php for ($i=1; $i<=2; $i++): ?>
                            <label class="radio inline" style="margin-right: 10px">
                                <input type="radio" name="design" value="<?php echo $i; ?>" <?php echo $i==8 ? 'checked' : ''; ?>>
                                Design <?php echo $i; ?>
                            </label>
                        <?php endfor; ?>
                        <!--                        <label class="radio inline" style="margin-right: 10px">-->
                        <!--                            <input type="radio" name="design" value="7"> Design 7-->
                        <!--                        </label>-->
                        <!--                        <label class="radio inline">-->
                        <!--                            <input type="radio" name="design" value="6"> Design 6-->
                        <!--                        </label>-->
                    </div>
                </div>

                <!-- ========== SUBMIT BUTTON ========== -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button>
                </div>

            </form>

        </div>
    </div>
</div>