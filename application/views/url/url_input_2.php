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
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>url_panel/url_view" method="post" class="form-horizontal">
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td><?php echo $this->lang->line('url_group');?> :</td>
                            <td>
                                <select  name="url_group_name" id="select01" class="">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'user') {
                                        $dat = $v_option->data_a;
                                        if($group_name==$dat){
                                            ?>
                                            <option value="<?php echo $v_option->data_a; ?>" selected=""><?php echo $v_option->data_a; ?></option>
                                            <?php
                                        }  else { ?>
                                           <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                            <?php  }
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('search');?></button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
                <table class="table" >
                    <thead>
                        <tr>
                            <td><?php echo $this->lang->line('sl');?></td>
                            <td><?php echo $this->lang->line('title');?></td>
                            <td><?php echo $this->lang->line('url_name');?></td>
                            <td><?php echo $this->lang->line('url_type');?></td>
                            <td><?php echo $this->lang->line('insert');?></td>
                            <td><?php echo $this->lang->line('edit');?></td>
                            <td><?php echo $this->lang->line('delete');?></td>
                            <td><?php echo $this->lang->line('action');?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sl=1; foreach ($url_menu_name as $key => $value) { ?>
                        <form action="<?php echo base_url(); ?>url_panel/url_update" method="post" class="form-horizontal">
                        <tr class="">
                            <td><?php echo $sl++;?></td>
                            <td><?php echo $value->url_title;?>
                                <input type="hidden"name="url_authentication_id"value="<?php echo $value->url_authentication_id;?>"></td>
                                <input type="hidden"name="url_group"value="<?php echo $group_name;?>"></td>
                            <td><?php echo $value->url_name;?></td>
                            <td><?php echo $value->url_type;?></td>
                            <td>
                                <?php if($value->url_insert==1){?>
                                <input type="checkbox"name="url_insert"checked="" value="1">
                                <?php }  else { ?>
                                           <input type="checkbox"name="url_insert" value="1">                                 
                                <?php }?>
                            </td>
                            <td>
                                <?php if($value->url_edit==1){?>
                                <input type="checkbox"name="url_edit"checked="" value="1">
                                <?php }  else { ?>
                                           <input type="checkbox"name="url_edit" value="1">                                 
                                <?php }?>
                            </td>
                            <td>
                                <?php if($value->url_delete==1){?>
                                <input type="checkbox"name="url_delete"checked="" value="1">
                                <?php }  else { ?>
                                <input type="checkbox"name="url_delete"  value="1">                                 
                                <?php }?>
                            </td>
                            <td>
                                <p>
                                    <!--<button class="btn"><i class="icon-eye-open"></i> <?php echo $this->lang->line('view');?></button>
                                    <a href="#" onclick="return check_delete();"><button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button></a>primary
                                    <a href="<?php // echo base_url(); ?>url_panel/url_update/<?php // echo $value->url_authentication_id; ?>"><button class="btn btn-inverse"><i class="icon-pencil icon-white"></i> Update</button></a>-->
                                    <button class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button>
                                    <a href="<?php echo base_url(); ?>url_panel/url_delete/<?php echo $value->url_authentication_id; ?>" onclick="return check_delete();"><span class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></span></a>

                                </p>
                            </td>
                        </tr>
                        </form>
                        <?php }?>
                    </tbody>
                </table>

        </div>
    </div>
</div>
