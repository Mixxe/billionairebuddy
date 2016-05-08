<!--instruments-->
<section id="instruments" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Instruments</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 wow fadeInLeft">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Manager</th>
                                <th>Institution</th>
                                <th>Stock</th>
                                <th>Stock Price</th>
                                <th>Buy Now</th>
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
                                        <td><?php echo $instrument['stock_discount']; ?>%</td>
                                        <?php
                                        if (isset($settings) && $settings && $settings['extra_link_text']) {
                                            ?>
                                            <td>
                                                <a rel="nofollow" href="<?php echo ($settings['extra_link_text']) ? $settings['extra_link_url'] : "#" ?>" class="btn btn-warning btn-xs">
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
                        if(!$all){
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
        </div>
    </div>
</section>