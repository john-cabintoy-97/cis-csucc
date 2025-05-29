<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?= URL; ?>">

                        <div class="logo-container">
                            <div class="logo">
                                <img src="<?= URL; ?>public/img/logo.png" alt="">
                            </div>
                            <div class="logo-desc">
                                <h1> <?= strtoupper(NAVBAR_TITLE) ?></h1>
                            </div>
                        </div>
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <?php if (!isset($_SESSION['cis-patient-islogin'])) : ?>
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                <li class="nav-item" style="display:none">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>

                                    </a>
                                </li>

                            </ul>
                            <div class=" d-flex">
                                <li class="nav-item d-flex align-items-center">
                                    <a class="btn btn-round btn-sm mb-0 btn-outline-success me-2" href="<?= URL ?>auth?page=register">Register</a>
                                </li>
                                <ul class="navbar-nav ">
                                    <li class="nav-item">
                                        <a href="<?= URL ?>auth?page=login" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-success">Login</a>
                                    </li>
                                </ul>
                            </div>
                        <?php else : ?>

                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group d-none">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Type here...">
                                </div>
                            </div>
                            <ul class="navbar-nav  justify-content-end px-3 hideToMobile">
                                <li class="nav-item dropdown pe-2 d-flex align-items-center ">
                                    <a href="javascript:;" class="nav-link text-body  font-weight-bold p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user me-sm-1"></i>
                                        <span class="d-sm-inline d-none">Welcome, &nbsp;&nbsp;<?= isset($_SESSION['cis-patient-name']) ? strtoupper($_SESSION['cis-patient-name']) : 'User'  ?></span>
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                        <li class="mb-0 d-nxone">
                                            <button class="btn  mb-0 btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#feedbackModal">FeedBack</button>
                                        </li>
                                        <li class="mb-0">
                                            <button class="btn btn-outline-danger mb-0 btn-sm w-100" onclick="cis_logout(<?= $_SESSION['cis-patient-id']; ?>)">Logout</button>
                                        </li>

                                    </ul>

                                </li>
                            </ul>
                            <div class=" d-flex d-lg-none d-md-none ">
                                <li class="nav-item d-flex align-items-center d-none">
                                    <a href="<?= URL ?>patient?page=feedback" class="btn btn-round mb-3 btn-sm w-100">FeedBack</a>
                                </li>
                                <ul class="navbar-nav ">
                                    <li class="mb-0 d-nxone">
                                        <button class="btn  mb-0 btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#feedbackModal">FeedBack</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-danger  w-100 mb-0 btn-sm btn-round mb-0" onclick="cis_logout(<?= $_SESSION['cis-patient-id']; ?>)">Logout</button>

                                    </li>
                                </ul>
                            </div>

                        <?php endif ?>

                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>