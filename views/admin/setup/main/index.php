
<div class="card" style="background: transparent !important">
    <div class="card-body">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-success">SETUP SHORTCUTS</h5>
                <a href="<?= URL ?>admin" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
            </div>
        </h4>
        <div class="row">
        <?php if (isset($permission['st_college']) && $permission['st_college'] == "1") : ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/setup?r=college">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            College
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php if (isset($permission['st_course']) && $permission['st_course'] == "1") : ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/setup?r=course">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Course
                                        </h5>
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
                </a>
            </div>
            <?php endif; ?>
            <?php if (isset($permission['st_office']) && $permission['st_office'] == "1") : ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/setup?r=office">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Office
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <?php endif; ?>
        <?php if (isset($permission['st_illness']) && $permission['st_illness'] == "1") : ?>
        <div class="row mt-xl-5 mt-sm-0 ">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/setup?r=illness">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Illness
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="fa-solid fa-head-side-cough"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php if (isset($permission['st_illness']) && $permission['st_illness'] == "1") : ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/setup?r=personel">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                             Personel
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="fa-solid fa-shield"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php if (isset($permission['st_nurse']) && $permission['st_nurse'] == "1") : ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/setup?r=nurse">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            School Nurse
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>