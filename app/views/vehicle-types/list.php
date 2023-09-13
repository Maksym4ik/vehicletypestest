<?php
require APPROOT . '/views/elements/admin-head.php';
?>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

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
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/vehicle-types/create">Create</a>
                    </div>
                    <div class="table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data['records'] as $row): ?>
                                <tr>
                                    <td></td>
                                    <td><?= $row->id ?> </td>
                                    <td><?= $row->name ?> </td>
                                    <td>
                                        <div>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-success dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href="<?php echo URLROOT; ?>/vehicle-types/view/<?=$row->id?>">view</a>
                                                    <?php if($_SESSION['user_role_id'] === '2'):?>
                                                        <a class="dropdown-item"
                                                           href="<?php echo URLROOT; ?>/vehicle-types/update/<?=$row->id?>">edit</a>
                                                        <a class="dropdown-item delete-row-btn" data-id="<?=$row->id?>"
                                                           href="<?php echo URLROOT; ?>/vehicle-types/delete/<?=$row->id?>">delete</a>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <ul class='pagination m-2'>
                            <?php
                            // Display a link to the first page if not on the first page
                            if ($data['currentPage'] > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=1">First</a></li>';
                            }

                            // Display page links within the range
                            for ($page = $data['startPage']; $page <= $data['endPage']; $page++) {
                                if ($page == $data['currentPage']) {
                                    echo '<li class="page-item active"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
                                }
                            }

                            // Display a link to the last page if not on the last page
                            if ($data['currentPage'] < $data['totalPages']) {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . $data['totalPages'] . '">Last</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- list and filter end -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="<?php echo URLROOT ?>/public/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo URLROOT ?>/public/vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?php echo URLROOT ?>/public/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="<?php echo URLROOT ?>/public/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="<?php echo URLROOT ?>/public/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo URLROOT ?>/public/js/core/app-menu.js"></script>
<script src="<?php echo URLROOT ?>/public/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo URLROOT ?>/public/js/scripts/pages/app-user-list.js"></script>
<!-- END: Page JS-->
<?php
require APPROOT . '/views/elements/ajax-block.php';
?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }

    })
</script>
</body>
<!-- END: Body-->

</html>