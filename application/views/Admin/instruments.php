<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Instruments</h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/add_instrument">
                            <i class="fa fa-plus"></i> Add New
                        </a>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/import_instruments">
                            <i class="fa fa-upload"></i> Import CSV
                        </a>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>Uploads/sample.csv">
                            <i class="fa fa-download"></i> Sample CSV
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped stock_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Institute Name</th>
                                    <th>Manager Name</th>
                                    <th>Stock Name</th>
                                    <th>Stock Symbol</th>
                                    <th>Stock Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($instruments) && $instruments && sizeof($instruments)) {
                                    $i = 1;
                                    foreach ($instruments AS $instrument) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $instrument['institution_name']; ?></td>
                                            <td><?php echo $instrument['manager_name']; ?></td>
                                            <td><?php echo $instrument['quote_name']; ?></td>
                                            <td><?php echo $instrument['quote_symbol']; ?></td>
                                            <td><?php echo $instrument['stock_price']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/update/instruments/<?php echo $instrument['instrument_id']; ?>" class="btn btn-primary btn-xs" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>admin/delete/instruments/<?php echo $instrument['instrument_id']; ?>" class="btn btn-danger btn-xs" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No Instrument Exist</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">Total Records: <?php echo isset($instruments) && $instruments && sizeof($instruments) ? sizeof($instruments) : 0; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>