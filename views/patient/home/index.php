<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }
</style>
<div class="page-header min-vh-75">
    <div class="container mt-5 ">
        <div class="row mt-5 ">
            <div class="col-xl-12  mt-5  col-sm-6 mb-xl-0 mb-4">
                <div class="card mb-5">
                    <div class="card-body p-3">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="m-0 font-weight-bold text-success">COMPLAINTS / TREATEMENT HISTORY</h5>
                                <a href="<?= URL ?>patient?page=schedule" class="btn bg-gradient-success"><i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;Schedule</a>
                            </div>
                        </h4>
                        <div class="table-responsived">
                            <table id="datatable_individual" class="table table-borderless w-100">
                                <thead class="bg-gradient-success text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th class="d-none">Type</th>
                                        <th class="d-none">ID number</th>
                                        <th class="d-none">Lastname</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Complaints</th>
                                        <th>Medication</th>
                                        <th>Vital Signs</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1;

                                    foreach ($treatment_list as $lists) :
                                        $com = $controllers->getByIdIllness($lists->treat_illness_id);
                                        $pat = $controllers->getByIdPatient($lists->treat_patient_id);

                                    ?>
                                        <?php if ($_SESSION['cis-patient-id'] == $lists->treat_patient_id) : ?>
                                            <tr>
                                                <td><?= $counter++; ?></td>
                                                <td class="d-none"><?= $pat->patient_type; ?></td>
                                                <td class="d-none"><?= $pat->patient_idno; ?></td>
                                                <td class="d-none"><?= $pat->patient_lname; ?></td>
                                                <td><?= date('m/d/Y', strtotime($lists->treat_date)); ?></td>
                                                <td><?= date('h:m a', strtotime($lists->treat_time)); ?></td>
                                                <td><?= $com->illness_name; ?></td>
                                                <td><?= $lists->treat_med; ?></td>
                                                <td><?= 'T=' . $lists->treat_temp . ', P=' . $lists->treat_pulse . ', RR=' . $lists->treat_rr . ', BP=' . $lists->treat_mm . '/' . $lists->treat_hg; ?></td>

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
</div>