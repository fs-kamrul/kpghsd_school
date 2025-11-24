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
<script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#chk').on('click', function() {
            if (this.checked) {
                $("#sh").attr("disabled", true);
                $("#term").attr("disabled", false);
            } else {
                $("#sh").attr("disabled", false);
                $("#term").attr("disabled", true);
            }
        });

        $('#chk_a').on('click', function() {
            if (this.checked) {
                $("#sh").attr("disabled", true);
                $("#term").attr("disabled", false);
            } else {
                $("#sh").attr("disabled", false);
                $("#term").attr("disabled", true);
            }
        });

        $('#chk_two').on('click', function() {
            if ($('#chk_two:checked').length == $('#chk_two').length) {
                $("#sh").attr("disabled", false);
                $("#term").attr("disabled", true);
            } else {
                $("#sh").attr("disabled", true);
                $("#term").attr("disabled", false);
            }
        });
        if ($('#chk_two:checked').length == $('#chk_two').length) {
                $("#term").attr("disabled", true);
            }
    });
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>sms_panel/result_sms_show" method="post" class="form-horizontal">
                <table class="table" >
                    <!--<thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                    </thead>-->
                    <tbody>
                        <tr class="">
                            <td><?php echo $this->lang->line('year');?>:</td>
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
                            <td><?php echo $this->lang->line('class');?>:</td>
                            <td>
                                <select  name="class" id="class_id" >
                                    <option value=""><?php echo $this->lang->line('all_class');?></option>
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
                            <td><?php echo $this->lang->line('term');?>: </td>
                            <td>
                                <select  name="term" id="term" class="" style="width: 110px;">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'term') {
                                            $cl = $v_option->data_a;
//                                            if ($term == $cl) {
                                                ?>
                                                <!--<option value="<?php // echo $v_option->data_a; ?>" selected><?php // echo $v_option->data_a; ?></option>-->
                                                <?php
//                                            } else {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
//                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
<!--                        <tr class="">
                            <td><?php echo $this->lang->line('section');?></td>
                            <td>
                                <select  name="section" class="">
                        <?php
//                                    foreach ($option as $v_option) {
//                                        $a = $v_option->opt_a;
//                                        if ($a == 'section') {
//                                            
                        ?>
                                            <option value="//<?php // echo $v_option->data_a;  ?>"><?php // echo $v_option->data_a;  ?></option>
                                            //<?php
//                                        }
//                                    }
                        ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td><?php echo $this->lang->line('group');?></td>
                            <td>
                                <select name="group_r" id="group_r" class="">
                        <?php
//                                    foreach ($option as $v_option) {
//                                        $a = $v_option->opt_a;
//                                        if ($a == 'group') {
//                                            
                        ?>
                                            <option value="//<?php // echo $v_option->data_a; ?>"><?php // echo $v_option->data_a; ?></option>
                                            //<?php
//                                        }
//                                    }
                        ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>-->
                        <tr class="">
                            <td><?php echo $this->lang->line('number');?>:</td>
                            <td>
                                <input class="radio" type="radio" name="number" value="0" checked=""> Guardian Number 
                                <input class="radio" type="radio" name="number" value="1"> <?php echo $this->lang->line('student_number');?>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td><?php echo $this->lang->line('type');?>:</td>
                            <td>
                                <input class="radio" id="chk" type="radio" name="typ" value="0" checked=""> Only CGPA 
                                <input class="radio" id="chk_a" type="radio" name="typ" value="1"> All Subject GPA 
                                <input class="radio" id="chk_two" type="radio" name="typ" value="2"> Other SMS 
                                <input class="radio" id="chk_three" type="radio" name="typ" value="3"> ElitBuzz
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><?php echo $this->lang->line('sms');?>:</td>
                            <td>
                                <div class="sh">
                                    <textarea id="sh" name="sh_sms" class="span6" disabled="" ></textarea>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit');?></button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
    </div>
</div>
