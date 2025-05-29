<?php

$data = $controllers->getByIdMedicine($controllers->urldecode($_GET['edit']));
$type_list = $controllers->getAllType();
?>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">EDIT MEDICINE FORM</h5>
                        <a href="<?= URL ?>admin/inventory?r=medicine" class="btn bg-gradient-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-5">
                        <form role="form" method="post" id="editMedicine">
                            <div class="mb-2">
                                <label>Generic Name</label>
                                <input type="text" class="form-control" name="gname" id="gname" value="<?= $data->med_generic; ?>">
                                <div id="gnameError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Brand Name</label>
                                <input type="text" class="form-control" name="bname" id="bname" value="<?= $data->med_brand; ?>">
                                <div id="bnameError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" id="description" value="<?= $data->med_desc; ?>">
                                <div id="descriptionError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Dosage</label>
                                <input type="text" class="form-control" name="dosage" id="dosage" value="<?= $data->med_dose; ?>">
                                <div id="dosageError" class="error-text"></div>
                            </div>

                            <div class="mb-2">
                                <label>Type</label>
                                <select class="form-select " name="type" id="type">
                                    <option value="" selected></option>
                                    <?php foreach ($type_list as $lists) : ?>
                                        <option value="<?= $lists->type_id; ?>" <?= $lists->type_id ==  $data->med_type ? 'selected' : ''; ?>>
                                            <?= $lists->type_name; ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                                <div id="typeError" class="error-text"></div>
                            </div>
                            <input type="hidden" name="md_id" id="md_id" value="<?= $controllers->urldecode($_GET['edit']); ?>">
                            <input type="hidden" name="updateMedicineSubmit">
                            <div class="text-center">
                                <button type="submit" name="medicineButton" class="btn bg-gradient-success w-100 mt-4 mb-0">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>