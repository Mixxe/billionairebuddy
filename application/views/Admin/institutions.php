<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Institutions</h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/add_institution">
                            <i class="fa fa-plus"></i> Add New
                        </a>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/export/institutions">
                            <i class="fa fa-download"></i> Export Institutions
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped stock_table" id="institutions_table_data">
                            <?php echo (isset($institutions) && $institutions && sizeof($institutions)) ? $institutions : ""; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>