<?php
$unit_drop = $controllers->getAllUnitMeasure();
?>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">ADD EQUIPMENT FORM</h5>
                        <a href="<?= URL ?>admin/inventory?r=equipment  " class="btn bg-gradient-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-5">
                        <form role="form" method="post" id="createEquipment">

                            <div class="mb-2">
                                <label>Article</label>
                                <input type="text" class="form-control" name="article" id="article">
                                <div id="articleError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Description</label>
                                <textarea name="desc" class="form-control" id="desc" cols="15" rows="3"></textarea>
                                <div id="descError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Property Number</label>
                                <input type="text" class="form-control" name="pro_num" id="pro_num">
                                <div id="pronumError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Unit Measure</label>
                                <select class="form-select " name="unit_measure" id="unit_measure">
                                    <option value="" selected></option>
                                    <?php foreach ($unit_drop as $lists) : ?>
                                        <option value="<?= $lists->um_id; ?>">
                                            <?= $lists->unit_name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="umeasureError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Unit Value</label>
                                <input type="text" class="form-control" name="unit_val" id="unit_val">
                                <div id="uvalueError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Quantity Property</label>
                                <input type="number" class="form-control" name="qty_pro" id="qty_pro" value="1">
                                <div id="qproError" class="error-text"></div>
                            </div>
                            <input type="hidden" name="createEquipmentSubmit">
                            <div class="text-center">
                                <button type="submit" name="equipmentButton" class="btn bg-gradient-success w-100 mt-4 mb-0">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>