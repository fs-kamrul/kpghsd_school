<!DOCTYPE html>
<html class="no-js">

    <head>
        <title><?php echo $this->lang->line($title);?></title>
        <!-- Bootstrap -->
        <meta name="viewport" content="width=1024">
        <meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
        <meta name="description" content="School Management System Development by Apphostbd. AppHost BD Build Technology To Improve The Quality Of User Experience. We are software development company.">
        <meta name="keywords" content="School,Apphostbd,Apphost,PHP,HTML,CSS,XML,JavaScript,Kamrul,Kamrul Islam,School Management System,API">
        <meta name="author" content="Kamrul Islam">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--        <link rel="shortcut icon" href="--><?php //echo base_url(); ?><!--images/logod.png" type="image/x-icon">-->
        <link rel="shortcut icon" href="<?php echo kamrul_site_info('favicon'); ?>" type="image/x-icon">

        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>assets/styles.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>css/style_group.css" rel="stylesheet" media="screen">
        <!--<link href="<?php // echo base_url(); ?>css/font-awesome.css" rel="stylesheet" media="screen">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/country.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/student_info_option.js"></script>
        <?php if (!empty($styles)): ?>
            <?php foreach ($styles as $css): ?>
                <link rel="stylesheet" href="<?= $css ?>">
            <?php endforeach; ?>
        <?php endif; ?>
    </head>

    <body>
        <script type="text/javascript">
            function check_delete()
            {
                var chk = confirm("AreYou Sure To Delete This Recored");
                if (chk) {
                    return  true;
                } else {
                    return false;
                }
            }
        </script>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo base_url(); ?>super_admin">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <?php
                                $admin_id = $this->session->userdata('user_id');
                                $this->db->select('admin_name,photo');
                                $this->db->from('tbl_admin');
                                $this->db->where('admin_id', $admin_id);
                                $query_result = $this->db->get();
                                $name = $query_result->row();
                                //return $result;
                                ?>
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php $ph=$name->photo; if ($ph) { ?>
                                                                        
                                                                  
                                    <img style="height: 18px;" src="<?php if($name->photo!=""){ echo base_url() . $name->photo; } ?>">
                                    <?php  }else{ ?>
                                    <i class="icon-user"></i>
                                        <?php  } ?>
                                        <?php echo $name->admin_name; ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url();?>profile_panel/user_admin.html">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(); ?>super_admin/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>super_admin"><?php echo $this->lang->line('dashboard');?></a>
                            </li>

<!--                            <li class="dropdown">-->
<!--                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>-->
<!---->
<!--                                </a>-->
<!--                                <ul class="dropdown-menu">-->
<!--                                    <li>-->
<!--                                        <a tabindex="-1" href="#">Blog</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a tabindex="-1" href="#">News</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a tabindex="-1" href="#">Custom Pages</a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a tabindex="-1" href="#">Calendar</a>-->
<!--                                    </li>-->
<!--                                    <li class="divider"></li>-->
<!--                                    <li>-->
<!--                                        <a tabindex="-1" href="#">FAQ</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url();?>profile_panel/user_admin.html">Profile</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url();?>setting_panel/setting.html">Setting</a>
                                    </li>
                                </ul>
                                
                            </li>
                            <li>
								<a tabindex="-1" href="<?php echo base_url(); ?>super_admin/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <?php
            $user_power = $this->session->userdata('user_power');
            //echo $user_power;
            $menu_ber = $this->menu_model->select_all_menu_by_id($user_power);
//            echo '<pre>';
//            print_r($menu_ber);
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <?php
                        foreach ($menu_ber as $key => $value) {
                            if($value->url_type=='main_url'){
                            ?>
                            <li <?php if($show==$value->url_active){ ?>class="active" <?php } ?>>
                                <a href="<?php echo base_url().$value->url_name; ?>"><i class="icon-chevron-right"></i> <?php echo $value->url_title;?></a>
                            </li>
                            <?php } } ?>
<!--                        <li <?php // if($show==1){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>super_admin"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li <?php // if($show==2){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>student_info/registration.html"><i class="icon-chevron-right"></i>Registration</a>
                        </li>
                         <li <?php // if($show==3){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>subject_panel/subject.html"><span class="badge badge-success pull-right"><?php // echo $config['total_rows'] = $this->db->count_all('tbl_subject_info'); ?></span> Subject Input</a>
                        </li>
                        <li <?php // if($show==4){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>subject_panel/subject_assigned.html"><i class="icon-chevron-right"></i>Subject Assigned</a>
                        </li>
                        <li <?php // if($show==5){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>add_four_panel/search_subject.html"><i class="icon-chevron-right"></i>Select Remove And Four Subject</a>
                        </li>
                        <li <?php // if($show==6){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>result_show/result.html"><i class="icon-chevron-right"></i>Class Result</a>
                        </li>
                        <li <?php // if($show==7){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>super_admin/class_reg.html"><i class="icon-chevron-right"></i> Class Promoted</a>
                        </li>
                        <li <?php // if($show==8){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>attendant_panel/attendant.html"><span class="badge badge-info pull-right">1,234</span> Attendant</a>
                        </li>
                        <li <?php // if($show==9){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>pdf_panel/pdf_show.html"><span class="badge badge-info pull-right">12</span> PDF Report</a>
                        </li>
                        <li <?php // if($show==10){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>url_panel/url.html"><span class="badge badge-info pull-right">12</span> URL</a>
                        </li>
                        <li <?php // if($show==11){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>baton_panel/baton.html"><span class="badge date pull-right">12</span> Baton</a>
                        </li>
                        <li <?php // if($show==12){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>super_admin/option.html"><span class="badge badge-success pull-right">731</span>Option Input</a>
                        </li>
                        <li  <?php // if($show==13){ ?>class="active" <?php // } ?>>
                            <a href="<?php // echo base_url(); ?>super_admin/view_option.html"><span class="badge badge-success pull-right"><?php // echo $config['total_rows'] = $this->db->count_all('option_a'); ?></span>View Option</a>
                        </li>
                        <li <?php // if($show==14){ ?>class="active" <?php // } ?>>
                            <a href="<?php echo base_url(); ?>gallery/input_img.html"><span class="badge badge-info pull-right"><?php // echo $config['total_rows'] = $this->db->count_all('image_gallery'); ?></span> Input Gallery</a>
                        </li>
                        <li <?php // if($show==15){ ?>class="active" <?php // } ?>>
                            <a href="<?php echo base_url(); ?>gallery/view.html"><span class="badge badge-info pull-right"><?php // echo $config['total_rows'] = $this->db->count_all('image_gallery'); ?></span> View Gallery</a>
                        </li>-->
                    </ul>
                </div>

                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">

                        <div class="navbar">
                            <div class="navbar-inner">
                                <ul class="breadcrumb">
                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                                    <li>
                                        <a href="<?php echo base_url();?>super_admin"><?php echo $this->lang->line('dashboard');?></a> <span class="divider">/</span>
                                    </li>
                                    <li class="active"><?php echo $this->lang->line($title);?></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <?php echo $maincontain; ?>


                </div>
            </div>
            <hr>
            <footer>
<!--                2016-->
                <p> Copyright &copy; Kamrul Islam Anik 2020</p>
<!--                <p>Copyright &copy; TRINAMUL SARBIK GRAM UNNAYAN IT 2020.</p>-->
            </footer>
        </div>
        <!--/.fluid-container-->
        <link href="<?php echo base_url(); ?>vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url(); ?>vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="<?php echo base_url(); ?>vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>vendors/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url(); ?>vendors/chosen.jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>vendors/bootstrap-datepicker.js"></script>

        <script src="<?php echo base_url(); ?>vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="<?php echo base_url(); ?>vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="<?php echo base_url(); ?>vendors/wizard/jquery.bootstrap.wizard.min.js"></script>


        <script src="<?php echo base_url(); ?>assets/scripts.js"></script>
        <?php if (!empty($scripts)): ?>
            <?php foreach ($scripts as $js): ?>
                <script src="<?= $js ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
        <script>

            function checkDesign(design_name,div_a,div_b){
                alert(design_name);
                document.getElementById(div_b).style.display = "none";
            }
            $(function() {
                $('.tooltip').tooltip();
                $('.tooltip-left').tooltip({placement: 'left'});
                $('.tooltip-right').tooltip({placement: 'right'});
                $('.tooltip-top').tooltip({placement: 'top'});
                $('.tooltip-bottom').tooltip({placement: 'bottom'});

                $('.popover-left').popover({placement: 'left', trigger: 'hover'});
                $('.popover-right').popover({placement: 'right', trigger: 'hover'});
                $('.popover-top').popover({placement: 'top', trigger: 'hover'});
                $('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});

                $('.notification').click(function() {
                    var $id = $(this).attr('id');
                    switch ($id) {
                        case 'notification-sticky':
                            $.jGrowl("Stick this!", {sticky: true});
                            break;

                        case 'notification-header':
                            $.jGrowl("A message with a header", {header: 'Important'});
                            break;

                        default:
                            $.jGrowl("Hello world!");
                            break;
                    }
                });
            });
        </script>
        <script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>