<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title." || Tarash Mohila Degree College, Tarash, Sirajganj"; ?></title>
        <meta charset="utf-8">
        <meta name = "format-detection" content = "telephone=no">
        <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/x-icon">

        <link href='//fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/camera.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/boxstyle.css">

        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/lightbox.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/style_group.css"/> 

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">

        <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
        <script src="<?php echo base_url(); ?>js/jquery-migrate-1.1.1.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
        <script src="<?php echo base_url(); ?>js/superfish.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.mobilemenu.js"></script>
        <script src="<?php echo base_url(); ?>js/camera.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.ui.totop.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/lightbox.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/notice.js"></script>
        <script src="<?php echo base_url(); ?>js/script.js"></script>
        <script>
            $(document).ready(function() {
                $('#slider').camera({
                    height: '35.75%',
                    loader: true,
                    minHeight: '200px',
                    navigation: false,
                    navigationHover: false,
                    pagination: true,
                    playPause: false,
                    thumbnails: false,
                    fx: 'simpleFade'
                });
            });
        </script>
        <script src="<?php echo base_url(); ?>js/jquery.mobile.customized.min.js"></script>
        <!-- google map -->
        <script src="http://maps.googleapis.com/maps/api/js"></script>

        <script>
            function initialize() {
                var mapProp = {
                    center: new google.maps.LatLng(23.7230556, 90.4086111),
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


    </head>
    <body>
        <!--======================== header ============================-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <!--======================== logo ============================-->
                        <div class="wrapper">
                                    <a href=""><img src="images/hebanner1.png" alt="logo"/></a>
                        </div>


                        <!--======================== menu ============================-->
                        <nav>
                            <ul class="sf-menu clearfix">

                                <li <?php if($title=="Home"){ ?> class="current" <?php } ?>>
                                    <span></span>
                                    <a href="<?php echo base_url(); ?>">Home</a>
                                </li>

                                <li>
                                    <span></span>
                                    <a href="index-1.html">About Us</a>
                                    <ul>
                                        <li><a href="#">College Details</a></li>
                                        <li><a href="#">PRINCIPAL'S MESSAGE</a></li>
                                        <li><a href="#">VICE PRINCIPAL'S MESSAGE</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span></span>
                                    <a href="index-2.html">Academic</a>
                                    <ul>
                                        <li><a href="#">Teachers/Staff Information</a></li>
                                        <li><a href="#">Student Information</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span></span>
                                    <a href="index-2.html">Department</a>
                                    <ul>
                                        <li><a href="#">Accounting</a></li>
                                        <li><a href="#">Bangla</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">History</a></li>
                                        <li><a href="#">Physics</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span></span>
                                    <a href="index-4.html">Photo Gallery</a>
                                </li>
                                <li <?php if($title=="Notice"){ ?> class="current" <?php } ?>>
                                    <span></span>
                                    <a href="<?php echo base_url(); ?>notice.html"><?php echo $this->lang->line('notice');?></a>
                                </li>
                                <li>
                                    <span></span>
                                    <a href="index-4.html">Contacts</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <?php if($slider==1){ ?>
                <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="grid_12">
                            <!--=================== slider ==================-->
                            <div class="camera_wrap" id="slider">
                                <div data-src="<?php echo base_url(); ?>images/slide1.jpg" data-thumb="<?php echo base_url(); ?>images/slide1.jpg">
                                    <div class="camera_caption1">
                                        <div class="caption_content">
                                            <h3>
                                                Offering compounded and hard-to-find medications
                                            </h3>
                                            <h4>
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunю
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div data-src="<?php echo base_url(); ?>images/slide2.jpg" data-thumb="<?php echo base_url(); ?>images/slide2.jpg">
                                    <div class="camera_caption2">
                                        <div class="caption_content">
                                            <h3>
                                                Feel the excellence in the pharmaceutical industry 
                                            </h3>
                                            <h4>
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunю
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div data-src="<?php echo base_url(); ?>images/slide3.jpg" data-thumb="<?php echo base_url(); ?>images/slide3.jpg">
                                    <div class="camera_caption3">
                                        <div class="caption_content">
                                            <h3>
                                                Receive easy solutions to complex problems
                                            </h3>
                                            <h4>
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunю
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid_12">
                            <div class="row">
                                <div class="grid_2">
                                    <div class="news_l">
                                        <span class="fa-home" style="margin-right: 5px"></span> LATEST NEWS 
                                    </div>
                                </div>
                                <div class="grid_10">
                                    <div class="news_title">
                                        <marquee behavior="scroll" align="middle" direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">
                                            <a href="#">Receive easy solutions to complex problems</a>
                                        </marquee>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </header>
        <!--======================== content ===========================-->
        <div id="content">
            <div class="container">


                <div class="row">
                    <div class="grid_9">
                        <?php echo $maincontain; ?>
                    </div>
                    <div class="grid_3">
                        <div class="banner_box">
                            <div class="notice_title"><span class="notice_icon"><span class="notice_icon_load"></span></span>
                                <?php echo $this->lang->line('notice_board');?></div>
                            <div class="notice_s scroller">
                                <div class="notice_box">
                                    <code></code>
                                    <h6><a href="">Step Stipned Jan-June 2015 List</a></h6><br>
                                    <p>2015-03-22</p>
                                    <span><a href="">Click</a></span>
                                </div>
                                <div class="notice_box">
                                    <code></code>
                                    <h6><a href="">Step Stipned Jan-June 2015 List</a></h6><br>
                                    <p>2015-03-22</p>
                                    <span><a href="">Click</a></span>
                                </div>
                                <div class="notice_box">
                                    <code></code>
                                    <h6><a href="">Step Stipned Jan-June 2015 List</a></h6><br>
                                    <p>2015-03-22</p>
                                    <span><a href="">Click</a></span>
                                </div>
                                <div class="notice_box">
                                    <code></code>
                                    <h6><a href="">Step Stipned Jan-June 2015 List</a></h6><br>
                                    <p>2015-03-22</p>
                                    <span><a href="">Click</a></span>
                                </div>

                            </div>
                        </div>
                        <div class="banner_box">
                            <div class="notice_down"><span class="down_icon"></span>FORM DOWNLOAD</div> 
                            <div class="notice_d">
                                <ul>
                                    <li><a href="#" target="black"><span class="fa-download" style="margin-right: 5px"></span>Ministry of Education</a></li>
                                    <li><a href="#" target="black"><span class="fa-download" style="margin-right: 5px"></span>Ministry of Education</a></li>
                                    <li><a href="#" target="black"><span class="fa-download" style="margin-right: 5px"></span>Ministry of Education</a></li>
                                    <li><a href="#" target="black"><span class="fa-download" style="margin-right: 5px"></span>Ministry of Education</a></li>

                                </ul>									
                            </div> 
                        </div>
                        <div class="banner_box"><!-- IMPORTANT Link Start-->        
                            <div class="notice_title"><span class="imp_icon"></span>IMPORTANT LINK</div>        
                            <div class="notice_s">
                                <ul>
                                    <li><a href="http://www.dhakaeducationboard.gov.bd/" target="black"><span class="fa-link" style="margin-right: 5px"></span>Dhaka Board</a></li>
                                    <li><a href="http://www.nu.edu.bd/" target="black"><span class="fa-link" style="margin-right: 5px"></span>National University</a></li>
                                    <li><a href="#" target="black"><span class="fa-link" style="margin-right: 5px"></span>Ministry of Education</a></li>
                                    <li><a href="#" target="black"><span class="fa-link" style="margin-right: 5px"></span>Directorate Of Secondary and Higher Education</a> </li>
                                    <li><a href="#" target="black"><span class="fa-link" style="margin-right: 5px"></span>Directorate Of Primary Education</a> </li>
                                    <li><a href="http://www.bteb.gov.bd" target="black"><span class="fa-link" style="margin-right: 5px"></span>Technical Education Board</a></li>
                                </ul>     
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid_12">
                        <div class="notice_title"><span class="fa-picture-o"></span><span style="margin-left: 4px;">PHOTO GALLERY</span></div> 
                        <div class="photo_s photoslide">
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/page1_img1.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/page1_img1.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/page1_img1.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/page1_img1.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/page1_img2.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/page1_img2.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo_box">
                                <img src="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" alt="photo gallary" class="g_photo" />
                                <div class="lightbox">
                                    <div class="overleey"></div>
                                    <a class="example-image-link" href="<?php echo base_url(); ?>images/SI-0001welcome_msg_img.jpg" data-lightbox="example-set" ><i class="fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="grid_12">
                        <div class="row">
                            <div class="grid_6">
                                <div class="notice_title"><span class="fa-map-marker"></span><span style="margin-left: 4px;">FIND US WITH GOOGLE MAP</span></div> 
                                <div style="margin: 5px;background-color: #F3F3F3;text-align: center;padding: 5px">
                                    <div id="googleMap" style="width:100%;height:200px;"></div>
                                </div>
                            </div>
                            <div class="grid_6">
                                <div class="notice_title"><span class="fa-map-marker"></span><span style="margin-left: 4px;">CONTACT US</span></div> 
                                <div style="margin: 5px;background-color: #F3F3F3;text-align: center;padding: 5px">
                                    <h3>
                                        Tarash Mohila Degree College, Tarash, Sirajganj
                                    </h3>
                                    <p>
                                        Mirpur Road, P.O.: New Market, Dhanmondi, Dhaka-1205<br/>
                                        Email: info@dhakacollege.edu.bd , Web: www.dhakacollege.edu.bd/
                                    <h6 style="margin-top: -5px "><san class="fa-phone" style="color: #64ad33;"> </san>+8801712345678<h6>
                                            </p>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>



                                            </div>
                                            </div>
                                            <!--======================== footer ============================-->
                                            <footer>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="grid_12">
                                                            <div class="copyright">Tarash Mohila Degree College &copy; 2015 | Design & Developed by :<a href="https://www.facebook.com/ft.koushik" target="black">Synat</a></div>
                                                            <div class="footer-link"><!--{%FOOTER_LINK} --></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </footer>


                                            </body>

                                            </html>