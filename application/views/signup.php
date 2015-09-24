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
                            <a href="<?php echo $base_url; ?>index.php/main/signup">Free Trial</a>
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
                <h1 style="color:#fff;text-align: center;">Daftar BelajarUjian</h1>
                <div class="row">
                    <div class="well bs-component col-lg-8 col-lg-offset-2">
                        <form class="form-horizontal" action="<?php echo $base_url ?>index.php/main/join_belajar_ujian" method="POST">
                            <input type="hidden" name="paket_id" value="<?php echo $paket_id; ?>">
                            <fieldset>
                                <legend style="text-align:center;">Anda akan memulai dengan akun free trial</legend>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputNama">Nama <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input name="nama" type="text" maxlength="100" placeholder="Nama" id="inputNama" class="form-control" required data-validation-required-message="Masukkan Nama Anda">                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input name="email" type="email" maxlength="100" placeholder="Email" id="inputEmail" class="form-control" required data-validation-required-message="Masukkan Email Anda">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputPassword">Password <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input name="password" type="password" maxlength="100" placeholder="Password" id="inputPassword" class="form-control" required>                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputHP">Nomor HP <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input name="hape" type="text" maxlength="100" placeholder="Nomor HP" id="inputHape" class="form-control" required>                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputPerusahaan">Perusahaan</label>
                                    <div class="col-lg-10">
                                        <input name="perusahaan" type="text" maxlength="100" placeholder="Perusahaan" id="inputPerusahaan" class="form-control" >                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputCaptcha">Captcha</label>
                                    <div class="col-lg-10">
                                        <div class="g-recaptcha" data-sitekey="6LfosgsTAAAAANRF6GbfCFT1bQv6rR3GuwmYu1jT"></div>
                                        <?php if ($captcha_error) { ?>
                                            <div class="text-danger">Pengenalan captcha gagal</div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">                      
                                        <button class="btn btn-primary" type="submit">Join BelajarUjian</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <div class="btn btn-primary btn-xs" id="source-button" style="display: none;">&lt; &gt;</div></div>
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
        <script>
            
            $(document).ready(function () {
                $("#inputHape").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                        // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: Ctrl+C
                        (e.keyCode == 67 && e.ctrlKey === true) ||
                        // Allow: Ctrl+X
                        (e.keyCode == 88 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                            // let it happen, don't do anything
                            return;
                        }
                        // Ensure that it is a number and stop the keypress
                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                            e.preventDefault();
                        }
                });
            });
        </script>

    </body>

</html>
