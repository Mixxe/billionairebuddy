<div class="row-intro">
    <center>
        <h2>How it works</h2>
        <p class="tablesintro">If the current price for a stock is lower than what a big hedge fund paid for it, you can find it below!</p>
        <div class="navy-line"></div>
    </center>
</div>
<div class="container">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Manager</th>
                    <th>Hedge fund</th>
                    <th>Stock</th>
                    <th>Their price*</th>
                    <th>Buy now</th>
                    <th>Discount</th>
                    <?php
                    if (isset($settings) && $settings && $settings['extra_link_text']) {
                        ?>
                        <th>Our Offer</th>
                        <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($instruments) && $instruments && sizeof($instruments)) {
                    $i = 1;
                    foreach ($instruments AS $instrument) {
                        $institution_name = str_replace(' ', '_', $instrument['institution_name']);
                        $manager_name = str_replace(' ', '_', $instrument['manager_name']);
                        ?>
                        <tr>
                            <td>
                                <img src="<?php echo base_url(); ?>Uploads/<?php echo ($instrument['manager_photo'] && $instrument['manager_photo'] != null) ? $instrument['manager_photo'] : "default.png"; ?>" 
                                     width="30" height="30" class="img-circle m-b-xs" alt="<?php echo ($instrument['manager_name']) ? $instrument['manager_name'] : ""; ?>">
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>index/manager/<?php echo $manager_name; ?>">
                                    <?php echo $instrument['manager_name']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>index/institution/<?php echo $institution_name; ?>">
                                    <?php echo $instrument['institution_name']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo base_url(); ?>index/instrument/<?php echo $instrument['quote_symbol']; ?>">
                                    <?php echo $instrument['quote_name']; ?>
                                </a>
                            </td>
                            <td><?php echo $instrument['stock_price']; ?></td>
                            <td><?php echo $instrument['quote_current']; ?></td>
                            <td><?php echo $instrument['stock_discount']; ?>% <span class="glyphicon glyphicon-ok ok" aria-hidden="true"></span></td>
                            <?php
                            if (isset($settings) && $settings && $settings['extra_link_text']) {
                                ?>
                                <td>
                                    <!-- <button type="button" class="btn btn-success">€20 free</button> -->
                                    <a rel="nofollow" href="<?php echo ($settings['extra_link_text']) ? $settings['extra_link_url'] : "#" ?>" 
                                    class="btn btn-success extra_link">
                                        <?php echo $settings['extra_link_text']; ?>
                                    </a>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>                            
                        <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="<?php echo (isset($settings) && $settings) ? "8" : "7"; ?>">No Instrument Exist</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
            <?php
            if (!$all) {
                if (isset($total_instruments) && $total_instruments && $total_instruments > 20) {
                    ?>
                    <tfoot>
                        <tr>
                            <th colspan="<?php echo (isset($settings) && $settings) ? "6" : "5"; ?>">
                                Showing 20 Out Of <?php echo $total_instruments; ?>
                            </th>
                            <th colspan="2" class="text-right">
                                <a href="<?php echo base_url(); ?>index/instruments/all" class="btn btn-info btn-xs">View All</a>
                            </th>
                        </tr>
                    </tfoot>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>