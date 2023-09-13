<?php
require APPROOT . '/views/elements/login-head.php';
?>

<div class="app-content content ">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-basic px-2">
                <div class="auth-inner my-2">
                    <!-- Login basic -->
                    <div class="card mb-0">
                        <div class="card-body">
                            <h2 class="brand-text text-primary ms-1 text-center mb-2">Vehicle Types</h2>
                            <h4 class="card-title mb-1">Welcome to test! 👋</h4>
                            <p class="card-text mb-2">Create your account now</p>

                            <form class="auth-login-form mt-2" action="<?php echo URLROOT; ?>/users/register" method="POST">
                                <div class="mb-1">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control <?= $data['emailError'] != '' ? 'error':''; ?>" id="email" name="email"
                                           placeholder="john@example.com" aria-describedby="login-email" tabindex="1"
                                           value="<?=$data['email']?>"
                                           autofocus/>
                                    <span id="login-email-error" class="error"><?php echo $data['emailError']; ?></span>
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle <?= $data['passwordError'] != '' ? 'is-invalid':''; ?>">
                                        <input type="password" class="form-control form-control-merge <?= $data['passwordError'] != '' ? 'error':''; ?>"
                                               id="password" name="password" tabindex="2"
                                               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                               aria-describedby="login-password"/>
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    <span id="login-password-error" class="error"><?php echo $data['passwordError']; ?></span>
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle <?= $data['confirmPasswordError'] != '' ? 'is-invalid':''; ?>">
                                        <input type="password" class="form-control form-control-merge <?= $data['confirmPasswordError'] != '' ? 'error':''; ?>"
                                               id="confirmPassword" name="confirmPassword" tabindex="2"
                                               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                               aria-describedby="confirmPassword"/>
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                    <span id="confirmPassword-error" class="error"><?php echo $data['confirmPasswordError']; ?></span>
                                </div>

                                <button class="btn btn-primary w-100" tabindex="4">Sign up</button>
                            </form>

                            <p class="text-center mt-2">
                                <span>Already have an account?</span>
                                <a href="<?php echo URLROOT; ?>/users/login">
                                    <span>Sign in instead</span>
                                </a>
                            </p>

                        </div>
                    </div>
                    <!-- /Login basic -->
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
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo URLROOT ?>/public/js/scripts/pages/auth-login.js"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
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
