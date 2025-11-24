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
<script>
    //<!--
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
});
</script>

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>url_panel/url_group_save_1" method="post" class="form-horizontal">
                <table class="table" >
                    <thead>
                        <tr>
                            <td colspan="2"><input type="checkbox" id="select_all" name="url_insert" class="uniform_on"><?php echo $this->lang->line('sl');?></td>
                            <td><?php echo $this->lang->line('url_active');?></td>
                            <td><?php echo $this->lang->line('title');?></td>
                            <td><?php echo $this->lang->line('url_name');?></td>
                            <td><?php echo $this->lang->line('url_type');?></td>
                            <td><?php echo $this->lang->line('insert');?></td>
                            <td><?php echo $this->lang->line('edit');?></td>
                            <td><?php echo $this->lang->line('delete');?></td>
                            <!--<td><?php echo $this->lang->line('action');?></td>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl=0; foreach ($url_menu_name as $key => $value) { $sl++ ?>
                        <tr class="">
                            <td colspan="2"><input type="checkbox" class="checkbox"name="url_data[<?php echo $sl;?>]">
                                <?php echo $sl;?></td>
                            <td><?php echo $value->url_active;?></td>
                            <td><?php echo $value->url_title;?>
                                <input type="hidden"name="url_id<?php echo $sl;?>"value="<?php echo $value->url_id;?>">
                            </td>
                            <td><?php echo $value->url_name;?>
                            <td><?php echo $value->url_type;?></td>
                            <td>
                                <input type="checkbox"name="url_insert<?php echo $sl;?>"checked="" value="1">
                            </td>
                            <td>
                                <input type="checkbox"name="url_edit<?php echo $sl;?>"checked="" value="1">
                            </td>
                            <td>
                                <input type="checkbox"name="url_delete<?php echo $sl;?>"checked="" value="1">
                            </td>
                            <!--<td>
                                <p>
                                    <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                    <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>primary
                                    <a href="<?php // echo base_url(); ?>url_panel/url_update/<?php // echo $value->url_authentication_id; ?>"><button class="btn btn-inverse"><i class="icon-pencil icon-white"></i> Update</button></a>
                                    <button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button>
                                    <a href="<?php // echo base_url(); ?>url_panel/url_delete/<?php // echo $value->url_authentication_id; ?>" onclick="return check_delete();"><span class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</span></a>

                                </p>
                            </td>-->
                        </tr>
                            <?php
                            $url_menu_name_sub = $this->menu_model->select_all_url_sub_url($value->url_active);
                            foreach ($url_menu_name_sub as $key12 => $value12 ){
                                $sl++
                            ?>
                                <tr class="">
                                    <td></td>
                                    <td><input type="checkbox" class="checkbox"name="url_data[<?php echo $sl;?>]">
                                    <?php echo $sl;?></td>
                                    <td><?php echo $value12->url_active;?></td>
                                    <td><?php echo $value12->url_title;?>
                                        <input type="hidden"name="url_id<?php echo $sl;?>"value="<?php echo $value12->url_id;?>">
                                    </td>
                                    <td><?php echo $value12->url_name;?>
                                    <td><?php echo $value12->url_type;?></td>
                                    <td>
                                        <input type="checkbox"name="url_insert<?php echo $sl;?>"checked="" value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox"name="url_edit<?php echo $sl;?>"checked="" value="1">
                                    </td>
                                    <td>
                                        <input type="checkbox"name="url_delete<?php echo $sl;?>"checked="" value="1">
                                    </td>
                                    <!--<td>
                                        <p>
                                            <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                            <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>primary
                                            <a href="<?php // echo base_url(); ?>url_panel/url_update/<?php // echo $value12->url_authentication_id; ?>"><button class="btn btn-inverse"><i class="icon-pencil icon-white"></i> Update</button></a>
                                            <button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button>
                                            <a href="<?php // echo base_url(); ?>url_panel/url_delete/<?php // echo $value12->url_authentication_id; ?>" onclick="return check_delete();"><span class="btn btn-danger"><i class="icon-remove icon-white"></i> Delete</span></a>

                                        </p>
                                    </td>-->
                            </tr>
                        <?php } }?>
                        <tr>
                            <td></td>
                            <td><select  name="url_group_name" id="select01" class="">
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
                            </td>
                            <td><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save');?></button></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
</div>
