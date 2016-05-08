<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Import Instruments From CSV</h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/instruments">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form role="form" action="<?php echo base_url(); ?>admin/import_csv_data" method="POST" class="stockForm" enctype="multipart/form-data">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <label for="import_csv_file">Upload File</label>                                    
                                    <input type="file" class="form-control" name="import_csv_file" id="import_csv_file"
                                           required data-parsley-required-message="Please Select CSV File" accept=".csv" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-r">
                                <div class="form-group">
                                    <button type="submit" name="import_instruments" id="import_instruments" class="btn btn-primary">
                                        Import Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>