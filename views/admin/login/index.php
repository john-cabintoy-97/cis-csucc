<?php

if (isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'admin');
}
if (isset($_SESSION['cis-patient-islogin'])) {
    header('location:' . URL . 'patient');
}
?>
<div class="page-header min-vh-75">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 mt-9  col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white mb-7">
                <div class="card card-plain ">
                    <div class="card-header mb-0 pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-success text-gradient">Admin Portal</h3>

                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" id="adminlogin">
                            <label>Username</label>
                            <div class="mb-2">
                                <input type="text" name="per_username" id="per_username" class="form-control error" placeholder="Username" aria-label="Username" aria-describedby="username-addon" value="<?= isset($_COOKIE['cis_username']) ? $_COOKIE['cis_username'] : ''; ?>">
                                <div id="usernameError" class="error-text"></div>
                            </div>
                            <label>Password</label>
                            <div class="mb-2">
                                <input type="password" name="per_password" id="per_password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                <div id="passwordError" class="error-text"></div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="rememberMe" id="rememberMe" <?= isset($_COOKIE['cis_rememberMe']) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <input type="hidden" name="per_login" id="per_login" value="1">
                            <div class="text-center">
                                <button type="submit" name="adminButton" class="btn bg-gradient-success w-100 mt-4 mb-0">Sign in</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                            Login as users ?
                            <a href="<?= URL . 'auth?page=login'; ?>" class="text-info text-gradient font-weight-bold">Login</a>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>