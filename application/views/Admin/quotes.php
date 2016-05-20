<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Quotes</h5>
                    <div class="ibox-tools pull-right">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/add_quote">
                            <i class="fa fa-plus"></i> Add New
                        </a>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/import_quotes">
                            <i class="fa fa-upload"></i> Import CSV
                        </a>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>Uploads/sample-quotes.csv">
                            <i class="fa fa-download"></i> Sample CSV
                        </a>
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/export/quotes">
                            <i class="fa fa-download"></i> Export Quotes
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped stock_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Quote Name</th>
                                    <th>Quote Symbol</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($quotes) && $quotes && sizeof($quotes)) {
                                    $i = 1;
                                    foreach ($quotes AS $quote) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $quote['quote_name']; ?></td>
                                            <td><?php echo $quote['quote_symbol']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/update/quotes/<?php echo $quote['quote_id']; ?>" class="btn btn-primary btn-xs" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>admin/delete/quotes/<?php echo $quote['quote_id']; ?>" class="btn btn-danger btn-xs" title="Delete">
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
                                        <td colspan="4">No Quote Exist</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">Total Records: <?php echo isset($quotes) && $quotes && sizeof($quotes) ? sizeof($quotes) : 0; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>