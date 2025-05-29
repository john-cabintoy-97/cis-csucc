<div class="card" style="background: transparent !important">
    <div class="card-body">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-success">INVENTORY SHORTCUTS</h5>
                <a href="<?= URL ?>admin" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
            </div>
        </h4>
        <div class="row">

        <?php if (isset($permission['inv_medicine']) && $permission['inv_medicine'] == "1") : ?>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/inventory?r=medicine">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Medicine Entry
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="fas fa-capsules"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php if (isset($permission['inv_equipment']) && $permission['inv_equipment'] == "1") : ?>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <a href="<?= URL ?>admin/inventory?r=equipment">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Equipment Entry
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="fa-solid fa-vial-virus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php if (isset($permission['inv_stocks']) && $permission['inv_stocks'] == "1") : ?>
            <div class="col-xl-12 col-sm-6 mb-xl-0 mt-3 mb-4">
                <a href="<?= URL ?>admin/inventory?r=mstocks">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Panel</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            Medicine Stocks
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                                        <i class="fas fa-capsules"></i>
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