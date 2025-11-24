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
            <form action="<?php echo base_url(); ?>student_info/stu_reg_save_xls" method="post" class="form-horizontal" enctype="multipart/form-data">
                <table class="table" >
                    <tbody>
                        <tr class="">
                            <td></td>
                            <td><?php echo $this->lang->line('input_excel_file');?> :</td>
                            <td>
                                <input name="xls_file" class="input-file uniform_on" id="fileInput" type="file">
                            </td>
                            <td></td>
                        </tr>
                        <tr class="">
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td>
                                <a href="<?php echo base_url();?>images/n_file/STUDENT_DATE.csv"><span type="submit" class="btn btn-info"><?php echo $this->lang->line('demo');?></span></a>
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('save');?></button>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </form>

        </div>
    </div>
</div>
