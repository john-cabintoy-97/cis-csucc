<?php

$data = $controllers->getEditCourse($controllers->urldecode($_GET['edit']));
$drop_college = $controllers->getAllCollege();

?>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">EDIT COLLEGE FORM</h5>
                        <a href="<?= URL ?>admin/setup?r=course" class="btn bg-gradient-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-5">
                        <form role="form" method="post" id="editCourse">
                            <div class="mb-2">
                                <label>College Name</label>
                                <select class="form-select " name="college" id="college">
                                    <?php foreach ($drop_college as $lists) : ?>
                                        <option value="<?= $lists->college_id; ?>" <?= $lists->college_id == $data->college_id ? 'selected' : '' ?>>
                                            <?= $lists->college_name; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>

                            <div class="mb-2">
                                <label>Course Name</label>
                                <input type="text" class="form-control" name="course" id="course" value="<?= $data->course_name; ?>">
                                <div id="courseError" class="error-text"></div>
                            </div>
                            <input type="hidden" name="course_id" id="course_id" value="<?= $controllers->urldecode($_GET['edit']); ?>">
                            <input type="hidden" name="updateCourseSubmit">
                            <div class="text-center">
                                <button type="submit" name="courseButton" class="btn bg-gradient-success w-100 mt-4 mb-0">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>