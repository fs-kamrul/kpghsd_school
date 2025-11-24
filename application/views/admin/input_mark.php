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
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><?php echo $this->lang->line('subject_mark');?></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form action="<?php echo base_url(); ?>mark_panel/save_mark" enctype="multipart/form-data" method="post" class="form-horizontal">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Subject: <?php echo $sub_one_assigned->sub_name; ?>
                                    <input type="hidden" name="sub_id" value="<?php echo $sub_one_assigned->sub_id; ?>">
                                </th>                            
                                <th><?php echo $this->lang->line('year');?>: <?php echo $sub_one_assigned->year; ?></th>
                                <th><?php echo $this->lang->line('class');?>: <?php echo $sub_one_assigned->class; ?></th>
                                <th><?php echo $this->lang->line('section'); ?>: <?php echo $sub_one_assigned->section; ?></th>
                                <th><?php echo $this->lang->line('group');?>: <?php echo $sub_one_assigned->group_r; ?></th>
                                <th><?php echo $this->lang->line('term');?>: <?php echo $term; ?></th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('roll');?></th>
                                <th>
                                    <?php echo $mark_title->mark_title ?>(<span id="totalm"><?php echo $mark_title->mark_number; ?></span>)
                                    <input type="hidden" name="add_mark_id" value="<?php echo $mark_title->add_mark_id ?>">
                                    <!--href="<?php echo base_url(); ?>mark_panel/add_mark_csv"--> 
                                    <a data-toggle="modal" data-target="#myModal" class="label label-info">EXCEL Input</a>
                                    <a data-toggle="modal" href="<?php echo base_url(); ?>images/mark_demo.xlsx" class="label label-warning">EXCEL Download</a>
                                </th>
                                <th><?php echo $this->lang->line('student_name');?></th>
                                <th><?php echo $this->lang->line('id');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            foreach ($all_reg as $v_reg) {
                                if ($v_reg->add_f == '2' || $v_reg->add_f == '1') {
                                    ?>
                                    <tr>
                                        <td><span id="roll_<?php echo $v_reg->roll; ?>"><?php echo $v_reg->roll; ?></span></td>
                                        <td>
                                            <input type="text" class="span4" onkeyup="checkmark('mark<?php echo $v_reg->roll; ?>')" id="mark<?php echo $v_reg->roll; ?>" name="mark<?php echo $i; ?>" value="<?php echo $v_reg->mark; ?>">
                                            <input type="hidden" name="all_reg_id<?php echo $i; ?>" value="<?php echo $v_reg->all_reg_id; ?>">
                                        </td>
                                        <td><?php echo $v_reg->name; ?></td>
                                        <td><?php echo $v_reg->id; ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>

                            <tr>
                                <td> <a href="<?php echo base_url(); ?>mark_panel/mark_show" class="btn btn-warning">return</a></td>
                                <td>
                                    <button class="btn btn-primary"><i class="icon-refresh icon-white"></i> Update</button>
                                </td>
                                <td><input type="hidden" name="other" value="<?php echo $i; ?>"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">EXCEL</h4>
            </div>
            <div class="modal-body">
                <p>EXCEL File Upload.</p>
                <div class="uploader" id="uniform-fileInput">
                    <input name="files[]" class="input-file uniform_on" id="upload" type="file">
                    <span class="filename" style="user-select: none;">No file selected</span>
                    <span class="action" style="user-select: none;">Choose File</span>
                </div>
                <button type="button" class="btn btn-success" data-dismiss="modal">Upload</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script src="<?php echo base_url(); ?>js/excel/jszip.js"></script>
<script src="<?php echo base_url(); ?>js/excel/xlsx.js"></script>
<script>
    var ExcelToJSON = function () {

        this.parseExcel = function (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function (sheetName) {
                    // Here is your object
                    var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    var json_object = JSON.stringify(XL_row_object);
//                    console.log(JSON.parse(json_object));
                    console.log("kamrul");
                    //jQuery( '#xlx_json' ).val( json_object );
                    var array_data = JSON.parse(json_object);
                    array_data.forEach(function(object ) {
                        console.log(object.number);
                    try{
                        var roll_data =  document.getElementById("roll_"+object.roll).innerHTML;
                    }catch (exception) {
                        var roll_data =  "0";
                    }

                        if(roll_data == object.roll){
                            document.getElementById("mark"+object.roll).value = object.number;
                            checkmark("mark"+object.roll);
                        }
                    });
                })
            };

            reader.onerror = function (ex) {
                console.log(ex);
            };

            reader.readAsBinaryString(file);
        };
    };


    function handleFileSelect(evt) {

        var files = evt.target.files; // FileList object
        var xl2json = new ExcelToJSON();
        xl2json.parseExcel(files[0]);
    }
    document.getElementById('upload').addEventListener('change', handleFileSelect, false);
</script>
<script>
    function checkmark(id) {
        var x = document.getElementById(id).value;
        var total = document.getElementById("totalm").innerHTML;
        var c = parseFloat(total);
        if (c < x) {
            document.getElementById(id).value = 0;//total=
        } else if (c >= x) {
            document.getElementById(id).value = x;
        } else {
            document.getElementById(id).value = 0;
        }
//        if(typeof total === 'string'){
//            document.getElementById(id).value=1333;
//        }

        //x = 50;
    }
</script>
