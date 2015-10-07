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
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
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

    header .container {
        padding-bottom: 100px;
        padding-top: 150px;
    }

    #footer {
        background-color: #233140;
        display: inline;
        float: left;
        padding: 20px;
        width: 100%;
    }

    .footer_left {
        display: inline;
        float: left;
        width: 100%;
    }

    .footer_right {
        display: inline;
        float: left;
        width: 100%;
    }
    .social_nav {
        text-align: right;
    }
    .social_nav li {
        display: inline-block;
    }
    .social_nav li a {
        border: 1px solid #fff;
        color: #ffffff;
        display: inline-block;
        font-size: 18px;
        height: 30px;
        line-height: 28px;
        margin-left: 5px;
        text-align: center;
        transition: all 0.5s ease 0s;
        width: 35px;
    }
    @media(max-width:767px ){
        .social_nav {margin-top: 20px;text-align: center;}
        .footer_left {text-align: center;}
        .footer_right { margin-top: 20px;text-align: center;width:auto;}
    }
    @media(max-width:480px ){
        .footer_left {text-align: center;}
        .footer_right { text-align: center;}
        .social_nav { text-align: center;width:auto;}
    }

</style>