<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Control Panel | <?php echo (isset($page_title) && $page_title) ? $page_title : ""; ?></title>
        <link href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"  />
        <link href="<?php echo base_url(); ?>Assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <!-- Toastr style -->
        <link href="<?php echo base_url(); ?>Assets/css/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <!-- Gritter -->
        <link href="<?php echo base_url(); ?>Assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/switch.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> <span>
                                    <h3>
                                        <?php echo (isset($admin_company) && $admin_company) ? ucwords($admin_company) : ""; ?>
                                    </h3>
                                    <!--<img alt="image" class="img-circle" src="<?php echo base_url(); ?>Assets/img/profile_small.jpg" />-->
                                </span>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear">
                                        <span class="block m-t-xs"> 
                                            <strong class="font-bold">
                                                <?php echo (isset($admin_name) && $admin_name) ? ucwords($admin_name) : ""; ?>
                                            </strong>
                                        </span> 
                                    </span> 
                                </a>
                            </div>
                        </li>
                        <li class="<?php echo (isset($page) && $page && $page == 'Dashboard') ? 'active' : ''; ?>">
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Dashboard') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo (isset($page) && $page && $page == 'Institutions') ? 'active' : ''; ?>">
                            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Institutions</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Institutions') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/institutions">Institutions</a>
                                </li>
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Add Institution') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/add_institution">Add Institution</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo (isset($page) && $page && $page == 'Instruments') ? 'active' : ''; ?>">
                            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Instruments</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Instruments') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/instruments">Instruments</a>
                                </li>
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Add Instrument') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/add_instrument">Add Instrument</a>
                                </li>
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Import Instruments') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/import_instruments">Import Instruments</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo (isset($page) && $page && $page == 'Quotes') ? 'active' : ''; ?>">
                            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Quotes</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Quotes') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/quotes">Quotes</a>
                                </li>
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Add Quote') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/add_quote">Add Quote</a>
                                </li>                                
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Import Quotes') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/import_quotes">Import Quotes</a>
                                </li>
                            </ul>
                        </li>

                        <li class="<?php echo (isset($page) && $page && $page == 'Settings') ? 'active' : ''; ?>">
                            <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li class="<?php echo (isset($page_title) && $page_title && $page_title == 'Settings') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url(); ?>admin/settings">Settings</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/profile">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/logout">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2><?php echo (isset($page_title) && $page_title) ? $page_title : ""; ?></h2>
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
                            </li>
                            <?php if (isset($page) && $page) { ?>
                                <li class="<?php echo (isset($sub_page) && $sub_page) ? "" : "active"; ?>">
                                    <?php echo (isset($sub_page) && $sub_page) ? '<a href=' . base_url() . 'admin/' . strtolower($page) . '>' : "<strong>"; ?><?php echo (isset($page) && $page) ? $page : ""; ?><?php echo (isset($sub_page) && $sub_page) ? "</a>" : "</strong>"; ?>
                                </li>
                            <?php } ?>
                            <?php if (isset($sub_page) && $sub_page) { ?>
                                <li class="active">
                                    <strong><?php echo (isset($sub_page) && $sub_page) ? $sub_page : ""; ?></strong>
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                    <div class="col-lg-2"></div>
                </div>