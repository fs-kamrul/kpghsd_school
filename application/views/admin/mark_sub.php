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
                <form action="<?php echo base_url(); ?>mark_panel/add_mark.html" enctype="multipart/form-data" method="post" class="form-horizontal">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject: <?php echo $sub_one_assigned->sub_name; ?></th>                            
                                <th><?php echo $this->lang->line('year');?>: <?php echo $sub_one_assigned->year; ?> <?php echo $this->lang->line('class');?>: <?php echo $sub_one_assigned->class; ?></th>
                                <!--<th><?php echo $this->lang->line('class');?>: <?php // echo $sub_one_assigned->class; ?></th>-->
                                <th><?php echo $this->lang->line('section'); ?>:<?php echo $sub_one_assigned->section; ?> <?php echo $this->lang->line('group');?>: <?php echo $sub_one_assigned->group_r; ?></th>
                                <!--<th><?php echo $this->lang->line('group');?>: <?php // echo $sub_one_assigned->group_r; ?></th>-->
                                <th><?php echo $this->lang->line('term');?>: <?php echo $term; ?></th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('roll');?></th>
                                <?php
                                $totalmark =0;
                                    foreach ($add_mark_show_r as $v_add_mark_r) {
                                        ?>
                                <th><a href="<?php echo base_url(); ?>mark_panel/add_mark_view/<?php echo $v_add_mark_r->add_mark_id; ?>" class="label label-info"><?php echo $v_add_mark_r->mark_title; ?>(<?php echo $v_add_mark_r->mark_number;$totalmark=$totalmark+$v_add_mark_r->mark_number ?>)</a></th>
                                <?php }  ?>
                                <th><?php echo $this->lang->line('total_mark');?>(<?php echo $sub_one_assigned->sub_mark; ?>)
                                    <input type="hidden" name="sub_mark" value="<?php echo $sub_one_assigned->sub_mark; ?>" id="sub_mark">
                                    <input type="hidden" name="totalmark" value="<?php echo $totalmark; ?>" id="totalmark">
                                    <input <?php if($totalmark<$sub_one_assigned->sub_mark) { ?>type="submit"<?php }else{ ?> type="hidden" <?php } ?> name="mark" value="Add Mark" class="btn btn-success" id="mark"></th>
                                <th><?php echo $this->lang->line('student_name');?></th>
                                <th><?php echo $this->lang->line('id');?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($all_reg as $v_reg) {
                                if($v_reg->add_f=='2' || $v_reg->add_f=='1'){
                                ?>
                                <tr>
                                    <td><?php echo $v_reg->roll; ?></td>
                                    
                                    <?php
                                    $all_reg_id=$v_reg->all_reg_id;
                                    $k=$kempty_data = 0;
                                    $sub_mark_show=$this->sm_model->select_mark_show_one($sub_one_assigned->year,$sub_one_assigned->sub_id,$sub_one_assigned->section,$sub_one_assigned->group_r,$term,$all_reg_id); 
                                    ?>
                                    <?php
                                    foreach ($add_mark_show_r as $key25=>$v_add_mark_r) {
                                        $kempty_data++;
                                        $kempty=0;

//                                        $hide_kempty[$key25]=20;

                                        foreach ($sub_mark_show as $v_sub_mark_show) {
                                        if($v_add_mark_r->add_mark_id==$v_sub_mark_show->add_mark_id){
                                        ?>
                                    <td <?php if($v_sub_mark_show->mark_pf == 'f'){ ?>style="background: red;color: #fff;"<?php }?>><?php
                                        //echo $v_sub_mark_show->mark_id.'-';
                                        echo $v_sub_mark_show->mark;$k=$k+$v_sub_mark_show->mark;$kempty=20; ?></td>
                                    <?php  }} if($kempty==0){

//                                            if($kempty_data == 1){
//                                                $hide_kempty[$key25]=20;
//                                            }else{
//                                                $hide_kempty[$key25]=0;
//                                            }
                                            ?>
                                        <td>+</td>
                                    
                                            
                                    <?php   } }?>
                                    
                                    <td><?php if($k != 0){echo $k;} ?></td>
                                    <td><?php echo $v_reg->name; if($v_reg->add_f=='1'){echo '*';}?></td>
                                    <td><?php echo $v_reg->id; ?></td>
                                </tr>
                            <?php } } ?>


                            <tr>
                                <td></td>
                                <?php
                                    foreach ($add_mark_show_r as $key25=>$v_add_mark_r) {
                                        //if($hide_kempty[$key25]>0){ ?>
                                            <td><a href="<?php echo base_url(); ?>mark_panel/mark_in/<?php echo $v_add_mark_r->add_mark_id; ?>" class="btn btn-success"><?php echo $v_add_mark_r->mark_title; ?>(<?php echo $v_add_mark_r->mark_number; ?>) mark</a></td>
                                        <?php //}else{ ?>
<!--                                            <td><a href="#" class="btn btn-success" disabled >--><?php //echo $v_add_mark_r->mark_title; ?><!--(--><?php //echo $v_add_mark_r->mark_number; ?><!--) mark</a></td>-->
                                        <?php //} ?>

                                <?php }  ?>
                                
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
    <!-- /block -->
</div>
