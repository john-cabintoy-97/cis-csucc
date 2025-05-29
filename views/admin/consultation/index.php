<?php
if (!isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'auth?page=login');
}

$controllers = new AdminModel();
$drop_illness = $controllers->getAllIllness();
$drop_medicine = $controllers->getAllMedicine();
$drop_office = $controllers->getAllOffice();
$drop_course = $controllers->getAllCourse();
$drop_college = $controllers->getAllCollege();
$drop_inv_m = $controllers->getAllMedicineInventory();
$list_treat =  $controllers->getAllTreatment();
$currentYear = date('Y');
$currentMonth = date('n');

?>
<style>
    #consulTable thead {
        height: 5px !important;
        font-size: 13px;
        margin: 0px !important;
    }

    #cmedicineTable thead {
        height: 5px !important;
        font-size: 13px;
        margin: 0px !important;
    }

    .select2-selection__rendered {

        border: none !important;
        font-size: 12px !important;

    }

    .dataTables_filter {
        display: none;
    }
</style>


<div class="card rounded-2">
    <div class="card-body">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-success">CONSULTATION PAGES</h5>

            </div>
        </h4>
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 ">
                <?php include_once 'search.php'; ?>
            </div>
            <div class="col-xl-8 col-sm-6 mb-xl-0 mb-4">
                <?php include_once 'form.php'; ?>
            </div>
            <div class="col-xl-12 col-sm-6 mb-xl-0 mt-4">

                <div class="card">
                    <div class="card-body p-2">
                        <div class="card-title">
                            <h6 class="m-0 text-secondary">Consultation / Treatment History</h6>
                        </div>
                        <div class="table-responsived">
                            <table id="consulTable" class="table table-borderless w-100">
                                <thead class="bg-gradient-success text-white" style="padding: 0px !important;">
                                    <tr>

                                        <th>No.</th>
                                        <th class=" d-none">x</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Complaints</th>
                                        <th>Medication</th>
                                        <th>Vital Sign</th>
                                        <th>Action Taken</th>
                                        <th>Remarks</th>
                                        <th>Personnel</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;

                                    foreach ($list_treat as $lists) :
                                        $com = $controllers->getByIdIllness($lists->treat_illness_id);
                                        
                                        $pp = $controllers->getByIdPatient($_SESSION['cis-admin-id']);
                                        $pt = $controllers->getByIdPatient($lists->treat_patient_id);
                                      
                                    ?>
                                        <tr>

                                            <td><?= $counter++ ?></td>
                                            <td class=" d-none"><?= $lists->treat_patient_id; ?></td>
                                            <td><?= date('m/d/Y', strtotime($lists->treat_date)); ?></td>
                                            <td><?= date('h:m a', strtotime($lists->treat_time)); ?></td>
                                            <td><?= $com->illness_name; ?></td>
                                            <td><?= $lists->treat_med; ?></td>
                                            <td><?= 'T=' . $lists->treat_temp . ', P=' . $lists->treat_pulse . ', RR=' . $lists->treat_rr . ', BP=' . $lists->treat_mm . '/' . $lists->treat_hg; ?></td>
                                            <td><?= $lists->treat_action; ?></td>
                                            <td><?= $lists->treat_remarks; ?></td>
                                            <td><?= ucfirst($lists->personnel_custom); ?></td>

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