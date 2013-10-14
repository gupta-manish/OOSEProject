<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo PUBLIC_URL?>css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo PUBLIC_URL?>css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?php echo PUBLIC_URL?>css/main.css">

        <script src="<?php echo PUBLIC_URL?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
      <!--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script> -->
        <script>window.jQuery || document.write('<script src="<?php echo PUBLIC_URL?>js/vendor/jquery-1.10.1.js"><\/script>');</script>

        <script src="<?php echo PUBLIC_URL?>js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo PUBLIC_URL?>js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo BASE_URL?>"><?php echo WEBSITE_NAME?></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="<?php echo BASE_URL?>">Home</a></li>
                            <li><a href="<?php echo BASE_URL?>about">About</a></li>
                            <li><a href="<?php echo BASE_URL?>packages">Packages</a></li>
                            <li><a href="<?php echo BASE_URL?>offers">Offers</a></li>
                          
                        </ul>
                        <?php if(Session::get('loggedIn') == TRUE): ?>
                            <ul class="nav pull-right">
                                <li><a href="<?php echo BASE_URL?>"><?php echo $this->user['loginId'];?></a></li>
                                <li><a href="<?php echo BASE_URL; ?>dashboard/logout" >Log Out</a></li>
                            </ul>
                        <?php else: ?>
                        <ul class="nav pull-right">
                            <form class="navbar-form pull-right" action ="<?php echo BASE_URL;?>login/validation" method ="post">
                                <input class="span2" type="text" placeholder="Login Id" name ="loginId">
                                <input class="span2" type="password" placeholder="Password" name="password">
                                <input type="submit" class="btn btn-primary" value ="Sign in">
                            </form>
                        <li ><a href="<?php echo BASE_URL?>register">Register &nbsp&nbsp|</a></li>
                        </ul>
                        <?php endif; ?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

       <div class="container" >