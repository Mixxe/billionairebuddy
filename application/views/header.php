<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Stock - <?php echo (isset($page) && $page) ? $page : ""; ?></title>
        <link href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>Assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>Assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>Assets/css/style.css" rel="stylesheet">
    </head>
    <body id="page-top" class="landing-page">
        <div class="navbar-wrapper">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">
                            BILLIONAIRE BUDDY
                            <p>The <strong>SIMPLE</strong> way to trade like a <strong>billionaire</strong></p>
                        </a>
                    </div>
                    <!--
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?php echo (isset($page) && $page && $page == 'Instruments') ? "active" : ""; ?>">
                                <a class="page-scroll" href="<?php echo base_url(); ?>index/instruments">Instruments</a>
                            </li>
                            <li class="<?php echo (isset($page) && $page && $page == 'Institutions') ? "active" : ""; ?>">
                                <a class="page-scroll" href="<?php echo base_url(); ?>index/institutions">Institutions</a>
                            </li>
                            <li class="<?php echo (isset($page) && $page && $page == 'Managers') ? "active" : ""; ?>">
                                <a class="page-scroll" href="<?php echo base_url(); ?>index/managers">Managers</a>
                            </li>
                            <li><a class="page-scroll" href="#newsletter">Newsletter</a></li>
                            <li><a class="page-scroll" href="#contact">Contact Us</a></li>
                        </ul>
                    </div>
                    -->
                </div>
            </nav>
        </div>

        <div class="row" id="banner">
            <div class="col-md-12">
                <h2 class="title"></h2>
                <h1>We <strong>track hedge funds'</strong> stock holdings<br/>
                    and alert you when you can <strong>buy the</strong> <br/>
                    <strong>same stock cheaper!</strong>
                </h1>
                <p><strong>FREE NEWSLETTER:</strong> get alerted with the biggest bargains</p>
                <span>
                    <a class="btn btn-lg btn-primary" href="#" role="button">
                        YES, I WANT THE BILLIONAIRE BUDDY NEWSLETTER!
                    </a>
                </span>
            </div>
        </div>