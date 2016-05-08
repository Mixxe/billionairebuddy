<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add New Quote</h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/quotes">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/save_quote" method="POST" class="stockForm">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="quote_name">Quote Name</label>
                                    <input type="text" placeholder="Enter Quote Name" class="form-control" name="quote_name" id="quote_name"
                                           required data-parsley-required-message="Please Enter Quote Name" />
                                </div>
                                <div class="form-group">
                                    <label for="quote_symbol">Quote Symbol</label>
                                    <input type="text" placeholder="Enter Quote Symbol" class="form-control" name="quote_symbol" id="quote_symbol"
                                           required data-parsley-required-message="Please Enter Quote Symbol" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <button type="submit" name="save_quote" id="save_quote" class="btn btn-primary">Save Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>