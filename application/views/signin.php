<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BelajarUjian.com</title>

        <?php
            require_once 'frontpage_style.php';
        ?>
    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $base_url; ?>index.php/main/frontpage#page-top">Belajar Ujian</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>index.php/main/frontpage#portfolio">Kelas</a>
                        </li>
                        <li class="page-scroll">
                            <a href="<?php echo $base_url; ?>index.php/main/frontpage#about">Servis</a>
                        </li>
                        <li>
                            <a href="<?php echo $base_url; ?>index.php/main/frontpage#contact">Hubungi Kami</a>
                        </li>
                        <li >
                            <a href="#" data-toggle="modal" data-target="#myModal">Log In</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo $base_url; ?>index.php/main/signup">Daftar Baru</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Modal -->
        <!-- Modal -->
        <?php
            require_once 'frontpage_login.php';
        ?>

        <!-- Header -->
        <header>        
            <div class="container" style="color:#000;text-align: left;">                
                <div class="row">
                    <div class="">
                    <div class="well bs-component">
                        <form class="form-horizontal" action="<?php echo $base_url?>index.php/backend/do_signin" method="POST">
                            <fieldset>  
                                <br/><br/>
                                <?php if(isset($email_success) && $email_success) {?>
                                    <div class="alert alert-dismissible alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Sukses!</strong> Email instruksi untuk penggantian password telah dikirimkan ke email Anda.
                                    </div>
                                <?php } else if (isset($gagal_login) && $gagal_login) {?>
                                    <div class="alert alert-dismissible alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>Error!</strong> Email atau password yang Anda masukkan salah.
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Email </label>
                                    <div class="col-lg-10">
                                        <input name="email" type="email" maxlength="100" placeholder="Email" id="inputEmail" class="form-control" required data-validation-required-message="Masukkan Email Anda">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Password </label>
                                    <div class="col-lg-10">
                                        <input name="password" type="password" maxlength="100" placeholder="Password" id="inputEmail" class="form-control" required data-validation-required-message="Masukkan Password Anda">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">                      
                                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-off"></span> Login</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <div class="btn btn-primary btn-xs" id="source-button" style="display: none;">&lt; &gt;</div>                            
                    </div>
                    </div>
                </div>
            </div>
        </header>    


        <!-- Portfolio Grid Section -->


        <!-- Footer -->
        <?php
            require_once 'frontpage_footer.php';
        ?>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll visible-xs visible-sm">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <?php
            require_once 'frontpage_script.php';
        ?>
    </body>

</html>
