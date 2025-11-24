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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>attendant_panel/class_att_save.html" method="post" class="form-horizontal">
                <table class="table table-striped"  cellpadding="0" cellspacing="0" border="0" id="example">
                    <thead>
                        <tr>
                            <th style="width: 10px;"><input type="checkbox" class="uniform_on" id="select_all">Check all</th>
                            <!--<th><?php echo $this->lang->line('image');?></th>-->
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('name');?></th>
                            <th><?php echo $this->lang->line('id');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
                        <?php
                        $i = 1;
                        foreach ($all_class as $v_class_reg) {
                            ?>
                            <tr  style="width: 10px;">
                                <td><input type="checkbox" class="checkbox" name="check[<?php echo $i; ?>]"></td>
                       <input type="hidden" name="student_id<?php echo $i; ?>" value="<?php echo $v_class_reg->id; ?>">
<!--                        <td>
                            <img  width="80px" src="<?php // echo $v_class_reg->photo; ?>" alt="<?php // echo $v_class_reg->name; ?>">
                        </td>-->
                        <td><?php echo $v_class_reg->roll; ?></td>
                        <td><?php echo $v_class_reg->name; ?></td>
                        <td><?php echo $v_class_reg->id; ?></td>
                        </tr>
                        <?php $i++;
                    }
                    ?>   <input type="hidden" name="other" value="<?php echo $i - 1; ?>">
                    </tbody>
                </table>
                <samp><b><?php echo $this->lang->line('day');?></b></samp>
                <select  name="day" id="select01" class="" style="width: 150px;">
                    <?php
                    for ($i=0; $i<=31; $i++) {
//                            $d = "";
                            $d = date('d');
                            if ($d == $i) {
                                ?>
                                <option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                            }
                    }
                    ?>
                </select>
                
<?php $month=['January','February','March','April','May','June','July','August','September','October','November','December'];                   // print_r($month);?>
                <samp><b><?php echo $this->lang->line('month');?></b></samp>
                <select  name="month" id="select01" class="" style="width: 150px;">
                    <?php
                    foreach ($month as $key=>$v_option) {
                            $m = date('m');
                            if ($m == $key+1) {
                                ?>
                                <option value="<?php echo $v_option; ?>" selected><?php echo $v_option; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $v_option; ?>"><?php echo $v_option; ?></option>
                                <?php
                            }
                    }
                    ?>
                </select>
                
                <samp><b><?php echo $this->lang->line('year');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 150px;">
                    <?php
                    foreach ($option as $v_option) {
                        $a = $v_option->opt_a;
                        if ($a == 'year') {
                            $ye = $v_option->data_a;
                            $y = "";
                            if ($year == "") {
                                $y = date('Y');
                            } else {
                                $y = date('Y');;
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
                <button type="submit" class="btn btn-primary"> <?php echo $this->lang->line('submit');?></button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('class').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('section').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('year').value = '<?php echo $all_class->data_a; ?>';
</script>