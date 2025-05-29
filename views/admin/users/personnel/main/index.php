<?php
$personnel_list = $controllers->getAllPatient();

?>
<style>
    .dropdown-toggle::after {
        display: none !important;
    }

    .dropdown-toggle i {
        font-weight: bold !important;
    }

    #personnelTable thead {
        height: 5px !important;
        font-size: 13px;
        margin: 0px !important;
    }

    .my-table {
        width: 100%;
        margin-top: 10px;
        border: 1px solid #A2A2A2;
    }

    .my-table td {
        border: 1px solid #A2A2A2;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <form id="personnelForm" method="post">
            <div class="card">
                <div class="card-body p-3">
                    <h4 class="card-title">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0 font-weight-bold text-success">PERSONNEL AND ADMINISTRATOR MANAGEMENT</h5>

                            <div class="d-flex gap-2">
                                <button type="button" name="newPersonnel" id="newPersonnel" class="btn btn-sm bg-gradient-success">New</button>
                                <button type="submit" name="savePersonnel" class="btn btn-sm bg-gradient-success" disabled>Save</button>

                                <button type="submit" name="updatePersonnel" class="btn btn-sm bg-gradient-success d-none" disabled>Update</button>
                                <button type="button" name="deletePersonnel" id="deletePersonnel" class="btn btn-sm bg-gradient-success d-noxne" disabled>Delete</button>
                                <button type="button" onclick="location.reload();" name="cancelPersonnel" class="btn btn-sm bg-gradient-success" disabled>Cancel</button>
                            </div>
                        </div>
                    </h4>
                    <div class="row">
                        <div class=" col-xl-12 col-sm-12">
                            <input type="hidden" name="patient_pass_id" id="patient_pass_id">
                        </div>
                        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                            <?php include_once "mform.php"; ?>
                            <?php include_once "mtable.php"; ?>
                        </div>
                        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                            <?php include_once "permission.php"; ?>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
</div>