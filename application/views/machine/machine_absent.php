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
<?php
$stu = array();
//$stu=0;
//$stu[]['day']= " ";
$k = 1;
$vl = 0; //$stu_p['a']=0;$stu_p['p']=0;
if ($months) {
    foreach ($months as $key => $value) {
        $stu["$value->id"]["id"] = $value->id;
        $stu["$value->id"]["roll"] = $value->roll;
        $stu["$value->id"]["name"] = $value->name;
        $stu["$value->id"]["photo"] = $value->photo;
        $stu["$value->id"]["phn"] = $value->mobile_number;
        $stu["$value->id"]["date"] = $value->inout_datetime;
    }
//    echo '<pre>';
//    print_r($stu);
////    print_r($stu_p);
//    exit();
}
?>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <table class="table table-striped" id="table"  cellpadding="0" cellspacing="0" border="0" id="example">
                <thead>
                    <tr>
                        <!--<th><?php echo $this->lang->line('student_name');?></th>-->
                        <th><?php echo $this->lang->line('mobile_number');?></th>
                        <th style="text-align: center">Massage</th>
                    </tr>
                </thead>
                <tbody>
<?php foreach ($stu as $value) { if($value['date'] == ''){ ?>
                        <tr>
                            <!--<td><?php // echo $value['name']; ?></td>-->
                            <td>88<?php echo $value['phn']; ?></td>
                            <td>
                                Dear guardian, <?php echo $value['name']; ?>, <?php echo $this->lang->line('class');?>: <?php echo $class; ?> absent on <?php echo date('d-m-Y',strtotime($form_date)).' '.$academy_info->s_name; ?>.
                            </td>
                        </tr>
<?php } } ?>
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
//    $(document).ready(function() {
//    $("#btn").on('click',function() {
//            $("#table").table2excel({
//                exclude: ".excludeThisClass",
//                name: "Excel Document Name",
//                filename: "myFileName",
//                fileext: ".xls",
//                exclude_img: true,
//                exclude_links: true,
//                exclude_inputs: true
//            });
//        });
//    });
$("#table").table2excel({
    exclude: ".excludeThisClass",
    name: "Worksheet Name",
    filename: "Absent_student_list.xls",
    fileext: ".xls"
});
</script>