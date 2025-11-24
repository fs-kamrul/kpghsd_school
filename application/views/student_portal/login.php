<!DOCTYPE html>
<html lang="en">

<head>

    <title><?php echo $this->lang->line($title);?></title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <form method="post" action="<?php echo base_url(); ?>student_login/chech_login">
                        <div class="card-body">
                            <img src="<?php echo kamrul_site_info('logo'); ?>" alt="" class="img-fluid mb-4">
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i data-feather="mail"></i></span>
                                <input type="text" name="student_id" class="form-control" placeholder="<?php echo $this->lang->line('student_id');?>">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i data-feather="lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="<?php echo $this->lang->line('password');?>">
                            </div>
    <!--                        <div class="form-group text-left mt-2">-->
    <!--                            <div class="form-check">-->
    <!--                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>-->
    <!--                                <label class="form-check-label" for="flexCheckChecked">-->
    <!--                                    Save credentials-->
    <!--                                </label>-->
    <!--                            </div>-->
    <!--                        </div>-->
                            <button class="btn btn-block btn-primary mb-4"><?php echo $this->lang->line('login');?></button>
    <!--                        <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?php echo base_url(); ?>student_portal/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url(); ?>student_portal/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>student_portal/assets/js/plugins/feather.min.js"></script>
<script src="<?php echo base_url(); ?>student_portal/assets/js/pcoded.min.js"></script>



</body>

</html>

