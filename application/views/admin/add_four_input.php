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
<script>

    <!--
//Create a boolean variable to check for a valid Internet Explorer instance.
    var xmlhttp = false;
//Check if we are using IE.
    try {
//If the Javascript version is greater than 5.
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
    } catch (e) {
//If not, then use the older active x object.
        try {
//If we are using Internet Explorer.
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
        } catch (E) {
//Else we must be using a non-IE browser.
            xmlhttp = false;
        }
    }
//If we are using a non-IE browser, create a javascript instance of the object.
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
    }
function show_subject(obj)
    {
//        document.getElementById('orderrow' + pid).style.display = "none";
//        var product_id = document.getElementById('product_id' + pid).innerHTML;
//        var product_q = document.getElementById('product_q' + pid).innerHTML;
//        var sell = document.getElementById('sell' + pid).value;
//        var quantity = document.getElementById('quantity' + pid).value;
        var cls_s = document.getElementById('class_id').value;
        var grp = document.getElementById('group_r').value;
        serverPage = "<?php echo base_url(); ?>subject_panel/show_sub/" + cls_s+"/"+grp;
        
//        alert(cls_s);
//        alert(serverPage);
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function()
        {
//            alert(xmlhttp.readyState);
//            alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById(obj).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>
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
    
    $('#select_all1').on('click',function(){
        if(this.checked){
            $('.checkbox1').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox1').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox1').on('click',function(){
        if($('.checkbox1:checked').length == $('.checkbox1').length){
            $('#select_all1').prop('checked1',true);
        }else{
            $('#select_all1').prop('checked1',false);
        }
    });
    
    $('#select_all2').on('click',function(){
        if(this.checked){
            $('.checkbox2').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox2').each(function(){
                this.checked = false;
            });
        }
    });
    $('.checkbox2').on('click',function(){
        if($('.checkbox2:checked').length == $('.checkbox2').length){
            $('#select_all2').prop('checked1',true);
        }else{
            $('#select_all2').prop('checked1',false);
        }
    });
});
</script>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo base_url();?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>add_four_panel/sub_four.html" method="post" class="form-horizontal">
                <samp><b><?php echo $this->lang->line('year');?></b></samp>
                <select  name="year" id="select01" class="" style="width: 100px;">
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
                <select  name="class" onclick="show_subject('subject_show');" id="class_id" style="width: 100px;">
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
                <select  name="section" id="select01" class="" style="width: 50px;">
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
                <select  name="group_r" onclick="show_subject('subject_show');" id="group_r" class="" style="width: 150px;">
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
                <samp><b>Subject :</b></samp>
                <select  name="sub_id" id="subject_show" class="" style="width: 150px;">
                    <?php
                    foreach ($sub as $v_option) {
                            $cll = $v_option->sub_id;
                            if ($sub_id == $cll) {
                                ?>
                                <option value="<?php echo $v_option->sub_id; ?>" selected><?php echo $v_option->sub_name; ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $v_option->sub_id; ?>"><?php echo $v_option->sub_name; ?></option>
                                <?php
                            }
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button><hr>

            </form>
            <form action="<?php echo base_url(); ?>add_four_panel/save_add.html" method="POST">
                                <div class="controls">
                                    <samp><b>Subject :</b></samp>
                <?php echo $sub_name;?>
                                    <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>"> 
                                    <input type="hidden" name="class" value="<?php echo $class; ?>"> 
                                    <input type="hidden" name="year" value="<?php echo $year; ?>"> 
                                    <input type="hidden" name="group_r" value="<?php echo $group_r; ?>"> 
                                    <input type="hidden" name="section" value="<?php echo $section; ?>"> 
                                    
                                </div>
                                <br>

                <table class="table">
                    <thead>

                        <tr>
                            <th style="text-align: center;"><input type="checkbox" id="select_all" class="uniform_on"/>Four Subject</th>
                            <th style="text-align: center;"><input type="checkbox" id="select_all1" class="uniform_on"/>Compulsory Subjects</th>
                            <th style="text-align: center;"><input type="checkbox" id="select_all2" class="uniform_on"/>Not Gradable Subjects</th>
                            <th><?php echo $this->lang->line('id');?></th>
                            <th><?php echo $this->lang->line('roll');?></th>
                            <th><?php echo $this->lang->line('image');?></th>
                            <th><?php echo $this->lang->line('name');?></th>
                            <th><?php echo $this->lang->line('mobile_number');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($all_reg as $v_reg) {
                            ?>
                            <tr>
                                <td style="text-align: center;">
                                    <label class="uniform">
                                        <input class="checkbox" name="four<?php echo $i; ?>" type="checkbox" <?php if ($v_reg->add_f == '1') { ?>checked=""<?php } ?> id="optionsCheckbox" value="1">
                                        <input type="hidden" name="other" value="<?php echo $i; ?>">  
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label class="uniform">
                                        <input class="checkbox1" name="remove<?php echo $i; ?>" type="checkbox" <?php if ($v_reg->add_f == '2') { ?>checked=""<?php } ?> id="optionsCheckbox" value="2">
                                        <input type="hidden" name="all_reg_id<?php echo $i; ?>" value="<?php echo $v_reg->all_reg_id; ?>">  
                                    </label>
                                </td>
                                <td style="text-align: center;">
                                    <label class="uniform">
                                        <input class="checkbox2" name="inactive<?php echo $i; ?>" type="checkbox" <?php if ($v_reg->add_f == '3') { ?>checked=""<?php } ?> id="optionsCheckbox" value="3">
                                    </label>
                                </td>
                                <td><?php echo $v_reg->id; ?></td>
                                <td><?php echo $v_reg->roll; ?></td>
                                <td>
                                    <img height="100" width="120" src="<?php echo $v_reg->photo; ?>" alt="<?php echo $v_reg->name; ?>">
                                </td>
                                <td><?php echo $v_reg->name; ?></td>
                                <td><?php echo $v_reg->mobile_number; ?></td>

                            </tr>

                            <?php $i++;
                        }
                        ?>

                    </tbody>
                </table>


                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit');?></button>
            </form>
        </div>
    </div>
</div>
