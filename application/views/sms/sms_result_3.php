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
<script src="<?php echo base_url(); ?>vendors/jquery.table2excel.js"></script>
<script src="<?php echo base_url(); ?>vendors/tableToExcel.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>
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
<?php
$stu = array();
$k = 1;
$vl = 0;
?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
<!--        <div class="muted pull-left"><a href="#" id="btnExport"  onclick="tableToExcel('table', 'W3C Example Table')" class="btn btn-danger btnExport">expot</a></div>-->
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <table class="table table-striped" id="table"  cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <!--<th><?php //echo $this->lang->line('student_name');?></th>-->
<!--                        <th>--><?php //echo $this->lang->line('mobile_number');?><!--</th>-->
                        <td>Mobile</td>
                        <td>Student_Name</td>
                        <td>Student_ID</td>
                        <td>Class</td>
                        <td>Group</td>
                        <td>GPA</td>
                    </tr>
                </thead>
                <tbody>
<?php foreach ($all_sms as $value) { ?>
                        <tr>
                            <!--<td><?php //echo $value->name; ?></td>-->
                            <td><?php
                            if ($number==0) {
//                                        echo $value->mobile_number;
                                        echo formatPhoneNumber($value->mobile_number);
                                    }  else {
                                        echo $value->stu_phone; 
                                    }
                            
                            ?></td>

                            <?php if($typ==3){ ?>
                                <td><?php echo $value->name; ?></td>
                                <td><?php echo $value->id; ?></td>
                                <td><?php echo $value->class; ?></td>
                                <td><?php echo $value->group_r; ?></td>
                                <td><?php echo $value->cgpa; ?></td>
<!--                                <td>-->
<!--                                    Dear guardian, --><?php //echo $value->name; ?><!--, --><?php //echo $this->lang->line('class');?><!--: --><?php //echo $value->class; ?><!--, --><?php //echo $this->lang->line('group'); ?><!--: --><?php //echo $value->group_r; ?><!--, ID: --><?php //echo $value->id; ?><!-- get Result CGPA: --><?php //echo $value->cgpa . ' ' . $academy_info->s_name; ?>
<!--                                </td>-->
                            <?php } ?>

                        </tr>
<?php } ?>
                </tbody>
            </table>
            <p></p>
<!--            <button type="button" id="btn" class="btn btn-primary"> XLS</button>-->
        </div>
    </div>
</div>
<script>
    document.getElementById('class').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('section').value = '<?php echo $all_class->data_a; ?>';
    document.getElementById('year').value = '<?php echo $all_class->data_a; ?>';
</script>
<script type="text/javascript">
$("#table").table2excel({
    exclude: ".excludeThisClass",
    name: "Worksheet Name",
    filename: "Cpscn_sms_result.xls",
    fileext: ".xls"
});

$(document).ready(function() {
    $("#btnExport").click(function(e) {
        //getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('dvData');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = 'exported_table_' + postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
    });
});
</script>
