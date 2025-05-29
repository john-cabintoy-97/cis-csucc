<?php

$controllers = new AdminModel();
$inv_medicine = $controllers->getAllMedicineInventory();
$drop_medicine = $controllers->getAllMedicine();
$type_list = $controllers->getAllType();
?>

<form method="post" id="mstocks_form">
    <div class="card rounded-2">
        <div class="card-body">
            <h4 class="card-title">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-success">STOCK MEDICINE</h5>
                    <div class="d-flex gap-2">
                        <button type="submit" name="saveStocks" class="btn btn-sm bg-gradient-success" disabled>Save</button>
                        <button type="submit" name="updateStocks" class="btn btn-sm bg-gradient-success" disabled>Update</button>
                        <button type="button" onclick="location.reload();" name="cancelStocks" class="btn btn-sm bg-gradient-success" disabled>Cancel</button>
                    </div>
                </div>
            </h4>
            <div class="row">
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 ">
                    <div class="card bg-gradient-success" style="background:#D8EBE0">
                        <div class="card-body p-1 ">
                            <div class="p-2">
                                <h6 class="m-0 p-1 rounded-2 font-weight-bold bg-gradient-success  text-white">&nbsp;MEDICINE</h6>
                                <div class="p-1">
                                    <div class="p-1 d-flex gap-2 justify-content-evenly align-items-center">
                                        <label>Search</label>
                                        <div class="input-group input-group-sm p-1 mb-1">
                                            <select class="form-select " name="search_medicine" id="search_medicine">
                                                <option value="" selected></option>
                                                <?php foreach ($drop_medicine as $lists) : ?>
                                                    <option value="<?= $lists->md_id; ?>">
                                                        <?= $lists->med_generic . ', ' . $lists->med_brand; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-secondary rounded-2 m-2">
                                <div class="p-1">
                                    <small class="p-2">Result:</small>
                                </div>
                                <div class="d-flex align-items-center p-1 gap-2">
                                    <label class="w-40 d-flex justify-content-end ">Generic Name</label>
                                    <div class="input-group input-group-sm p-1 ">
                                        <input type="text" class="form-control text-uppercase fw-bold" name="gname" readonly>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-1 gap-2">
                                    <label class="w-40 d-flex justify-content-end ">Brand</label>
                                    <div class="input-group input-group-sm p-1 ">
                                        <input type="text" class="form-control text-uppercase fw-bold" name="bname" readonly>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-1 gap-2">
                                    <label class="w-40 d-flex justify-content-end ">Dosage</label>
                                    <div class="input-group input-group-sm p-1 ">
                                        <input type="text" class="form-control text-uppercase fw-bold" name="dosage" readonly>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-1 gap-2">
                                    <label class="w-40 d-flex justify-content-end ">Type</label>
                                    <div class="input-group input-group-sm p-1 ">
                                        <select class="form-select text-uppercase fw-bold" name="type" id="type" disabled>
                                            <option value="" selected></option>
                                            <?php foreach ($type_list as $lists) : ?>
                                                <option value="<?= $lists->type_id; ?>">
                                                    <?= $lists->type_name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="d-flex align-items-center p-1 gap-2">
                                    <label class="w-40 d-flex justify-content-end ">Description</label>
                                    <div class="input-group input-group-sm p-1 ">
                                        <input type="text" class="form-control text-uppercase fw-bold" name="description" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">

                    <div class="card " style="background:#D8EBE0">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center p-1 gap-2">
                                <label class="w-40 d-flex justify-content-end ">Batch Date</label>
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="date" class="form-control" name="bdate" disabled required>
                                </div>
                            </div>

                            <div class="d-flex align-items-center p-1 gap-2">
                                <label class="w-40 d-flex justify-content-end ">Expiry Date</label>
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="date" class="form-control" name="edate" disabled required>

                                </div>
                            </div>
                            <div class="d-flex align-items-center p-1 gap-2">
                                <label class="w-40 d-flex justify-content-end ">Total Count</label>
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="number" class="form-control" name="tcount" id="tcount" disabled required>

                                </div>
                            </div>
                            <div class="d-flex align-items-center p-1 gap-2">
                                <label class="w-40 d-flex justify-content-end ">Total Issued</label>
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="number" class="form-control" name="tissued" value="0" disabled required>

                                </div>
                            </div>
                            <div class="d-flex align-items-center p-1 gap-2">
                                <label class="w-40 d-flex justify-content-end ">Total Available</label>
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="number" class="form-control" name="tavailable" id="tavailable" disabled required>

                                </div>
                            </div>
                            <div class="d-flex align-items-center p-1 gap-2">
                                <label class="w-40 d-flex justify-content-end ">Order Level</label>
                                <div class="input-group input-group-sm p-1 ">
                                    <input type="number" class="form-control" name="olevel" disabled required>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12 col-sm-6 mb-xl-0 mt-4">

                    <div class="card">
                        <div class="card-body p-2">

                            <div class="table-responsived" style="width:100% !important">
                                <table id="mStockTable" class="table table-borderless w-100">
                                    <thead class="bg-gradient-success text-white" style="padding: 0px !important;">
                                        <tr>

                                            <th>No.</th>
                                            <th class="d-none"></th>
                                            <th>Medicine</th>
                                            <th>Batch Date</th>
                                            <th>Expiry Date</th>
                                            <th>Total Count</th>
                                            <th>Total Issued</th>
                                            <th>Available</th>
                                            <th>Order Level</th>
                                            <th>Action</th>


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
                                                <td>
                                                    <button type="button" onclick="deleteInvMedicine(<?= $lists->inv_id; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                                </td>

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
    </div>
</form>