<?php

if (!isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'auth?page=login');
}

$controllers = new AdminModel();
$expire_soon_count = $controllers->getSoonExpiredMedicine();
$orderlvl_count = $controllers->getOrderLevelMedicine();
$zero_count = $controllers->getZeroMedicine();
$expired_count = $controllers->getExpiredMedicine();
$available_count = $controllers->getAvailableMedicine();
?>

<div class="row ">

    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-5 row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card " data-bs-toggle="modal" data-bs-target="#soonExpiredModal">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Soon To Expired</p>
                                <h3 class="font-weight-bolder mb-0 <?= ($expire_soon_count->expired_count > 0) ? 'text-danger' : ''; ?>">
                                    <?= $expire_soon_count->expired_count  ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card" data-bs-toggle="modal" data-bs-target="#orderLevelModal">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Order Level</p>
                                <h3 class="font-weight-bolder mb-0 <?= ($orderlvl_count->medicine_count > 0) ? 'text-danger' : ''; ?>">
                                    <?= $orderlvl_count->medicine_count   ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card" data-bs-toggle="modal" data-bs-target="#zeroCountModal">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Zero Count</p>
                                <h3 class="font-weight-bolder mb-0 <?= ($zero_count->zero_count > 0) ? 'text-danger' : ''; ?>">
                                    <?= $zero_count->zero_count  ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mt-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" data-bs-toggle="modal" data-bs-target="#expiredModal">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Expired</p>
                                <h3 class="font-weight-bolder mb-0 <?= ($expired_count->expired_count > 0) ? 'text-danger' : ''; ?>">
                                    <?= $expired_count->expired_count  ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mt-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" data-bs-toggle="modal" data-bs-target="#availableModal">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Available</p>
                                <h3 class="font-weight-bolder mb-0 <?= ($available_count->available_count > 0) ? 'text-info' : ''; ?>">
                                    <?= $available_count->available_count  ?>
                                </h3>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12  col-sm-6 mt-4 ">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-3 text-capitalize font-weight-bold">Complaint and Treatment</p>

                        </div>
                    </div>
                    <div class="mt-3" id="dashboardReport"></div>
                </div>

            </div>
        </div>

    </div>