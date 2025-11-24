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
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = false;
            });
            $("#subject_show").attr("disabled", true);
        }else{
             $('.checkbox').each(function(){
                this.checked = true;
            });
            $("#subject_show").attr("disabled", false);
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',false);
            $("#subject_show").attr("disabled", false);
        }else{
            $('#select_all').prop('checked',true);
            $("#subject_show").attr("disabled", true);
        }
    });
});
</script>
<?php $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];                   // print_r($month);?>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>sms_panel/absent_all_class_report.html" method="post" class="form-horizontal">
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td></td>
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
                            <td></td>
                            <td><?php echo $this->lang->line('month');?>:</td>
                            <td>
                                <select  name="month" id="select01" class="">
                                    <?php
                                    foreach ($month as $key => $v_option) {
                                        $m = date('m');
                                        if ($m == $key + 1) {
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
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('day');?>:</td>
                            <td>
                                <select  name="day" id="select01" class="">
                                    <?php
                                    $d = date('d');
                                    for ($o = 0; $o <= 31; $o++) {
//                                        echo $d;
                                        if ($d == $o) {
                                            ?>
                                            <option value="<?php echo $o; ?>" selected><?php echo $o; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $o; ?>"><?php echo $o; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('class');?>:</td>
                            <td> <input type="checkbox" id="select_all" name="chk" value="1"> One to Ten  
                                <input type="checkbox" class="checkbox" checked="" name="chk11" value="1"> Eleven to Twelve
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('subject');?></td>
                            <td>
                                <select  name="subject_name" id="subject_show" id="subject_name" >
                                    <?php // onclick="show_subject('subject_show');"
                                    foreach ($sub_all as $v_o) { ?>
                                            <option value="<?php echo $v_o->sub_name; ?>"><?php echo $v_o->sub_name; ?></option>
                                            <?php }  ?>
                                </select>
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
    </div>
</div>
