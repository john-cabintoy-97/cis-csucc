<div class="card card-plain  bg-white " style="border-radius: 0px !important;">

    <div class="card-body ">
        <form role="form" method="POST" id="reg_employee">
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-6 ">
                    <label>ID number <span style="color:red">*</span></label>
                    <div class="mb-2">
                        <input type="text" name="idnum" class="form-control" placeholder="ID number" aria-label="ID number" aria-describedby="ID-addon">
                        <div id="eidnumError" class="error-text"></div>
                    </div>

                </div>

                <div class="col-xl-12 col-lg-5 col-md-6 row">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Firstname <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="fname" placeholder="Firstname">
                            <div id="efnameError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Lastname <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="lname" placeholder="Lastname">
                            <div id="elnameError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Middle name</label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="mname" placeholder="Middle name">
                            <div id="emnameError" class="error-text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 row">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Sex <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <select class="form-select " name="sex">
                                <option value="" selected></option>
                                <option value="male"> Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div id="esexError" class="error-text"></div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Age <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="age" placeholder="Age">
                            <div id="eageError" class="error-text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 row">
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <label>Office <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <select class="form-select " name="office">
                                <option value="" selected></option>
                                <?php foreach ($office_drop as $lists) : ?>
                                    <option value="<?= $lists->office_id; ?>">
                                        <?= $lists->office_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div id="eofficeError" class="error-text"></div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <label>Position <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="position" placeholder="Position">
                            <div id="epositionError" class="error-text"></div>
                        </div>
                    </div>
                </div>
              
                <div class="col-xl-12 col-lg-5 col-md-6 row d-flex align-items-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 " id="emailEContainer">
                        <label>Email <span style="color:red">*</span></label>
                        <div class="mb-2 ">
                            <input type="email" name="email" class="form-control" placeholder="Email" id="eemail">
                            <div id="eemailError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 d-none" id="otpEContainer">
                        <label>OTP <span style="color:red">*</span></label>
                        <div class="mb-2 ">
                            <input type="text" class="form-control" placeholder="OTP" oninput="verifyEOTP(this)" name="otp" id="eotp">
                            <div id="eotpError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex align-items-center  gap-2" id="ebtnContainer">
                        <i class="fas fa-check-circle mt-4 d-none " style="color:green" id="eok"></i>
                        <button id="em_btn" name="em_btn" class="btn btn-secondary mb-lg-0 mt-lg-4 mb-sm-4" onclick="sendEOTP(this)" type="button">SEND OTP</button>
                    </div>


                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 ">
                    <label>Password <span style="color:red">*</span></label>
                    <div class="mb-2">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div id="epasswordError" class="error-text"></div>
                    </div>

                </div>
                <input type="hidden" name="em_status" id="em_status">
                <div class="col-xl-12 col-lg-5 col-md-6">
                    <div class="text-center">
                        <button type="submit" name="cisBtnEmplo" class="btn bg-gradient-success w-50 mt-4 mb-0">Register as employee</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>