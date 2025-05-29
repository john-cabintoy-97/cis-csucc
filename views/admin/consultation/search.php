<style>
    .res-input {
        background: inherit !important;
        border-top: none !important;
        border-left: none !important;
        border-right:  none !important;
        border-radius: 0px !important;
        border-bottom: 1px solid #BCCDC3;
        box-shadow: none !important;
    }
    .res-input:focus {
        background: inherit !important;
        border-top: none !important;
        border-left: none !important;
        border-right:  none !important;
        border-radius: 0px !important;
        border-bottom: 1px solid #BCCDC3;
        box-shadow: none !important;
    }
</style>
<div class="card bg-gradient-success" style="background:#D8EBE0">
    <div class="card-body p-1 ">
        <form id="searchForm" method="post">
            <div class="p-2">
                <h6 class="m-0 p-1 rounded-2 font-weight-bold bg-gradient-success  text-white">&nbsp;PROFILE <span id="statusProfile"></span></h6>
                <div class="p-1">
                    <div class="p-2 d-flex gap-3 justify-content-evenly align-items-center">
                        <label>Search</label>
                        <div class="d-flex  align-items-center justify-content-between gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="searchMethod" value="id" checked>
                                <label class="form-check-label custom-font-size-xs " for="flexRadioDefault2">
                                    ID Number
                                </label>
                            </div>
                            <div class="form-check d-none">
                                <input class="form-check-input" type="radio" name="searchMethod" value="lastname">
                                <label class="form-check-label custom-font-size-xs " for="flexRadioDefault2">
                                    Lastname
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">

                        <div class="input-group input-group-sm p-2 mb-1">
                            <input type="search" id="searchInput" class="form-control fw-bold" placeholder="Enter ID number">
                        </div>

                    </div>
                </div>
            </div>


            <div class="border border-secondary rounded-2 m-2">
                <div class="p-1">
                    <small class="p-2">Result:</small>
                </div>
                <div class="d-flex align-items-center p-1 gap-2">
                    <label class="w-40 d-flex justify-content-end ">ID Number</label>
                    <div class="input-group input-group-sm p-1 ">
                        <input type="text" class="form-control fw-bold res-input " name="seidnum" disabled>
                    </div>
                </div>
                <div class="d-flex align-items-center p-1 gap-2">
                    <label class="w-40 d-flex justify-content-end ">Name</label>
                    <div class="input-group input-group-sm p-1 ">
                        <input type="text" class="form-control text-uppercase fw-bold res-input" name="sename" disabled>
                    </div>
                </div>
                <div class="d-flex align-items-center p-1 gap-2">
                    <label class="w-40 d-flex justify-content-end ">Gender</label>
                    <div class="input-group input-group-sm p-1 ">
                        <input type="text" class="form-control text-uppercase fw-bold res-input" name="segender" disabled>
                    </div>
                </div>
                <div class="d-flex align-items-center p-1 gap-2">
                    <label class="w-40 d-flex justify-content-end ">Age</label>
                    <div class="input-group input-group-sm p-1 ">
                        <input type="text" class="form-control fw-bold res-input" name="seage" disabled>
                    </div>
                </div>
                <div class="d-none" id="studentField">
                    <div class="d-flex align-items-center p-1 gap-2">
                        <label class="w-40 d-flex justify-content-end ">Course</label>
                        <div class="input-group input-group-sm p-1 ">
                            <select class="form-select fw-bold res-input" name="scourse" disabled>
                                <option value="" selected></option>
                                <?php foreach ($drop_course as $lists) : ?>
                                    <option value="<?= $lists->course_id; ?>">
                                        <?= $lists->course_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-1 gap-2">
                        <label class="w-40 d-flex justify-content-end ">College</label>
                        <div class="input-group input-group-sm p-1 ">
                            <select class="form-select res-input fw-bold" name="scollege" disabled>
                                <option value="" selected></option>
                                <?php foreach ($drop_college as $lists) : ?>
                                    <option value="<?= $lists->college_id; ?>">
                                        <?= $lists->college_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-none" id="facultyField">
                    <div class="d-flex align-items-center p-1 gap-2">
                        <label class="w-40 d-flex justify-content-end ">College</label>
                        <div class="input-group input-group-sm p-1 ">
                            <select class="form-select fw-bold res-input" name="fcollege" disabled>
                                <option value="" selected></option>
                                <?php foreach ($drop_college as $lists) : ?>
                                    <option value="<?= $lists->college_id; ?>">
                                        <?= $lists->college_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-none" id="employeeField">
                    <div class="d-flex align-items-center p-1 gap-2">
                        <label class="w-40 d-flex justify-content-end ">Office</label>
                        <div class="input-group input-group-sm p-1 ">
                            <select class="form-select fw-bold res-input" name="eoffice" disabled>
                                <option value="" selected></option>
                                <?php foreach ($drop_office as $lists) : ?>
                                    <option value="<?= $lists->office_id; ?>">
                                        <?= $lists->office_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center p-1 gap-2">
                        <label class="w-40 d-flex justify-content-end ">Position</label>
                        <div class="input-group input-group-sm p-1 ">
                            <input type="text" class="form-control text-uppercase fw-bold res-input" name="eposition" readonly>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="patient_id" id="patient_id">
            </div>
        </form>
    </div>
</div>