<thead>
    <tr>
        <th>#</th>
        <th>Institution Name</th>
        <th>Manager Photo</th>
        <th>Manager Name</th>
        <th>Creation Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    if (isset($institutions) && $institutions && sizeof($institutions)) {
        $i = 1;
        foreach ($institutions AS $institution) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $institution['institution_name']; ?></td>
                <td valign="middle">
                    <img src="<?php echo base_url(); ?>Uploads/<?php echo (isset($institution) && $institution && $institution['manager_photo'] && $institution['manager_photo'] != null) ? $institution['manager_photo'] : "default.png"; ?>" 
                         width="30" height="30" class="img-circle m-b-xs" alt="<?php echo (isset($institution) && $institution && $institution['manager_name']) ? $institution['manager_name'] : ""; ?>">
                </td>
                <td>
                    <?php echo $institution['manager_name']; ?>
                </td>
                <td><?php echo $institution['creation_date']; ?></td>
                <td>
                    <div class="switch switch-success switch-sm round switch-inline">
                        <?php
                        if ($institution['institution_status']) {
                            ?>
                            <input type="checkbox" id="status<?php echo $i; ?>" checked
                                   onclick="changeInstitutionStatus(<?php echo $institution['institution_id']; ?>, 0);" />
                                   <?php
                               } else {
                                   ?>
                            <input type="checkbox" id="status<?php echo $i; ?>" 
                                   onclick="changeInstitutionStatus(<?php echo $institution['institution_id']; ?>, 1);" />
                                   <?php
                               }
                               ?>
                        <label for="status<?php echo $i; ?>"></label>
                    </div>
                </td>
                <td>
                    <a href="<?php echo base_url(); ?>admin/update/institutions/<?php echo $institution['institution_id']; ?>" class="btn btn-primary btn-xs" title="Edit">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="<?php echo base_url(); ?>admin/delete/institutions/<?php echo $institution['institution_id']; ?>" class="btn btn-danger btn-xs" title="Delete">
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
            <td colspan="7">No Institution Exist</td>
        </tr>
        <?php
    }
    ?>
</tbody>
<tfoot>
    <tr>
        <td colspan="7">Total Records: <?php echo isset($institutions) && $institutions && sizeof($institutions) ? sizeof($institutions) : 0; ?></td>
    </tr>
</tfoot>