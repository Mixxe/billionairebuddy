<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Control Panel | Login</title>
        <link href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"  />
        <link href="<?php echo base_url(); ?>Assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>Assets/css/switch.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Administrator Login</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <form role="form" action="<?php echo base_url(); ?>admin/validate_admin" method="POST" class="stockForm">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                            <div class="form-group">
                                                <label for="admin_username">Admin Username</label>
                                                <input type="text" placeholder="Enter Username" class="form-control" name="admin_username" id="admin_username"
                                                       required data-parsley-required-message="Please Enter Username" />
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_password">Admin Password</label>
                                                <input type="password" placeholder="Enter Password" class="form-control" name="admin_password" id="admin_password"
                                                       required data-parsley-required-message="Please Enter Password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                            <div class="form-group">
                                                <button type="submit" name="validate_login" id="validate_login" class="btn btn-primary">Validate Admin</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/inspinia.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/toastr/toastr.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/parsley.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('form.stockForm').parsley();
<?php
if ($this->session->flashdata('error_type') && $this->session->flashdata('error_msg')) {
    ?>
                    setTimeout(function () {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };
                        toastr.<?php echo $this->session->flashdata('error_type'); ?>('<?php echo $this->session->flashdata('error_msg'); ?>', '<?php echo ($this->session->flashdata('error_type') && $this->session->flashdata('error_type') == 'success') ? "Success" : "Error"; ?>');
                    }, 1300);
    <?php
}
?>
            });
        </script>
    </body>
</html>