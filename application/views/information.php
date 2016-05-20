<!--Institution-->
<?php if (isset($page) && $page && $page == 'Institutions') { ?>
    <div class="row-intro">
        <center>
            <h2>Institution: <?php echo (isset($institution) && $institution && $institution['institution_name']) ? $institution['institution_name'] : ""; ?></h2>
            <div class="navy-line"></div>
        </center>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 wow fadeInLeft">
                <div class="row m-b-lg m-t-lg">
                    <div class="col-md-2">
                        <div class="profile-image">
                            <img src="<?php echo base_url(); ?>Uploads/<?php echo (isset($institution) && $institution && $institution['manager_photo'] && $institution['manager_photo'] != null) ? $institution['manager_photo'] : "default.png"; ?>" 
                                 class="img-circle circle-border m-b-md" alt="<?php echo (isset($institution) && $institution && $institution['manager_name']) ? $institution['manager_name'] : ""; ?>">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="profile-info">
                            <div class="">
                                <div>
                                    <h2 class="no-margins">
                                        <?php echo (isset($institution) && $institution && $institution['institution_name']) ? $institution['institution_name'] : ""; ?>
                                    </h2>
                                    <h4>Managed By 
                                        <?php
                                        if(isset($institution) && $institution && $institution['manager_name']){
                                            $manager_name = str_replace(' ', '_', $institution['manager_name']);
                                            ?>
                                            <a href="<?php echo base_url(); ?>index/manager/<?php echo $manager_name; ?>">
                                                <?php echo $institution['manager_name']; ?>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </h4>
                                    <small>
                                        <?php echo (isset($institution) && $institution && $institution['institution_bio']) ? $institution['institution_bio'] : ""; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Stock Name</th>
                            <th>Stock Symbol</th>
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
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>index/instrument/<?php echo $instrument['quote_symbol']; ?>">
                                        <?php echo $instrument['quote_name']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $instrument['quote_symbol']; ?></td>
                                    <td><?php echo $instrument['stock_price']; ?></td>
                                    <td><?php echo $instrument['quote_current']; ?></td>
                                    <td><?php echo $instrument['stock_discount']; ?>%</td>
                                    <?php
                                    if (isset($settings) && $settings && $settings['extra_link_text']) {
                                        ?>
                                        <td>
                                            <a rel="nofollow" href="<?php echo ($settings['extra_link_text']) ? $settings['extra_link_url'] : "#" ?>" class="btn btn-success btn-xs">
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
                                <td colspan="<?php echo (isset($settings) && $settings) ? "7" : "6"; ?>">No Instrument Exist</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<!--Manager-->
<?php if (isset($page) && $page && $page == 'Managers') { ?>
    <div class="row-intro">
        <center>
            <h2>Manager: <?php echo (isset($manager) && $manager && $manager['manager_name']) ? $manager['manager_name'] : ""; ?></h2>
            <div class="navy-line"></div>
        </center>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 wow fadeInLeft">
                <div class="row m-b-lg m-t-lg">
                    <div class="col-md-2">
                        <div class="profile-image">
                            <img src="<?php echo base_url(); ?>Uploads/<?php echo (isset($manager) && $manager && $manager['manager_photo'] && $manager['manager_photo'] != null) ? $manager['manager_photo'] : "default.png"; ?>" 
                                 class="img-circle circle-border m-b-md" alt="<?php echo (isset($manager) && $manager && $manager['manager_name']) ? $manager['manager_name'] : ""; ?>">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="profile-info">
                            <div class="">
                                <div>
                                    <h2 class="no-margins">
                                        <?php echo (isset($manager) && $manager && $manager['manager_name']) ? $manager['manager_name'] : ""; ?>
                                    </h2>
                                    <h4>Manager of 
                                        <?php
                                        if(isset($manager) && $manager && $manager['institution_name']){
                                            $institution_name = str_replace(' ', '_', $manager['institution_name']);
                                            ?>
                                            <a href="<?php echo base_url(); ?>index/institution/<?php echo $institution_name; ?>">
                                                <?php echo $manager['institution_name']; ?>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </h4>
                                    <small>
                                        <?php echo (isset($manager) && $manager && $manager['manager_bio']) ? $manager['manager_bio'] : ""; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Stock</th>
                            <th>Stock Symbol</th>
                            <th>Their price*</th>
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
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>index/instrument/<?php echo $instrument['quote_symbol']; ?>">
                                        <?php echo $instrument['quote_name']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $instrument['quote_symbol']; ?></td>
                                    <td><?php echo $instrument['stock_price']; ?></td>
                                    <td><?php echo $instrument['quote_current']; ?></td>
                                    <td><?php echo $instrument['stock_discount']; ?>%</td>
                                    <?php
                                    if (isset($settings) && $settings && $settings['extra_link_text']) {
                                        ?>
                                        <td>
                                            <a rel="nofollow" class="btn btn-success extra_link"  
                                            href="<?php echo ($settings['extra_link_text']) ? $settings['extra_link_url'] : "#" ?>">
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
                                <td colspan="<?php echo (isset($settings) && $settings) ? "7" : "6"; ?>">No Instrument Exist</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<!--Instrument-->
<?php if (isset($page) && $page && $page == 'Instruments') { ?>
    <div class="row-intro">
        <center>
            <h2>Instrument: <?php echo (isset($instrument) && $instrument && $instrument['quote_name']) ? $instrument['quote_name'] . " [" . $instrument['quote_symbol'] . "]" : ""; ?></h2>
            <div class="navy-line"></div>
        </center>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Open</h5>
                        <h1 class="no-margins"><?php echo (isset($instrument) && $instrument && $instrument['quote_open']) ? $instrument['quote_open'] : "0.00000"; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>High</h5>
                        <h1 class="no-margins"><?php echo (isset($instrument) && $instrument && $instrument['quote_high']) ? $instrument['quote_high'] : "0.00000"; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Low</h5>
                        <h1 class="no-margins"><?php echo (isset($instrument) && $instrument && $instrument['quote_low']) ? $instrument['quote_low'] : "0.00000"; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Close</h5>
                        <h1 class="no-margins"><?php echo (isset($instrument) && $instrument && $instrument['quote_close']) ? $instrument['quote_close'] : "0.00000"; ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Manager</th>
                            <th>Institution</th>
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
                                $manager_name = str_replace(' ', '_', $instrument['manager_name']);
                                $institution_name = str_replace(' ', '_', $instrument['institution_name']);
                                ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo base_url(); ?>Uploads/<?php echo ($instrument['manager_photo']) ? $instrument['manager_photo'] : "default.png"; ?>" 
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
                                    <td><?php echo $instrument['stock_price']; ?></td>
                                    <td><?php echo $instrument['quote_current']; ?></td>
                                    <td>
                                        <?php
                                        $discount = (($instrument['stock_price'] - $instrument['quote_current']) * 100) / $instrument['stock_price'];
                                        echo number_format((float) $discount, 2, '.', '');
                                        ?>
                                        %
                                    </td>
                                    <?php
                                    if (isset($settings) && $settings && $settings['extra_link_text']) {
                                        ?>
                                        <td>
                                            <a rel="nofollow" href="<?php echo ($settings['extra_link_text']) ? $settings['extra_link_url'] : "#" ?>" class="btn btn-success btn-xs">
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
                                <td colspan="<?php echo (isset($settings) && $settings) ? "7" : "6"; ?>">No Instrument Exist</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>