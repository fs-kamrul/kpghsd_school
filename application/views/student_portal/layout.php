<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $this->lang->line($title);?></title>

    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="School Management System Development by Apphostbd. AppHost BD Build Technology To Improve The Quality Of User Experience. We are software development company.">
    <meta name="keywords" content="School,Apphostbd,Apphost,PHP,HTML,CSS,XML,JavaScript,Kamrul,Kamrul Islam,School Management System,API">
    <meta name="author" content="DashboardKit ">


    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo kamrul_site_info('favicon'); ?>" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>student_portal/assets/fonts/feather.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>student_portal/assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>student_portal/assets/fonts/material.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>student_portal/assets/css/style.css" id="main-style-link">
    <link rel="stylesheet" href="<?php echo base_url(); ?>student_portal/assets/css/custom-style.css" id="main-style-link">

</head>

<body class="">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ Mobile header ] start -->
<div class="pc-mob-header pc-header">
    <div class="pcm-logo">
        <img src="<?php echo base_url(); ?>student_portal/assets/images/logo.svg" alt="" class="logo logo-lg">
    </div>
    <div class="pcm-toolbar">
        <a href="#!" class="pc-head-link" id="mobile-collapse">
            <div class="hamburger hamburger--arrowturn">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>
        <a href="#!" class="pc-head-link" id="headerdrp-collapse">
            <i data-feather="align-right"></i>
        </a>
        <a href="#!" class="pc-head-link" id="header-collapse">
            <i data-feather="more-vertical"></i>
        </a>
    </div>
</div>
<!-- [ Mobile header ] End -->

<!-- [ navigation menu ] start -->
<?php include 'navigation.php'; ?>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<?php include 'header.php'; ?>
<!-- [ Header ] end -->
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><?php echo $this->lang->line($title);?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

        <?php echo $maincontain; ?>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?php echo base_url(); ?>student_portal/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?php echo base_url(); ?>student_portal/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?php echo base_url(); ?>student_portal/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?php echo base_url(); ?>student_portal/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?php echo base_url(); ?>student_portal/assets/images/browser/ie.png" alt="">
                    <div>IE (11 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Js -->
<script src="<?php echo base_url(); ?>student_portal/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url(); ?>student_portal/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>student_portal/assets/js/plugins/feather.min.js"></script>
<script src="<?php echo base_url(); ?>student_portal/assets/js/pcoded.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>student_portal/assets/js/plugins/clipboard.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>student_portal/assets/js/uikit.min.js"></script> -->

<!-- Apex Chart -->
<script src="<?php echo base_url(); ?>student_portal/assets/js/plugins/apexcharts.min.js"></script>
<!--<script>-->
<!--    $("body").append('<div class="fixed-button active"><a href="https://gumroad.com/dashboardkit" target="_blank" class="btn btn-md btn-success"><i class="material-icons-two-tone text-white">shopping_cart</i> Upgrade To Pro</a> </div>');-->
<!--</script>-->

<!-- custom-chart js -->
<script src="<?php echo base_url(); ?>student_portal/assets/js/pages/dashboard-sale.js"></script>
</body>

</html>
