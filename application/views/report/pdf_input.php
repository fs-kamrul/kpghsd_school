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
        serverPage = "<?php echo base_url(); ?>subject_panel/show_sub/" + cls_s + "/" + grp;

//        alert(cls_s);
//        alert(serverPage);
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
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
    function show_subject(obj,div_a,div_b){
//        alert(obj);
//        dvRfid
            document.getElementById(div_a).style.display = "table-row";
            document.getElementById(div_b).style.display = "none";
    }
    function hide_subject(obj,div_a,div_b){
        
            document.getElementById(div_a).style.display = "none";
            document.getElementById(div_b).style.display = "table-row";
    }
</script>
<div id="book" class="block" onload="checkDesign('design_name','dvRfid','dvRfidb')">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>pdf_panel/id_card_show" method="post" class="form-horizontal">
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
                            <td><?php echo $this->lang->line('class');?>:</td>
                            <td>
                                <select  name="class" id="class_id" >
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
                            <td></td>
                            <td><?php echo $this->lang->line('section');?></td>
                            <td>
                                <select  name="section" class="">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'section') {
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
                            <td></td>
                            <td><?php echo $this->lang->line('group');?></td>
                            <td>
                                <select name="group_r" id="group_r" class="">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'group') {
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
                            <td></td>
                            <td>Option: </td>
                            <td>
                                <input type="radio" onclick="show_subject(this.value,'dvRfid','dvRfidb');" id="design_name" name="option_set" value="1" checked="" /> Normal Desigm
                                <input type="radio" onclick="hide_subject(this.value,'dvRfid','dvRfidb');" id="design_name" name="option_set" value="2" /> RFID Design
                            </td>
                            <td></td>
                        </tr>
                        <tr id="dvRfid">
                            <td></td>
                            <td>Design: </td>
                            <td>
                                <input type="radio" name="design" value="1" id="design1" /> <label style="display: inline" for="design1">Design 1</label>
                                <input type="radio" name="design" value="2" id="design2" /> <label style="display: inline" for="design2">Design 2</label>
                                <input type="radio" name="design" value="3" id="design3" /> <label style="display: inline" for="design3">Design 3</label>
                                <input type="radio" name="design" value="4" id="design4" /> <label style="display: inline" for="design4">Design 4</label>
                                <input type="radio" name="design" value="5" id="design5" /> <label style="display: inline" for="design5">Design 5</label>
                                <input type="radio" name="design" value="6" id="design6" /> <label style="display: inline" for="design6">Design 6</label>
                                <input type="radio" name="design" value="7" id="design7" /> <label style="display: inline" for="design7">Design 7</label>
                                <input type="radio" name="design" id="design8" value="8"  checked=""  /><label style="display: inline" for="design8">Design 8</label>

                            </td>
                            <td></td>
                        </tr>
                        <tr id="dvRfidb">
                            <td></td>
                            <td>Design: </td>
                            <td>
                                <input type="radio" name="design" value="7" id="design11" /> <label style="display: inline" for="design11">Design 7</label>
                                <input type="radio" name="design" value="6" id="design61" /> <label style="display: inline" for="design61">Design 6</label>
<!--                                <input type="radio" name="design" id="design8" value="8"  checked=""  /><label style="display: inline" for="design8">Design 8</label>-->

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
