<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BelajarUjian | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo $base_url;?>css/bootstrap/bootstrap.css?v=<?php echo $version;?>" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link href="<?php echo $base_url;?>css/AdminLTE.min.css?v=<?php echo $version;?>" rel="stylesheet">    
    <!-- iCheck -->
    <link href="<?php echo $base_url;?>css/iCheck/square/blue.css?v=<?php echo $version;?>" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo $base_url;?>"><b>Belajar</b>Ujian</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Masuk ke BelajarUjian</p>
        <form action="../../index2.html" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Ingat Saya
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!--<div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>-->
        <!-- /.social-auth-links -->

        <a href="<?php echo $base_url;?>index.php/main/forgot">Lupa Password</a><br>
        <a href="<?php echo $base_url;?>index.php/main/register" class="text-center">Daftar Baru</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->    
    <script src="<?php echo $base_url; ?>js/jQuery/jQuery-2.1.4.min.js?v=<?php echo $version; ?>"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="<?php echo $base_url; ?>js/bootstrap/bootstrap.min.js?v=<?php echo $version; ?>"></script>    
    <!-- iCheck -->
    <script src="<?php echo $base_url; ?>js/iCheck/icheck.min.js?v=<?php echo $version; ?>"></script>    
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
