<section>
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white mb-7 mt-9">
                    <div class="card card-plain ">
                        <div class="card-header mb-0 pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-success text-gradient">Welcome back</h3>

                        </div>
                        <div class="card-body mb-3">
                            <form role="form" id="loginUser">
                                <label>ID Number | Username</label>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="id_num" placeholder="ID number or Username" aria-label="ID number" aria-describedby="ID-addon">
                                    <div id="idnumError" class="error-text"></div>
                                </div>
                                <label>Password</label>
                                <div class="mb-2">
                                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    <div id="passwordError" class="error-text"></div>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="rememberMe" id="rememberMe" <?= isset($_COOKIE['cis_urememberMe']) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <input type="hidden" name="user_login" id="user_login" value="1">
                                <div class="text-center">
                                    <button type="submit" name="userButton" class="btn bg-gradient-success w-100 mt-4 mb-0">Sign in</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1 d-none ">
                            <p class="mb-4 text-sm mx-auto">
                                Login as administrator?
                                <a href="<?= URL . 'admin/login'; ?>" class="text-info text-gradient font-weight-bold">Login</a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>