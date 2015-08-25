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
                <div class="row">
                    <div class="">
                    <div class="well bs-component">
                        <form class="form-horizontal" action="<?php echo $base_url?>index.php/main/signin" method="POST">
                            <fieldset>                                
                                <legend style="text-align:center;">Masukkan email Anda, kami akan mengirimkan langkah-langkah penggantian password ke email Anda.</legend>                                
                                <div class="form-group">
                                    <label class="col-lg-2 control-label" for="inputEmail">Email <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input name="email" type="email" maxlength="100" placeholder="Email" id="inputEmail" class="form-control" required data-validation-required-message="Masukkan Email Anda">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">                      
                                        <button class="btn btn-primary" type="submit">Reset Password</button>
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
        

        <!-- Custom Theme JavaScript -->    
        <!--<script src="<?php echo $base_url; ?>js/freelancer.js?v=<?php echo $version; ?>"></script>-->

    </body>

</html>
