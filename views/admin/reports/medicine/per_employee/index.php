<?php
$treatment_list = $controllers->getAllTreatment();
?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }

    #datatable_per_stud thead {
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
                        <h5 class="m-0 font-weight-bold text-success">MEDICINE CONSUMED PER EMPLOYEE REPORT</h5>
                        <a href="<?= URL ?>admin/reports?r=medicine" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <hr>
                <div class="row mt-2 g-3">

                    <div class="col-auto row ">
                        <div class="col-auto">
                            <label class="form-control-plaintext">Search ID Number:</label>
                        </div>
        
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <input type="search" class="form-control" style="width:17em" id="indv-filter">
                            </div>
                        </div>
                      
                    </div>

                </div>
                <hr>
                <div id="printContainer">
                   
                    <div class="table-responsived">
                        <table id="datatable_per_em" class="table table-borderless w-100">
                            <thead class="bg-gradient-success text-white">
                                <tr>
                                    <th>No.</th>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Medicine & Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1;
                                foreach ($treatment_list as $lists) :
                                    $patient = $controllers->getByIdPatient($lists->treat_patient_id);
                                ?>
                                    <?php if ($lists->treat_med != '' && $patient->patient_type == 'employee') : ?>
                                        <tr>
                                            <td><?= $counter++ ?></td>
                                            <td><?= $patient->patient_idno ?></td>
                                            <td><?= strtoupper($patient->patient_lname) . ', ' . strtoupper($patient->patient_fname) . ' ' . strtoupper($patient->patient_mname); ?></td>
                                            <td><?= $lists->treat_date ?></td>
                                            <td><?= $lists->treat_med ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>