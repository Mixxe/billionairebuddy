<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Update <?php echo (isset($type) && $type && $type == 'institutions') ? "Institution" : (isset($type) && $type && $type == 'instruments') ? "Instrument" : "Quotes"; ?></h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs"
                           href="<?php echo base_url(); ?>admin/<?php echo $type; ?>">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <a href="update.php"></a>
                        <?php
                        if (isset($type) && $type && $type == 'institutions') {
                            ?>
                            <form role="form" action="<?php echo base_url(); ?>admin/save_institution/<?php echo $id; ?>" method="POST" class="stockForm" enctype="multipart/form-data">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <label for="institution_name">Institution Name</label>
                                        <input type="text" placeholder="Enter Institution Name" class="form-control" name="institution_name" id="institution_name"
                                               required data-parsley-required-message="Please Enter Institution Name"
                                               value="<?php echo (isset($institution) && $institution && $institution['institution_name']) ? $institution['institution_name'] : ""; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="institution_bio">Institution Bio</label>
                                        <textarea placeholder="Enter Institution Bio" class="form-control" name="institution_bio" id="institution_bio" rows="5"
                                                  required data-parsley-required-message="Please Enter Institution Bio"><?php echo (isset($institution) && $institution && $institution['institution_bio']) ? $institution['institution_bio'] : ""; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <label for="manager_name">Manager Name</label>
                                        <input type="text" placeholder="Enter Manager Name" class="form-control" name="manager_name" id="manager_name"
                                               required data-parsley-required-message="Please Enter Manager Name"
                                               value="<?php echo (isset($institution) && $institution && $institution['manager_name']) ? $institution['manager_name'] : ""; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="manager_bio">Manager Bio</label>
                                        <textarea placeholder="Enter Manager Bio" class="form-control" name="manager_bio" id="manager_bio" rows="5"
                                                  required data-parsley-required-message="Please Enter Manager Bio"><?php echo (isset($institution) && $institution && $institution['manager_bio']) ? $institution['manager_bio'] : ""; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="manager_photo">Manager Photo</label>
                                        <input type="file" name="manager_photo" id="manager_photo" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <button type="submit" name="save_institution" id="save_institution" class="btn btn-primary">Update Institution</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        } elseif (isset($type) && $type && $type == 'instruments') {
                            ?>
                            <form role="form" action="<?php echo base_url(); ?>admin/save_instrument/<?php echo $id; ?>" method="POST" class="stockForm">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <label for="institution_id">Select Institution</label>
                                        <select name="institution_id" id="institution_id" class="form-control" required data-parsley-required-message="Please Select Iinstitution">
                                            <option value="">Select Institution</option>
                                            <?php
                                            if (isset($institutions) && $institutions && sizeof($institutions)) {
                                                foreach ($institutions AS $row_institution) {
                                                    ?>
                                                    <option value="<?php echo $row_institution['institution_id']; ?>"
                                                            <?php echo (isset($instrument) && $instrument && $instrument['institution_id'] == $row_institution['institution_id']) ? "selected" : ""; ?>>
                                                                <?php echo $row_institution['institution_name'] . '-' . $row_institution['manager_name']; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_name">Stock Name</label>
                                        <input type="text" placeholder="Enter Stock Name" class="form-control" name="stock_name" id="stock_name"
                                               required data-parsley-required-message="Please Enter Stock Name"
                                               value="<?php echo (isset($instrument) && $instrument && $instrument['stock_name']) ? $instrument['stock_name'] : ""; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_symbol">Stock Symbol</label>
                                        <input type="text" placeholder="Enter Stock Name" class="form-control" name="stock_symbol" id="stock_symbol"
                                               required data-parsley-required-message="Please Enter Stock Symbol"
                                               value="<?php echo (isset($instrument) && $instrument && $instrument['stock_symbol']) ? $instrument['stock_symbol'] : ""; ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <label for="stock_price">Stock Price</label>
                                        <input type="text" placeholder="Enter Stock Name" class="form-control" name="stock_price" id="stock_price"
                                               required data-parsley-required-message="Please Enter Stock Price"
                                               value="<?php echo (isset($instrument) && $instrument && $instrument['stock_price']) ? $instrument['stock_price'] : ""; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_description">Stock Description</label>
                                        <textarea placeholder="Enter Stock Description" class="form-control" name="stock_description" id="stock_description" rows="4"><?php echo (isset($instrument) && $instrument && $instrument['stock_description']) ? $instrument['stock_description'] : ""; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <button type="submit" name="save_instrument" id="save_instrument" class="btn btn-primary">Update Instrument</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        } elseif (isset($type) && $type && $type == 'quotes') {
                            ?>
                            <form role="form" action="<?php echo base_url(); ?>admin/save_quote/<?php echo $id; ?>" method="POST" class="stockForm">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <label for="quote_name">Quote Name</label>
                                        <input type="text" placeholder="Enter Quote Name" class="form-control" name="quote_name" id="quote_name"
                                               required data-parsley-required-message="Please Enter Quote Name"
                                               value="<?php echo (isset($quote) && $quote && $quote['quote_name']) ? $quote['quote_name'] : ""; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="quote_symbol">Quote Symbol</label>
                                        <input type="text" placeholder="Enter Quote Symbol" class="form-control" name="quote_symbol" id="quote_symbol"
                                               required data-parsley-required-message="Please Enter Quote Symbol"
                                               value="<?php echo (isset($quote) && $quote && $quote['quote_symbol']) ? $quote['quote_symbol'] : ""; ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                    <div class="form-group">
                                        <button type="submit" name="save_quote" id="save_quote" class="btn btn-primary">Update Quote</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                        ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>