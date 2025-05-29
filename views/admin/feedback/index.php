<?php
$controllers = new AdminModel();

$patient_list = $controllers->getAllPatient();
$feedback_list = $controllers->getAllFeedBack();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }

    #datatable_feedback thead {
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
                        <h5 class="m-0 font-weight-bold text-success">PATIENT FEEDBACK / REPORT</h5>
                        <a href="<?= URL ?>admin" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <hr>
                <div class="row mt-2 g-3 ">

                    <div class="col-auto row">
                        <div class="col-auto">
                            <label class="form-control-plaintext">Filter Year:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1">
                                <select class="form-select" id="feedback-sy" style="width:12em">
                                    <option value="all">All</option>
                                    <?php
                                    $addedValues = array();
                                    foreach ($feedback_list as $lists) {
                                        $value = date("Y", strtotime($lists->timestamp));
                                        if (!in_array($value, $addedValues)) {
                                            $addedValues[] = $value;
                                    ?>
                                            <option value="<?= $value ?>"><?= $value ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable_feedback" class="table table-borderless w-100">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th>No.</th>
                                <th class="d-none exclude-print">Timestamp</th>
                                <th class="d-none exclude-print">College</th>
                                <th>ID Number</th>
                                <th>FeedBack</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1;
                            foreach ($feedback_list as $lists) {
                                $pt = $controllers->getByIdPatient($lists->patient_id);
                                $cl = $controllers->getByIdCollege($pt->patient_college_id);

                            ?>
                                <tr>
                                    <td><?= $counter++; ?></td>
                                    <td class="d-none"><?= $lists->timestamp; ?></td>
                                    <td class="d-none"><?= $cl->college_name; ?></td>
                                    <td><?= $pt->patient_idno; ?></td>

                                    <td><?= ucfirst($lists->comment); ?></td>

                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>