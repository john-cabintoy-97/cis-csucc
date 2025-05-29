<?php
$student_list = $controllers->getAllPatient();
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
                        <h5 class="m-0 font-weight-bold text-success">STUDENTS LIST</h5>
                        <a href="<?= URL ?>admin/users?r=students&add" class="d-nonex btn bg-gradient-success"><i class="fa fa-plus-square"></i>&nbsp;Add new student</a>
                    </div>
                </h4>
                <div class="table-responsived">
                    <table id="datatable" class="table table-borderless">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th style="width:50px">#</th>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Course</th>
                                <th>College</th>
                                <th class="d-one" style="width:160px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1;

                            foreach ($student_list as $lists) : ?>
                                <?php if ($lists->patient_type == 'student') :
                                    $co = $controllers->getByIdCollege($lists->patient_college_id);
                                    $cs = $controllers->getByIdCourse($lists->patient_course_id);
                                ?>
                                    <tr>
                                        <td><?= $counter++; ?></td>
                                        <td><?= $lists->patient_idno; ?></td>
                                        <td><?= $lists->patient_fname . ' ' . $lists->patient_lname . ', ' .  $lists->patient_mname; ?></td>
                                        <td><?= $lists->patient_age; ?></td>
                                        <td><?= $lists->patient_gender; ?></td>
                                        <td><?= $cs->course_name; ?></td>
                                        <td><?= $co->college_name; ?></td>
                                        <td class="d-one">
                                            <div class="dropdown d-flex justify-content-center">
                                                <button class="btn btn-secondary btn-custom btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <div class="dropdown-item">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <a href="<?= URL ?>admin/users?r=students&edit=<?= $controllers->urlEncode($lists->patient_id); ?>" class="btn btn-sm btn-warning "><i class="fa fa-pencil-square-o"></i></a>
                                                            <button onclick="deleteStudent(<?= $lists->patient_id; ?>)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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