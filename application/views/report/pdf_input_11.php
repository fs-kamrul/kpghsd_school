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
<?php $month=['January','February','March','April','May','June','July','August','September','October','November','December'];                   // print_r($month);?>
<!--<script src="<?php // echo base_url(); ?>vendors/jquery-1.9.1.js"></script>-->
<script src="<?php echo base_url(); ?>vendors/new_js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>vendors/new_js/jquery-1.12.4.js"></script>
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>-->
<script>
$(document).ready(function(){
  $('.next').click(function(event){
  if($('.table').css('left') != '-1500px') {
  $(this).prop('disabled', true)    
    $('.table').animate({left:'-=50px'}, 500, function() {
          $('.next').prop('disabled', false)    
    });
    $('.table').animate({margin:'0px, -=50px'}, 500, function() {
          $('.next').prop('disabled', false)    
    });
  }
  });

  $('.prev').click(function(event){
  if($('.table').css('left') != '0px') {
  $(this).prop('disabled', true)   
    $('.table').animate({left:'+=50px'}, 500, function() {
          $('.prev').prop('disabled', false)    
    });
    $('.table').animate({margin:'0px, +=50px'}, 500, function() {
          $('.next').prop('disabled', false)    
    });
  }
  });

});
</script>
<script>
//$(document).ready(function () {
//myTable= $('#myTable').dataTable({
//        "bInfo": false,
//        "bLengthChange": false,
//        "bPaginate": false
//});
//});
   
   $(document).ready(function() {
       $('#myTable').dataTable( {
         "scrollX": true
       } );
     } );
   
</script>
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?php echo $this->lang->line($title);?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <input type='button' class="prev" value='prev'>
            <input type='button' class="next" value='next'>
            <table id="myTable" class="table table-striped"  cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <!--<th><?php echo $this->lang->line('sl');?></th>-->
                        <th><?php echo $this->lang->line('action');?></th>
                        <th><?php echo $this->lang->line('class');?></th>
                        <th><?php echo $this->lang->line('section');?></th>
                        <th><?php echo $this->lang->line('group');?></th>
                        <th><?php echo $this->lang->line('year');?></th>
                        <th><?php echo $this->lang->line('subject');?></th>
                        <th><?php echo $this->lang->line('month');?></th>
                        <th><?php echo $this->lang->line('year');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($all_class as $v_class_reg) {
                        ?>
                    <form action="<?php echo base_url(); ?>attendant_panel/report_month_view.html" method="post" class="form-horizontal">
                
                <input type="hidden" name="class" value="<?php echo $v_class_reg->class; ?>"/>
                <input type="hidden" name="section" value="<?php echo $v_class_reg->section; ?>"/>
                <input type="hidden" name="group_r" value="<?php echo $v_class_reg->group_r; ?>"/>
                <!--<input type="hidden" name="year" value="<?php // echo $v_class_reg->year; ?>"/>-->
                <input type="hidden" name="subject_id" value="<?php echo $v_class_reg->sub_id; ?>"/>
                <input type="hidden" name="subject" value="<?php echo $v_class_reg->sub_name; ?>"/>
                        <tr>
                            <td><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('view');?></button></td>
<!--                            <td><?php // echo $i;
                        $i++; ?></td>-->
                            <td><?php echo $v_class_reg->class; ?></td>
                            <td><?php echo $v_class_reg->section; ?></td>
                            <td><?php echo $v_class_reg->group_r; ?></td>
                            <!--<td><?php // echo $v_class_reg->total; ?></td>-->
                            <td><?php echo $v_class_reg->year; ?></td>
                            <td><?php echo $v_class_reg->sub_name; ?></td>
                            <td>
                                <select  name="month" id="select01" class="" style="width: 100px;">
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
                            </td>
                            <td>
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
                            </td>
<!--                            <td><button type="submit" class="btn btn-primary"><?php echo $this->lang->line('view');?></button></td>-->
                        </tr>
                </form>
<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>