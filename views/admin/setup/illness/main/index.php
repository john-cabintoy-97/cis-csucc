<?php

$illlness_list = $controllers->getAllIllness();
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
                        <h5 class="m-0 font-weight-bold text-success">ILLNESS LIST</h5>
                        <a href="<?= URL ?>admin/setup?r=illness&add" class="btn bg-gradient-success"><i class="fa fa-plus-square"></i>&nbsp;Add new illness</a>
                    </div>
                </h4>
                <div class="table-responsived">
                    <table id="datatable" class="table table-borderless">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th style="width:100px">#</th>
                                <th>Illness</th>
                                <th style="width:160px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1;

                            foreach ($illlness_list as $lists) : ?>
                                <tr>
                                    <td><?= $counter++ ?></td>
                                    <td><?= $lists->illness_name; ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-custom btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <div class="dropdown-item">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <a href="<?= URL ?>admin/setup?r=illness&edit=<?= $controllers->urlEncode($lists->illness_id); ?>" class="btn btn-sm btn-warning "><i class="fa fa-pencil-square-o"></i></a>
                                                        <button onclick="deleteIllness(<?= $lists->illness_id; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
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