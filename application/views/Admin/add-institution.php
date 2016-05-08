<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add New Institution</h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/institutions">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/save_institution" method="POST" class="stockForm" enctype="multipart/form-data">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="institution_name">Institution Name</label>
                                    <input type="text" placeholder="Enter Institution Name" class="form-control" name="institution_name" id="institution_name"
                                           required data-parsley-required-message="Please Enter Institution Name" />
                                </div>
                                <div class="form-group">
                                    <label for="institution_bio">Institution Bio</label>
                                    <textarea placeholder="Enter Institution Bio" class="form-control" name="institution_bio" id="institution_bio" rows="5"
                                              required data-parsley-required-message="Please Enter Institution Bio"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="manager_name">Manager Name</label>
                                    <input type="text" placeholder="Enter Manager Name" class="form-control" name="manager_name" id="manager_name"
                                           required data-parsley-required-message="Please Enter Manager Name" />
                                </div>
                                <div class="form-group">
                                    <label for="manager_bio">Manager Bio</label>
                                    <textarea placeholder="Enter Manager Bio" class="form-control" name="manager_bio" id="manager_bio" rows="5"
                                              required data-parsley-required-message="Please Enter Manager Bio"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="manager_photo">Manager Photo</label>
                                    <input type="file" name="manager_photo" id="manager_photo" accept="image/*" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <button type="submit" name="save_institution" id="save_institution" class="btn btn-primary">Save Institution</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>