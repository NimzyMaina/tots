<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cuddly Tots | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
       <link href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url("public/css/AdminLTE.min.css"); ?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url("public/plugins/iCheck/square/blue.css"); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?=base_url()?>"><b>Cuddly Tots</b> Login</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if ( null != $this->session->flashdata('message')){?>
        <div id="infoMessage" class="alert alert-success"><?php echo $this->session->flashdata('message');?></div>
      <?php } ?>
          <?php if ( null != $this->session->flashdata('error')){?>
              <div id="infoMessage" class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
          <?php } ?>
        <?php echo form_open(base_url('login'));?>
          <div class="form-group has-feedback">
          <?php echo form_input($email);?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>
          <div class="form-group has-feedback">
          <?php echo form_input($password);?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="text-danger"><?php echo form_error('password'); ?></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
            <?php $att = 'class="btn btn-primary btn-block btn-flat"';
            echo form_submit('submit', 'Sign In',$att);?>
            </div><!-- /.col -->
          </div>
        <?php echo form_close();?>

        <a href="<?=base_url('reset')?>">I forgot my password</a><br>
<!--        <a href="--><?//=base_url('register')?><!--" class="text-center">Register a new membership</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('public/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('public/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>