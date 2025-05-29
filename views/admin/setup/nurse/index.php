<?php

$nurse = $controllers->getNurse();
?>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">SCHOOL NURSE</h5>

                    </div>
                </h4>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-5">
                        <form role="form" method="post" id="schoolNurse">
                            <label>School Nurse Name</label>
                            <div class="mb-2">
                                <input type="text" class="form-control" name="nurse_name" id="nurse_name" value="<?= !empty($nurse) ? $nurse->nurse_name : ''; ?>">
                                <div id="nurseError" class="error-text"></div>
                            </div>
                            <input type="hidden" name="createNurseSubmit">
                            <div class="text-center">
                                <button type="submit" id="nurseButton" class="btn bg-gradient-success w-100 mt-4 mb-0">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>