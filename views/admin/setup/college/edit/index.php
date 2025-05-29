<?php

$data = $controllers->getByIdCollege($controllers->urldecode($_GET['edit']));

?>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">EDIT COLLEGE FORM</h5>
                        <a href="<?= URL ?>admin/setup?r=college" class="btn bg-gradient-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-5">
                        <form role="form" method="post" id="editCollege">
                            <div class="mb-2">
                                <label>College Name</label>
                                <input type="text" class="form-control" name="college" id="college" value="<?= $data->college_name; ?>">
                                <div id="collegeError" class="error-text"></div>
                            </div>
                            <input type="hidden" name="college_id" id="college_id" value="<?= $controllers->urldecode($_GET['edit']); ?>">
                            <input type="hidden" name="updateCollegeSubmit">
                            <div class="text-center">
                                <button type="submit" name="collegeButton" class="btn bg-gradient-success w-100 mt-4 mb-0">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>