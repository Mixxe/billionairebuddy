<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add New Instrument</h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/instruments">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/save_instrument" method="POST" class="stockForm">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="institution_id">Select Institution</label>
                                    <select name="institution_id" id="institution_id" class="form-control" required data-parsley-required-message="Please Select Institution">
                                        <option value="">Select Institution</option>
                                        <?php
                                        if (isset($institutions) && $institutions && sizeof($institutions)) {
                                            foreach ($institutions AS $institution) {
                                                ?>
                                                <option value="<?php echo $institution['institution_id']; ?>"><?php echo $institution['institution_name'] . '-' . $institution['manager_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quote_id">Select Stock Quote</label>
                                    <select name="quote_id" id="quote_id" class="form-control" required data-parsley-required-message="Please Select Stock Quote">
                                        <option value="">Select Stock Quote</option>
                                        <?php
                                        if (isset($quotes) && $quotes && sizeof($quotes)) {
                                            foreach ($quotes AS $quote) {
                                                ?>
                                                <option value="<?php echo $quote['quote_id']; ?>"><?php echo $quote['quote_name'] . '-' . $quote['quote_symbol']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="stock_price">Stock Price</label>
                                    <input type="text" placeholder="Enter Stock Price" class="form-control" name="stock_price" id="stock_price"
                                           required data-parsley-required-message="Please Enter Stock Price" />
                                </div>
                                <div class="form-group">
                                    <label for="stock_description">Stock Description</label>
                                    <textarea placeholder="Enter Stock Description" class="form-control" name="stock_description" id="stock_description" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <button type="submit" name="save_instrument" id="save_instrument" class="btn btn-primary">Save Instrument</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>