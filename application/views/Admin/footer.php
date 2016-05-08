<div class="footer">
    <div>
        <strong>Copyright</strong> <?php echo (isset($admin_company) && $admin_company) ? $admin_company : "Company"; ?> &copy; <?php echo date('Y'); ?>
    </div>
</div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/peity/jquery.peity.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/inspinia.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/pace/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/parsley.min.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/flot/jquery.flot.spline.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/demo/peity-demo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/gritter/jquery.gritter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/demo/sparkline-demo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>Assets/js/plugins/chartJs/Chart.min.js"></script>-->
<script type="text/javascript">
    function changeInstitutionStatus(id, status)
    {
        $.ajax({
            'url': '<?php echo base_url(); ?>admin/change_institution_status',
            'type': 'POST',
            'data': {id: id, status: status},
            'success': function (data) {
                if (data) {
                    $('#institutions_table_data').html(data);
                }
            }
        });
    }
    $(document).ready(function () {
        $('table.stock_table').DataTable();
        $('form.stockForm').parsley();
<?php
if ($this->session->flashdata('error_type') && $this->session->flashdata('error_msg')) {
    ?>
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.<?php echo $this->session->flashdata('error_type'); ?>('<?php echo $this->session->flashdata('error_msg'); ?>', '<?php echo ($this->session->flashdata('error_type') && $this->session->flashdata('error_type') == 'success') ? "Success" : "Error"; ?>');
            }, 200);
    <?php
}
?>
    });
</script>
</body>
</html>