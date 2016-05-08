<!--Institutions-->
<section id="institutions" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Institutions</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 wow fadeInLeft">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Institution Name</th>
                                <th>Manager Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($institutions) && $institutions && sizeof($institutions)) {
                                $i = 1;
                                foreach ($institutions AS $institution) {
                                    $institution_name = str_replace(' ', '_', $institution['institution_name']);
                                    $manager_name = str_replace(' ', '_', $institution['manager_name']);
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index/institution/<?php echo $institution_name; ?>">
                                                <?php echo $institution['institution_name']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index/manager/<?php echo $manager_name; ?>">
                                                <?php echo $institution['manager_name']; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="<?php echo (isset($settings) && $settings) ? "4" : "3"; ?>">No Institution Exist</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>