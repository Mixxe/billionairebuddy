<!--newsletter-->
<section class="gray-section team">
    <div class="container">
        <div class="row features-block">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 features-text">
                <h2>Perfectly designed </h2>
                <p>
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 features-text">
                <h2>Perfectly designed </h2>
                <p>
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 features-text">
                <h2>Perfectly designed </h2>
                <p>
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                </p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 features-text">
                <h2>Perfectly designed </h2>
                <p>
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                    Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id 
                </p>
            </div>
        </div>
    </div>
</section>

<!--newsletter-->
<section id="newsletter" class="pricing">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Newsletter</h1>
                <p>Subscribe to our mailing list</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 wow fadeInLeft text-center">
                <div id="mc_embed_signup">
                    <form action="//billionairebuddy.us13.list-manage.com/subscribe/post?u=<?php echo (isset($settings) && $settings && $settings['mailchimp_api_key']) ? $settings['mailchimp_api_key'] : ""; ?>&amp;id=<?php echo (isset($settings) && $settings && $settings['mailchimp_list_id']) ? $settings['mailchimp_list_id'] : ""; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"></div>
                                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
                                    <div id="mce-responses" class="clear">
                                        <div class="alert alert-danger" id="mce-error-response" style="display:none"></div>
                                        <div class="alert alert-success" id="mce-success-response" style="display:none"></div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"></div>
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                    <div class="mc-field-group">
                                        <input type="email" value="" name="EMAIL" class="form-control input-lg" 
                                        id="mce-EMAIL" placeHolder="Enter Email Address" />
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                        <input type="text" name="b_2e62d9936ae57a271db122286_40c9d4e1d5" tabindex="-1" value="">
                                    </div>
                                    <div class="clear">
                                        <input type="submit" value="Subscribe" name="subscribe" 
                                        id="mc-embedded-subscribe" 
                                        class="btn btn-primary">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <br/><br/><br/><br/>
            </div>
        </div>
    </div>
</section>

<!--contact-->
<section id="contact" class="gray-section">
    <div class="container">        
        <div class="row" id="footer">
            <div class="col-md-5 col-sm-4 col-xs-12">
                <div class="navbar-header page-scroll">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">
                        BILLIONAIRE BUDDY
                    </a>
                </div>
            </div>
            <div class="col-md-7 col-sm-8 col-xs-12">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?php echo (isset($page) && $page && $page == 'Instruments') ? "actives" : ""; ?>">
                        <a class="page-scroll" href="<?php echo base_url(); ?>index/instruments">Instruments</a>
                    </li>
                    <li class="<?php echo (isset($page) && $page && $page == 'Institutions') ? "actives" : ""; ?>">
                        <a class="page-scroll" href="<?php echo base_url(); ?>index/institutions">Institutions</a>
                    </li>
                    <li class="<?php echo (isset($page) && $page && $page == 'Managers') ? "actives" : ""; ?>">
                        <a class="page-scroll" href="<?php echo base_url(); ?>index/managers">Managers</a>
                    </li>
                    <li><a class="page-scroll" href="#newsletter">Newsletter</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/inspinia.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/pace/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/wow/wow.min.js"></script>
<script type="text/javascript" type="text/javascript">

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function (event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function () {
        var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener('scroll', function (event) {
                if (!didScroll) {
                    didScroll = true;
                    setTimeout(scrollPage, 250);
                }
            }, false);
        }
        function scrollPage() {
            var sy = scrollY();
            if (sy >= changeHeaderOn) {
                $(header).addClass('navbar-scroll')
            } else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>
    (function($) {
        window.fnames = new Array(); 
        window.ftypes = new Array();
        fnames[0]='EMAIL';ftypes[0]='email';
    }(jQuery));
    var $mcj = jQuery.noConflict(true);
</script>
</body>
</html>