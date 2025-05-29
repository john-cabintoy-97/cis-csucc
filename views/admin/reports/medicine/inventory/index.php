<?php
$inv_medicine = $controllers->getAllMedicineInventory();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }

    #datatable_inventory_report thead {
        height: 5px !important;
        font-size: 13px;
        margin: 0px !important;
    }


    .dataTables_filter {
        display: none;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">MEDICINE INVENTORY REPORT</h5>
                        <a href="<?= URL ?>admin/reports?r=medicine" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <hr>
                <div class="row mt-2 g-3">
                    <div class="col-auto row">
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <select class="form-select" id="filter-option" style="width:12em">
                                    <option value="all">All</option>
                                    <option value="expiry">Expiry Dates</option>
                                    <option value="below_order">Below Order Level</option>
                                    <option value="out_of_stock">Out of Stock</option>
                                    <option value="available">Available</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto row ">
                        <div class="col-auto">
                            <label class="form-control-plaintext">From:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <input type="date" class="form-control" id="from-filter">
                            </div>
                        </div>
                        <div class="col-auto">
                            <label class="form-control-plaintext">To:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <input type="date" class="form-control" id="to-filter">
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div id="printContainer">

                    <div class="table-responsived">
                        <table id="datatable_inventory_report" class="table table-borderless w-100">
                            <thead class="bg-gradient-success text-white">
                                <tr>
                                    <th>No.</th>
                                    <th class="d-none exclude-print">Medicine</th>
                                    <th>Medicine</th>
                                    <th>Bacth Date</th>
                                    <th>Expiry Date </th>
                                    <th>Total Count</th>
                                    <th>Total Issued</th>
                                    <th>Available</th>
                                    <th>Order Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1;

                                foreach ($inv_medicine as $lists) : ?>
                                    <tr>

                                        <td><?= $counter++ ?></td>
                                        <td class="d-none">
                                            <?= $lists->inv_id ?>
                                        </td>
                                        <td><?= $lists->med_generic . ', ' . $lists->med_brand; ?></td>
                                        <td><?= $lists->inv_batchdate; ?></td>
                                        <td><?= $lists->inv_expiration; ?></td>
                                        <td><?= $lists->inv_totalcount; ?></td>
                                        <td><?= $lists->inv_issued; ?></td>
                                        <td><?= $lists->inv_remaining; ?></td>
                                        <td><?= $lists->inv_orderlevel; ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>