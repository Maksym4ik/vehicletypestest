<?php
require APPROOT . '/views/elements/admin-head.php';
?>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

<?php
require APPROOT . '/views/elements/admin-header.php';
?>

<?php
require APPROOT . '/views/elements/admin-sidebar.php';
?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>Vehicle type:</p>
                                <h5><?=$data['row']->name?></h5>
                            </div>
                            <div class="col-12 col-sm-12 mt-2">
                                <a class="btn btn-primary"
                                   href="<?php echo URLROOT; ?>/vehicle-types/list">back to list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="<?php echo URLROOT ?>/public/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo URLROOT ?>/public/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo URLROOT ?>/public/js/core/app-menu.js"></script>
<script src="<?php echo URLROOT ?>/public/js/core/app.js"></script>

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
        console.clear();
    })
</script>
</body>
<!-- END: Body-->

</html>