<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">ADD COLLEGE FORM</h5>
                        <a href="<?= URL ?>admin/setup?r=office" class="btn bg-gradient-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-5">
                        <form role="form" method="post" id="createOffice">
                            <div class="mb-2">
                                <label>Office Name</label>
                                <input type="text" name="office" id="office" class="form-control">
                                <div id="officeError" class="error-text"></div>
                            </div>
                            <input type="hidden" name="createOfficeSubmit">
                            <div class="text-center">
                                <button type="submit" name="officeButton" class="btn bg-gradient-success w-100 mt-4 mb-0">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>