<?php
$grade = new Grade();
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
<script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
        <?php // if (isset($group_r)) { ?>
           
        <!--<input type="text" name="group_r" value="<?php // echo $group_r;?>">-->
        <!--<input type="text" name="section" value="<?php // echo $section;?>">-->
        <?php // }  else {
//            $group_r="";
//            $section="";
//        }
        ?>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>pdf_panel/testimonial_input.html" method="post" class="form-horizontal">
                <samp><b><?php echo $this->lang->line('year');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 110px;">
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
                <samp><b><?php echo $this->lang->line('class');?></b></samp>
                <select  name="class" id="select01" class="" style="width: 110px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'class') {
                            $cl = $v_option->data_a;
                            if ($class == $cl) {
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

                <samp><b><?php echo $this->lang->line('section');?></b></samp>
                <select  name="section" id="select01" class="" style="width: 110px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'section') {
                            $cl = $v_option->data_a;
                            if ($section == $cl) {
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
                <samp><b><?php echo $this->lang->line('group');?></b></samp>
                <select  name="group_r" id="select01" class="" style="width: 150px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'group') {
                            $cl = $v_option->data_a;
                            if ($group_r == $cl) {
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
				<samp><b>Type</b></samp>
				<input type="radio" name="ak" value="num">view
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>

            </form>
            <?php if($class!="Anik"){?>
            <form action="<?php echo base_url(); ?>pdf_panel/testimonial_save.html" method="POST">
                <table class="table">
                    <thead>

                        <tr>
                            <th><input id="select_all" type="checkbox" class="uniform_on" name="chk_all">Check All</th>
                            <th><?php echo $this->lang->line('id');?></th>
                            <th><?php echo $this->lang->line('name');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th>Date</th>
                            <th><?php echo $this->lang->line('session');?></th>
                            <th>Board Roll</th>
                            <th>Reg No</th>
                            <th><?php echo $this->lang->line('gpa');?></th>
                            <th>Exam Month</th>
                            <!--<th><?php //echo $this->lang->line('year');?></th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $cn=0; foreach ($main_a as $key => $value) { $cn++; ?>
                        <tr>
                            <th><input type="checkbox" class="checkbox" name="chk[<?php echo $cn;?>]"></th>
                            <td><input type="hidden" name="all_reg_id<?php echo $cn;?>" value="<?php echo $value->all_reg_id;?>">
                                <?php echo $value->id;?></td>
                            <td><?php echo $value->name;?></td>
                            <td><?php echo $value->roll;?></td>
                            <td><input type="date" name="date_g<?php echo $cn;?>" value="<?php echo $value->date_g;?>" style="width: 150px;"></td>
                            <td>
                                <input  name="year_g<?php echo $cn;?>" type="text" value="<?php echo $value->year_g;?>" style="width: 150px;">
<!--                                <select  name="year_g--><?php //echo $cn;?><!--" id="select01" class="" style="width: 110px;">-->
<!--                    --><?php
//                    foreach ($option as $v_option) {
//                        $a = $v_option->opt_a;
//                        if ($a == 'year') {
//                            $ye = $v_option->data_a;
//                            $y = "";
//                            if ($year == "") {
//                                if ($value->year_g=="") {
//                                    $year = date('Y');
//                                }  else {
//                                    $year=$value->year_g;
//                                }
//
//                            } else {
//                                if ($value->year_g=="") {
//                                    $year = date('Y');
//                                }  else {
//                                    $year=$value->year_g;
//                                }
//                                $y = $year;
//                            }
//                            if ($y == $ye) {
//                                ?>
<!--                                <option value="--><?php //echo $v_option->data_a; ?><!--" selected>--><?php //echo $v_option->data_a; ?><!--</option>-->
<!--                                --><?php
//                            } else {
//                                ?>
<!--                                <option value="--><?php //echo $v_option->data_a; ?><!--">--><?php //echo $v_option->data_a; ?><!--</option>-->
<!--                                --><?php
//                            }
//                        }
//                    }
//                    ?>
<!--                </select>-->
                            </td>
                            <td><input  name="roll_g<?php echo $cn;?>" type="text" value="<?php echo $value->roll_g;?>" style="width: 150px;">
                            </td>
                            <td><input type="text" name="reg_no<?php echo $cn;?>" value="<?php echo $value->reg_no;?>" style="width: 150px;"></td>
                            <td><input type="text" name="gpa_g<?php echo $cn;?>" value="<?php echo $value->gpa_g;?>" style="width: 100px;"></td>
                            <td><input type="text" name="month_g<?php echo $cn;?>" value="<?php echo $value->month_g;?>" style="width: 100px;"></td>
                            <!--<td><?php // echo $value->year;?></td>-->
                            <td> </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><button type="submit" class="btn btn-primary" style="width: 100px;height: 45px;"><?php echo $this->lang->line('save');?></button></th>
                            <!--<th><?php echo $this->lang->line('year');?></th>-->
                        </tr>
                    </tbody>
                </table>
            </form>
                        <?php } ?>
        </div>
    </div>
</div>

