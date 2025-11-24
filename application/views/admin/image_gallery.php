<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Gallery</div>
        <div class="pull-right"><span class="badge badge-info"><?php echo $config['total_rows']= $this->db->count_all('image_gallery'); ?></span>
        </div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
			<?php
			$i=0;
            foreach ($view_img as $v_img) {
			if($i==0){         ?>
        <div class="row-fluid padd-bottom">
            <?php } ?>
                <div class="span3">
                    <a href="<?php echo base_url(); ?>gallery/detail_image/<?php echo $v_img->img_id; ?>" class="thumbnail">
                        <img data-src="<?php echo base_url(); ?>holder.js/260x180" alt="260x180/<?php echo $v_img->image_name; ?>" style="width: 260px; height: 180px;" src="<?php echo base_url().$v_img->photo; ?>">
                    </a>
                </div>
				<?php 
			if($i==3){	?>
        </div>
		<?php } 
		$i++;
		if($i==4){
		$i=0;
		} } ?>
        </div>
    </div>
</div>