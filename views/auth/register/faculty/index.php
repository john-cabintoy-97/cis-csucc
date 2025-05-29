<div class="card card-plain  bg-white " style="border-radius: 0px !important;">

    <div class="card-body ">
        <form role="form" method="POST" id="reg_faculty">
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-6 ">
                    <label>ID number <span style="color:red">*</span></label>
                    <div class="mb-2">
                        <input type="text" name="idnum" class="form-control" placeholder="ID number" aria-label="ID number" aria-describedby="ID-addon">
                        <div id="fidnumError" class="error-text"></div>
                    </div>

                </div>

                <div class="col-xl-12 col-lg-5 col-md-6 row">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Firstname <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="fname" placeholder="Firstname">
                            <div id="ffnameError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Lastname <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="lname" placeholder="Lastname">
                            <div id="flnameError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Middle name</label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="mname" placeholder="Middle name">
                            <div id="fmnameError" class="error-text"></div>
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
                            <div id="fsexError" class="error-text"></div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Age <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="age" placeholder="Age">
                            <div id="fageError" class="error-text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 row">
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <label>College <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <select class="form-select " name="college">
                                <option value="" selected></option>
                                <?php foreach ($college_drop as $lists) : ?>
                                    <option value="<?= $lists->college_id; ?>">
                                        <?= $lists->college_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div id="fcollegeError" class="error-text"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-5 col-md-6 row d-flex align-items-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 " id="emailFContainer">
                        <label>Email <span style="color:red">*</span></label>
                        <div class="mb-2 ">
                            <input type="email" name="email" class="form-control" placeholder="Email" id="femail">
                            <div id="femailError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 d-none" id="otpFContainer">
                        <label>OTP <span style="color:red">*</span></label>
                        <div class="mb-2 ">
                            <input type="text" class="form-control" placeholder="OTP" oninput="verifyFOTP(this)" name="otp" id="fotp">
                            <div id="fotpError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex align-items-center  gap-2" id="fbtnContainer">
                        <i class="fas fa-check-circle mt-4 d-none " style="color:green" id="fok"></i>
                        <button id="fac_btn" name="fac_btn" class="btn btn-secondary mb-lg-0 mt-lg-4 mb-sm-4" onclick="sendFOTP(this)" type="button">SEND OTP</button>
                    </div>


                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 ">
                    <label>Password <span style="color:red">*</span></label>
                    <div class="mb-2">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div id="fpasswordError" class="error-text"></div>
                    </div>
                </div>
                <input type="hidden" name="fac_status" id="fac_status">
                <div class="col-xl-12 col-lg-5 col-md-6">
                    <div class="text-center">
                        <button type="submit" name="cisBtnFacul" class="btn bg-gradient-success w-50 mt-4 mb-0">Register as faculty</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>