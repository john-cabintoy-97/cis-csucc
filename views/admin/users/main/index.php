<div class="card" style="background: transparent !important">
    <div class="card-body">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-success">USER MANAGEMENT SHORTCUTS</h5>
                <a href="<?= URL ?>admin" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
            </div>
        </h4>
        <div class="row">
            <?php if (isset($permission['mn_students']) && $permission['mn_students'] == "1") : ?>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <a href="<?= URL ?>admin/users?r=students">
                        <div class="card">
                            <div class="card-body p-5">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                Students
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
            <?php if (isset($permission['mn_faculty']) && $permission['mn_faculty'] == "1") : ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/users?r=faculty">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Faculty
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
            <?php if (isset($permission['mn_employee']) && $permission['mn_employee'] == "1") : ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0  mb-4">
                <a href="<?= URL ?>admin/users?r=employee">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Employee
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
            <div class="col-xl-12 col-sm-6 mb-xl-0 mt-5 mb-4">
                <a href="<?= URL ?>admin/users?r=personnel">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Clinic Personnel
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