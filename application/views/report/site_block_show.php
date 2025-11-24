<?php 
$user_power = $this->session->userdata('user_power');
$menu_ber = $this->menu_model->select_all_menu_by_id($user_power);
?>
<div class="row-fluid">	
    <div class="box span12">
        <div class="box-content row-fluid">
            <?php  $coun=0;
            foreach ($menu_ber as $key => $value) {
            if($value->url_type==$site_block){
                $coun++;
                if($coun<=6){
            ?>
                <a class="quick-button span2" href="<?php echo base_url().$value->url_name; ?>">
                    <i class="<?php echo $value->url_icon; ?> logoicon"></i>
                    <p><?php echo $value->url_title; ?></p>
                    <!--<span class="notification blue"> </span>-->
                </a>
            <?php if($coun==6){
                echo '</div><div class="row-fluid" style="margin-top: 15px;">';
            } }elseif($coun<=6){ ?>
                <a class="quick-button span2" href="<?php echo base_url().$value->url_name; ?>">
                    <i class="<?php echo $value->url_icon; ?> logoicon"></i>
                    <p><?php echo $value->url_title; ?></p>
                    <!--<span class="notification blue"> </span>-->
                </a>
            <?php }else {  ?>
                <?php if($coun==13){
                echo '</div><div class="row-fluid" style="margin-top: 15px;">';
            }?>
                <a class="quick-button span2" href="<?php echo base_url().$value->url_name; ?>">
                    <i class="<?php echo $value->url_icon; ?> logoicon"></i>
                    <p><?php echo $value->url_title; ?></p>
                    <!--<span class="notification blue"> </span>-->
                </a>
<?php } } } ?>
        </div>
        <div>
            <?php // if ($site_block == "attendant") { ?>
<!--               -- <a class="quick-button span2" href="<?php // echo base_url() . "attendant_panel/attendant_assigned.html"; ?>">
                    <i class="fa fa-hand-scissors-o fa-4x"></i>
                    <p>Attendant Assigned</p>
                    <span class="notification blue"><?php // echo $this->db->count_all('tbl_attendant_assigned'); ?></span>
                </a>   
                <a class="quick-button span2" href="<?php // echo base_url() . "attendant_panel/attendant_input.html"; ?>">
                    <i class="fa fa-renren fa-4x"></i>
                    <p>Attendant Input</p>
                    <span class="notification blue"><?php // echo $this->db->count_all('tbl_attendant'); ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "attendant_panel/report_month"; ?>">
                    <i class="fa fa-refresh fa-spin fa-4x fa-fw"></i>
                    <p>Monthly Report</p>
                </a>-->
            <?php // } elseif ($site_block == "pdf") { ?>
<!--                <a class="quick-button span2" href="<?php // echo base_url() . "pdf_panel/id_card"; ?>">
                   - <i class="fa fa-image fa-4x"></i>
                    <p>ID Card Fond</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>            
                <a class="quick-button span2" href="<?php // echo base_url() . "pdf_panel/id_card_back"; ?>">
                    <i class="fa fa-info fa-4x"></i>
                    <p>ID Card Back</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>            
                <a class="quick-button span2" href="<?php // echo base_url() . "pdf_panel/id_card_back_border"; ?>">
                    <i class="fa fa-ils fa-4x"></i>
                    <p>ID Card Back Without Border</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>           
                <a class="quick-button span2" href="<?php // echo base_url() . "pdf_panel/site_list"; ?>">
                    <i class="fa fa-gears fa-4x"></i>
                    <p>Site List</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>          
                <a class="quick-button span2" href="<?php // echo base_url() . "pdf_panel/result"; ?>">
                    <i class="fa fa-magic fa-4x"></i>
                    <p>Result Transcript</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "pdf_panel/baton_report"; ?>">
                    <i class="fa fa-circle-o-notch fa-spin fa-4x fa-fw"></i>
                    <p>Monthly Report</p>
                    <span class="notification green">765<?php // echo $num_results;   ?></span>
                </a>-->
            <?php // } ?>
            <?php // if ($site_block == "url") { ?>
<!--                <a class="quick-button span2" href="<?php // echo base_url() . "url_panel/url_in"; ?>">
                    <i class="fa fa-user-md fa-4x"></i>
                    <p>Url Input</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "url_panel/url_group"; ?>">
                    <i class="fa fa-user-secret fa-4x"></i>
                    <p>Url Group Input</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "url_panel/url_view"; ?>">
                    <i class="fa fa-vimeo fa-4x"></i>
                    <p>Url <?php echo $this->lang->line('view');?></p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>-->
            <?php // } ?>
            <?php // if ($site_block == "registration") { ?>
<!--                <a class="quick-button span2" href="<?php // echo base_url() . "student_info/student_reg.html"; ?>">
                    <i class="fa fa-user fa-4x"></i>
                    <p>Student Registration</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "student_info/student_view.html"; ?>">
                    <i class="fa fa-vimeo fa-4x"></i>
                    <p>Student <?php echo $this->lang->line('view');?></p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "subject_panel/update_reg_info.html"; ?>">
                    <i class="fa fa-random fa-4x"></i>
                    <p>Update Student Registration</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "super_admin/teacher_reg.html"; ?>">
                    <i class="fa fa-user-times fa-4x"></i>
                    <p>Teacher Registration</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>
                <a class="quick-button span2" href="<?php // echo base_url() . "super_admin/view_teacher.html"; ?>">
                    <i class="fa fa-vimeo fa-4x"></i>
                    <p>Teacher <?php echo $this->lang->line('view');?></p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>-->
            <?php // } ?>
<!--        </div>
        <div class="row-fluid" style="margin-top: 15px;">-->
            <?php // if ($site_block == "pdf") { ?>
<!--                <a class="quick-button span2" href="<?php echo base_url() . "pdf_panel/transfer"; ?>">
                    <i class="fa fa-jpy fa-4x"></i>
                    <p>TRANSFER CERTIFICATE</p>
                    <span class="notification blue">085<?php // echo $this->db->count_all('tbl_user');   ?></span>
                </a>-->
            <?php // } ?>
        </div>
    </div><!--/span-->

</div><!--/row-->