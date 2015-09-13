<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BelajarUjian.com</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="<?php echo $base_url; ?>css/bootstrap-front/bootstrap.css?v=<?php echo $version; ?>" rel="stylesheet">

        <!-- Theme style -->
        <link href="<?php echo $base_url; ?>css/AdminLTE.min.css?v=<?php echo $version; ?>" rel="stylesheet"> 
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <!-- Custom CSS -->    
        <link href="<?php echo $base_url; ?>css/freelancer.css?v=<?php echo $version; ?>" rel="stylesheet">

        <!-- Custom Fonts -->    
        <link href="<?php echo $base_url; ?>css/font-awesome/css/font-awesome.min.css?v=<?php echo $version; ?>" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .modal-header, h4, .close {
                background-color: #18bc9c;
                color:white !important;
                text-align: center;
                font-size: 30px;
            }
            .modal-footer {
                background-color: #f9f9f9;
            }
            .btn-social > *:first-child{
                left: 7px;
                line-height: 34px;
                position: absolute;
                text-align: center;
                top: 6px;
                width: 32px;
                font-size: 1em;
                border-right: none;
            }
        </style>
    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#page-top">Belajar Ujian</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#portfolio">Kelas</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#about">Servis</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact">Hubungi Kami</a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal">Log In</a>
                        </li>
                        <li>
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
        
        <!--modal kelas-->
        <div class="modal fade" id="kelasModal1" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">                    
                    <div class="modal-body" style="text-align:center;">
                        <h2>Basic Finance</h2>
                        <hr class="star-primary">
                        <!--<img src="<?php echo $base_url ?>img/portfolio/cabin.png" class="img-responsive img-centered" alt="">-->
                        <div class="row">
                            <div class="portfolio-item">
                                <!-- small box -->
                                <div class="small-box bg-light-blue">
                                    <div class="inner" style="text-align:left;">
                                        <h3>Bc</h3>
                                        <p>Basic Finance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-people"></i>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Basic Finance berisi soal-soal latihan beserta ujian soal untuk level dasar. Ribuan soal yang kami miliki dapat kami sajikan sebagai bahan latihan Anda untuk menghadapi ujian dengan hanya Rp 10.000.</p>                            
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--modal kelas 2-->
        <div class="modal fade" id="kelasModal2" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">                    
                    <div class="modal-body" style="text-align:center;">
                        <h2>Managerial Finance</h2>
                        <hr class="star-primary">
                        <!--<img src="<?php echo $base_url ?>img/portfolio/cabin.png" class="img-responsive img-centered" alt="">-->
                        <div class="row">
                            <div class="portfolio-item">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner" style="text-align:left;">
                                        <h3>Mgr</h3>
                                        <p>Managerial Finance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-people-outline"></i>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Managerial Finance berisi soal-soal latihan beserta ujian soal untuk level managerial. Ribuan soal yang kami miliki dapat kami sajikan sebagai bahan latihan Anda untuk menghadapi ujian dengan hanya Rp 30.000.</p>                            
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <!--modal kelas 3-->
        <div class="modal fade" id="kelasModal3" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">                    
                    <div class="modal-body" style="text-align:center;">
                        <h2>Collection Finance</h2>
                        <hr class="star-primary">
                        <!--<img src="<?php echo $base_url ?>img/portfolio/cabin.png" class="img-responsive img-centered" alt="">-->
                        <div class="row">
                            <div class="portfolio-item">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner" style="text-align:left;">
                                        <h3>CN</h3>
                                        <p>Collection Finance</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-person"></i>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Collection Finance berisi soal-soal latihan beserta ujian soal untuk level advanced. Ribuan soal yang kami miliki dapat kami sajikan sebagai bahan latihan Anda untuk menghadapi ujian dengan hanya Rp 50.000.</p>                            
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- Header -->
        <header>        
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-responsive" width="256px" height="256px" src="<?php echo $base_url ?>img/staff.png" alt="">
                        <div class="intro-text">
                            <span class="name">Belajar Ujian</span>
                            <hr class="star-light">
                            <span class="skills">Persiapkan Dirimu Hadapi Ujian</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>    


        <!-- Portfolio Grid Section -->
        <section id="portfolio">
            <div class="container">            
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Kelas</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 portfolio-item">
                        <!-- small box -->
                        <div class="small-box bg-light-blue">
                            <div class="inner">
                                <h3>Bc</h3>
                                <p>Basic Finance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people"></i>
                            </div>
                            <a class="small-box-footer" href="#kelasModal1" data-toggle="modal">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-sm-4 portfolio-item">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>Mgr</h3>
                                <p>Managerial Finance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people-outline"></i>
                            </div>
                            <a class="small-box-footer" href="#kelasModal2" data-toggle="modal">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-sm-4 portfolio-item">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>Cn</h3>
                                <p>Collection Finance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-person"></i>
                            </div>
                            <a class="small-box-footer" href="#kelasModal3" data-toggle="modal">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->

                </div>
                <!--<div class="row">

                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?php echo $base_url ?>img/portfolio/cabin.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?php echo $base_url ?>img/portfolio/cake.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?php echo $base_url ?>img/portfolio/circus.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?php echo $base_url ?>img/portfolio/game.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?php echo $base_url ?>img/portfolio/safe.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?php echo $base_url ?>img/portfolio/submarine.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    -->
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="success" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Servis</h2>
                        <hr class="star-light">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-2">
                        <p>BelajarUjian merupakan sarana pembelajaran yang menyediakan latihan soal bagi Anda untuk mempersiapkan diri menghadapi segala jenis ujian baik itu ujian sertifikasi, ujian masuk universitas, ujian masuk kantor dan ujian lain. </p>
                    </div>
                    <div class="col-lg-4">
                        <p>Dengan ragam soal yang bervariasi dan tingkat kesulitan yang sudah disesuaikan dengan ragam ujian, Anda akan lebih siap dan lebih percaya diri dalam menghadapi ujian yang sebenarnya. </p>
                    </div>
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <a href="<?php echo $base_url; ?>index.php/main/signup" class="btn btn-lg btn-outline">
                            <!--<i class="fa fa-download"></i>--> Free Trial
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Hubungi Kami</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                        <form name="sentMessage" id="contactForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Nama</label>
                                    <input maxlength="100" type="text" class="form-control" placeholder="Nama" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email</label>
                                    <input maxlength="100" type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Nomor Telepon</label>
                                    <input maxlength="50" type="tel" class="form-control" placeholder="Nomor Telepon" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Pesan</label>
                                    <textarea rows="3" class="form-control" placeholder="Pesan" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Captcha</label>
                                    <div class="g-recaptcha" data-sitekey="6LfosgsTAAAAANRF6GbfCFT1bQv6rR3GuwmYu1jT"></div>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>                            
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success btn-lg">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3>Lokasi</h3>
                            <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>Social Media</h3>
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>Belajar Ujian</h3>
                            <p>Siap sedia persiapkan Anda lulus ujian</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; BelajarUjian.com 2015
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-top page-scroll visible-xs visible-sm">
            <a class="btn btn-primary" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <!-- Portfolio Modals -->
        <!--<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Project Title</h2>
                                <hr class="star-primary">
                                <img src="<?php echo $base_url ?>img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                                <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong><a href="http://startbootstrap.com">April 2014</a>
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong><a href="http://startbootstrap.com">Web Development</a>
                                        </strong>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            
                            <div class="modal-body">
                                <h2>Basic Finance</h2>
                                <hr class="star-primary">
                                <!--<img src="<?php echo $base_url ?>img/portfolio/cabin.png" class="img-responsive img-centered" alt="">-->
                                <div class="row">
                                    <div class="portfolio-item">
                                        <!-- small box -->
                                        <div class="small-box bg-light-blue">
                                            <div class="inner" style="text-align:left;">
                                                <h3>Bc</h3>
                                                <p>Basic Finance</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-ios-people"></i>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p>Basic Finance berisi soal-soal latihan beserta ujian soal untuk level dasar.  Ribuan soal yang kami miliki dapat kami sajikan sebagai bahan latihan Anda untuk menghadapi ujian dengan hanya Rp 10.000 / tahun.</p>                            
                                </div>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Managerial Finance</h2>
                                <hr class="star-primary">
                                <img src="<?php echo $base_url ?>img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                                <p>Managerial Finance berisi soal-soal latihan beserta ujian soal untuk level managerial.  Ribuan soal yang kami miliki dapat kami sajikan sebagai bahan latihan Anda untuk menghadapi ujian dengan hanya Rp 30.000 / tahun.</p>                            
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Collection Finance</h2>
                                <hr class="star-primary">
                                <img src="<?php echo $base_url ?>img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                                <p>Collection Finance berisi soal-soal latihan beserta ujian soal untuk level advanced.  Ribuan soal yang kami miliki dapat kami sajikan sebagai bahan latihan Anda untuk menghadapi ujian dengan hanya Rp 50.000 / tahun.</p>
                                <!--<ul class="list-inline item-details">
                                    <li>Client:
                                        <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong><a href="http://startbootstrap.com">April 2014</a>
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong><a href="http://startbootstrap.com">Web Development</a>
                                        </strong>
                                    </li>
                                </ul>-->
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Project Title</h2>
                                <hr class="star-primary">
                                <img src="<?php echo $base_url ?>img/portfolio/game.png" class="img-responsive img-centered" alt="">
                                <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong><a href="http://startbootstrap.com">April 2014</a>
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong><a href="http://startbootstrap.com">Web Development</a>
                                        </strong>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Project Title</h2>
                                <hr class="star-primary">
                                <img src="<?php echo $base_url ?>img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                                <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong><a href="http://startbootstrap.com">April 2014</a>
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong><a href="http://startbootstrap.com">Web Development</a>
                                        </strong>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>Project Title</h2>
                                <hr class="star-primary">
                                <img src="<?php echo $base_url ?>img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                                <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong><a href="http://startbootstrap.com">April 2014</a>
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong><a href="http://startbootstrap.com">Web Development</a>
                                        </strong>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo $base_url; ?>js/jQuery/jQuery-2.1.4.min.js?v=<?php echo $version; ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $base_url; ?>js/bootstrap/bootstrap.min.js?v=<?php echo $version; ?>"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>    
        <script src="<?php echo $base_url; ?>js/classie.js?v=<?php echo $version; ?>"></script>    
        <script src="<?php echo $base_url; ?>js/cbpAnimatedHeader.js?v=<?php echo $version; ?>"></script>

        <!-- Contact Form JavaScript -->    
        <script src="<?php echo $base_url; ?>js/jqBootstrapValidation.js?v=<?php echo $version; ?>"></script>
        <script src="<?php echo $base_url; ?>js/contact_me.js?v=<?php echo $version; ?>"></script>    

        <!-- Custom Theme JavaScript -->    
        <script src="<?php echo $base_url; ?>js/freelancer.js?v=<?php echo $version; ?>"></script>

    </body>

</html>
