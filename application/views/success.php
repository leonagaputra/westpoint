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
                        <li>
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-responsive" width="256px" height="256px" src="<?php echo $base_url ?>img/ok.png" alt="">
                        <div class="intro-text">
                            <!--<span class="name">Belajar Ujian</span>-->
                            <hr class="star-light">
                            <span class="skills"><?php echo $msg; ?></span>
                            <div><a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Log In</a></div>
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
