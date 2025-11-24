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
<style>
    .prhide {
        display: none;
    }
    .result_0{
        float: left;
        width: 180px;
    }
    @media print {
        .prhide {
            display: block;
        }
    }
</style>
<script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.js"></script>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
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
		</div>
    </div>
</div>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
        <div class="muted pull-right" style="padding-top: .5px;"><button class="btn btn-primary" onclick="printContent('printdiv')"><?php echo $this->lang->line('print');?></button></div>
    </div>
    <div class="block-content collapse in" id="printdiv">
        <style>
            table { border-collapse: collapse; }
            table, th, td { border: 1px solid black; }
            /*tr:nth-child(even) {background-color: #F2F3FF}*/
        </style>
        <link href="<?php echo base_url(); ?>css/tablea.css" rel="stylesheet" type="text/css"/>
        <div class="prhide">
            <h3 style="text-align: center; margin: 0px;font-size: 18px;line-height: 18px;">Collectorate Public School & College, Nilphamari</h3>
            <h2 style="text-align: center;font-size: 15px;">Transfer</h2>
        <h2 style="text-align: center;font-size: 15px;"><?php echo $this->lang->line('year') . ': '.$year.', ' . $this->lang->line('class') . ': '.$class.' ' . $this->lang->line('group') . ': '.$group_r;?></h2>
        </div>
         <!--style="overflow-x:auto;"--> 
        <div class="span12">
            <?php if($class!="Anik"){?>
            <form action="<?php echo base_url(); ?>pdf_panel/testimonial_save.html" method="POST">
                <table class="table">
                    <thead>

                        <tr>
                            <th><?php echo $this->lang->line('id');?></th>
                            <th><?php echo $this->lang->line('name');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('session');?></th>
                            <th>Board Roll</th>
                            <th>Reg No</th>
                            <th><?php echo $this->lang->line('gpa');?></th>
                            <th>Exam Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($main_a as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->id;?></td>
                            <td><?php echo $value->name;?></td>
                            <td><?php echo $value->roll;?></td>
                            <td><?php echo $value->year_g; ?></td>
                            <td><?php echo $value->roll_g;?></td>
                            <td><?php echo $value->reg_no;?></td>
                            <td><?php echo $value->gpa_g;?></td>
                            <td><?php echo $value->month_g;?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
                        <?php } ?>
        </div>
    </div>
</div>

