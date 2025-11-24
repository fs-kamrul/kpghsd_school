<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/login_style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Login to Web App</h1>
      <h4 style="color: red;">
          <?php
                $exception=$this->session->userdata('exception');
                if(isset($exception)){
                    echo $exception;
                    $this->session->unset_userdata('exception');
                }
                $erroraaa=$this->session->userdata('erroraaa');
                if(isset($erroraaa)){
                    echo $erroraaa;
                    $this->session->unset_userdata('erroraaa');
                }
          ?>          
      </h4>
      <h4 style="color: green;">
          <?php
                $massage=$this->session->userdata('message');
                if(isset($massage)){
                    echo $massage;
                    $this->session->unset_userdata('message');
                }
          ?>          
      </h4>
      <form method="post" action="<?php echo base_url(); ?>admin_log/chech_login">
        <p><input type="text" name="admin_email_address" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="admin_password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>
  </section>


</body>
</html>
