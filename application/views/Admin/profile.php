<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Administrator Profile: <?php echo (isset($admin_username) && $admin_username) ? $admin_username : ""; ?></h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/save_profile" method="POST" class="stockForm">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="admin_name">Administrator Name</label>
                                    <input type="text" placeholder="Enter Name" class="form-control" name="admin_name" id="admin_name"
                                           required data-parsley-required-message="Please Enter Name"
                                           value="<?php echo (isset($admin_name) && $admin_name) ? $admin_name : ""; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="admin_company">Company Name</label>
                                    <input type="text" placeholder="Enter Company Name" class="form-control" name="admin_company" id="admin_company"
                                           required data-parsley-required-message="Please Enter Company Name"
                                           value="<?php echo (isset($admin_company) && $admin_company) ? $admin_company : ""; ?>" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="admin_email">Administrator Email</label>
                                    <input type="text" placeholder="Enter Email Address" class="form-control" name="admin_email" id="admin_email"
                                           required data-parsley-required-message="Please Enter Email Address" 
                                           value=" <?php echo (isset($admin_email) && $admin_email) ? $admin_email : ""; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="admin_phone">Administrator Phone</label>
                                    <input type="text" placeholder="Enter Phone Number" class="form-control" name="admin_phone" id="admin_phone"
                                           required data-parsley-required-message="Please Enter Phone Number"
                                           value="<?php echo (isset($admin_phone) && $admin_phone) ? $admin_phone : ""; ?>" />
                                </div>                                    
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <button type="submit" name="save_admin" id="save_admin" class="btn btn-primary">Save Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Change Password</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/change_password" method="POST" class="stockForm">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" placeholder="Enter New Password" class="form-control" name="new_password" id="new_password"
                                           required data-parsley-required-message="Please Enter New Password" />
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" placeholder="Enter Confirm Password" class="form-control" name="confirm_password" id="confirm_password"
                                           required data-parsley-required-message="Please Enter Confirm Password"
                                           data-parsley-equalto="#new_password" data-parsley-equalto-message="Confirm Password must be same as new password" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <button type="submit" name="change_password" id="change_password" class="btn btn-primary">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>