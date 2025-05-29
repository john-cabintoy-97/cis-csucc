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

    #datatable_consulatation_report thead {
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
                        <h5 class="m-0 font-weight-bold text-success">TOTAL CONSULTATION/TREATMENT REPORT</h5>
                        <a href="<?= URL ?>admin/reports" class="btn bg-gradient-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <hr>
                <div class="row mt-2 g-3">
                    <div class="col-auto row">

                        <div class="col-auto">
                            <label class="form-control-plaintext">Select:</label>
                        </div>
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <select class="form-select" id="clfilter-type" style="width:12em">
                                    <option value="all">All</option>
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto row">
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1 ">
                                <select class="form-select" id="clfilter-semester" style="width:12em">
                                    <option value="all">All Semester</option>
                                    <option value="1">First Semester</option>
                                    <option value="2">Second Semester</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto row">
                        <div class="col-auto">
                            <div class="input-group input-group-sm p-1">
                                <select class="form-select" id="clfilter-yr" style="width: 12em">
                                    <option value="all">All Range Year</option>
                                    <?php
                                    $yearRanges = array();
                                    foreach ($treatment_list as $lists) {
                                        $date = $lists->treat_date;
                                        $year = date('Y', strtotime($date));
                                        $yearRange = $year . '-' . ($year + 1);
                                        if (!isset($yearRanges[$yearRange])) {
                                            $yearRanges[$yearRange] = true;
                                            echo '<option value="' . $yearRange . '">' . $yearRange . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div id="printContainer">

                    <div class="table-responsived">
                        <table id="datatable_consulatation_report" class="table table-borderless w-100">
                            <thead class="bg-gradient-success text-white">
                                <tr>
                                    <th>No.</th>
                                    <th class="d-none exclude-print">type</th>
                                    <th class="d-none exclude-print">semester</th>
                                    <th class="d-none exclude-print">year</th>
                                    <th>Date</th>
                                    <th>ID No</th>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Course</th>
                                    <th>College/Department</th>
                                    <th>Office</th>
                                    <th>Position</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1;

                                foreach ($treatment_list as $lists) :
                                    $com = $controllers->getByIdIllness($lists->treat_illness_id);
                                    $pat = $controllers->getByIdPatient($lists->treat_patient_id);
                                    $co = $controllers->getByIdCourse($pat->patient_course_id);
                                    $col = $controllers->getByIdCollege($pat->patient_college_id);
                                    $of  = $controllers->getByIdOffice($pat->patient_college_id);
                                ?>

                                    <tr>
                                        <td><?= $counter++; ?></td>
                                        <td class="d-none"><?= $pat->patient_type; ?></td>
                                        <td class="d-none"><?= $lists->treat_semester; ?></td>
                                        <td class="d-none"><?= $lists->treat_year; ?></td>
                                        <td><?= date('m/d/Y', strtotime($lists->treat_date)); ?></td>
                                        <td><?= $pat->patient_idno; ?></td>
                                        <td class="d-noxne"><?= ucfirst($pat->patient_lname) . ', ' . ucfirst($pat->patient_fname); ?></td>
                                        <td><?= ucfirst($pat->patient_gender); ?></td>
                                        <td><?= isset($co->course_name) ? $co->course_name : ''; ?></td>
                                        <td><?= isset($col->college_name) ? $col->college_name : ''; ?></td>
                                        <td><?= isset($of->office_name) ? $of->office_name : ''; ?></td>
                                        <td><?= ucfirst($pat->patient_position) ?></td>

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