<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Gallery</div>
        <div class="pull-right"><span class="badge badge-info"><?php echo $config['total_rows']= $this->db->count_all('image_gallery'); ?></span>

        </div>
    </div>
    <div class="block-content collapse in">

    <?php
	$ss=$config['total_rows']= $this->db->count_all('image_gallery');

    $a= $view_img->img_id;
	if($ss==$a){
	$b=1;
	}else{
    $b=$a+1;
	}
    ?>
        <div class="row-fluid padd-bottom">
                <div style="text-align: center;">
                    <a href="<?php echo base_url(); ?>gallery/detail_image/<?php echo $b ?>" >
                        <img data-src="holder.js/260x180" alt="260x180/<?php echo $view_img->image_name; ?>" style="width: 700px; height: 860px;" src="<?php echo base_url().$view_img->photo; ?>">
                    </a>
                </div>
        </div>

        
    </div>
</div>