<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8">
        <title>Billionaire Buddy</title>
        <meta name="description" content="Buddy">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/css/style4.css">
    </head>
    <body>
        <!-- Page Content -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">Billionaire Buddy</a>
                </div>
                <ul class="nav navbar-nav">                        
                    <li class="menu-item menu-item-type-about">
                        <a href="#">Top 50 stocks</a>
                    </li>
                    <li class="menu-item menu-item-type-blog">
                        <a href="#">Managers</a>
                    </li>
                    <li class="menu-item menu-item-type-active">
                        <a href="#">Track record</a>
                    </li>                
                    <li class="menu-item menu-item-type-contact">
                        <a href="#">About</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="button btn-wrap">
                        <a title="Free Newsletter" href="#">Free Newsletter</a></li>
                </ul>
            </div>
        </nav>        <div class="page-billion-header">    
            <div class="inner">
                <p class="intro">We <b class="upp">track hedge funds'</b> stock holdings</p>
                <p class="news">Do you want to know when you can <b class="upp">buy the same stock cheaper? </b></p>            
            </div>            
        </div>
        <div class="page-billion-form">
            <div class="inner">
                <center>

                    <!-- Begin MailChimp Signup Form -->
                    <!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> -->
                    <div id="mc_embed_signup">
                        <form class="form" target="_blank" novalidate
                        action="//billionairebuddy.us13.list-manage.com/subscribe/post?u=2e62d9936ae57a271db122286&amp;id=40c9d4e1d5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
                            <div id="mc_embed_signup_scroll">
                                <div class="mc-field-group">
                                    <input class="form-url" name="EMAIL" required="" type="text"
                                    placeholder="Sign up for the free newsletter" id="mce-EMAIL"></input>
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display:none"></div>
                                    <div class="response" id="mce-success-response" style="display:none"></div>
                                </div>
                                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                    <input type="text" name="b_2e62d9936ae57a271db122286_40c9d4e1d5" tabindex="-1" value="">
                                </div>
                                <div class="clear">
                                    <input type="submit" value="Sign Up" name="subscribe" 
                                    id="mc-embedded-subscribe" class="btn btn-wrr form-submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                    <!--End mc_embed_signup-->
                </center>
            </div>
        </div>