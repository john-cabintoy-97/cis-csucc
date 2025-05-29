<?php
$equipment_list = $controllers->getAllEquipment();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">EQUIPMENT LIST</h5>
                        <a href="<?= URL ?>admin/inventory?r=equipment&add" class="btn bg-gradient-success"><i class="fa fa-plus-square"></i>&nbsp;Add new equipment</a>
                    </div>
                </h4>
                <div class="table-responsived">
                    <table id="datatable" class="table table-borderless">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th style="width:50px">#</th>
                                <th>Article</th>
                                <th>Description</th>
                                <th>Property Number</th>
                                <th>Unit Measure</th>
                                <th>Unit Value</th>
                                <th>Quantity Property</th>
                                <th style="width:100px">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Article</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $counter = 1;

                            foreach ($equipment_list as $lists) :
                                $unit = $controllers->getByIdUnitMeasure($lists->um_id);
                            ?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= $lists->article; ?></td>
                                    <td><?= $lists->description; ?></td>
                                    <td><?= $lists->property_num; ?></td>
                                    <td><?= $unit->unit_name; ?></td>
                                    <td><?= $lists->unit_value; ?></td>
                                    <td><?= $lists->quantity_property; ?></td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-center">
                                            <button class="btn btn-secondary btn-custom btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <div class="dropdown-item">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <a href="<?= URL ?>admin/inventory?r=equipment&edit=<?= $controllers->urlEncode($lists->equipment_id); ?>" class="btn btn-sm btn-warning "><i class="fa fa-pencil-square-o"></i></a>
                                                        <button type="button" onclick="deleteEquipment(<?= $lists->equipment_id; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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