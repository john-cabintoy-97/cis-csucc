<div class="card card-plain  bg-white " style="border-radius: 0px !important;">

    <div class="card-body ">
        <form role="form" method="POST" id="reg_student">
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-6 ">
                    <label>ID number <span style="color:red">*</span></label>
                    <div class="mb-2">
                        <input type="text" name="idnum" class="form-control" placeholder="ID number" aria-label="ID number" aria-describedby="ID-addon">
                        <div id="sidnumError" class="error-text"></div>
                    </div>

                </div>

                <div class="col-xl-12 col-lg-5 col-md-6 row">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Firstname <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="fname" placeholder="Firstname">
                            <div id="sfnameError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Lastname <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="lname" placeholder="Lastname">
                            <div id="slnameError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Middle name</label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="mname" placeholder="Middle name">
                            <div id="smnameError" class="error-text"></div>
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
                            <div id="ssexError" class="error-text"></div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <label>Age <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <input type="text" class="form-control" name="age" placeholder="Age">
                            <div id="sageError" class="error-text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 row">
                    <div class="col-xl-6 col-lg-5 col-md-6">
                        <label>Course <span style="color:red">*</span></label>
                        <div class="mb-2">
                            <select class="form-select " name="course" id="courseandCollege">
                                <option value="" selected></option>
                                <?php foreach ($course_drop as $lists) : ?>
                                    <option value="<?= $lists->course_id . '/' . $lists->college_id; ?>">
                                        <?= $lists->course_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div id="scourseError" class="error-text"></div>
                        </div>
                    </div>

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
                            <div id="scollegeError" class="error-text"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 row d-flex align-items-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 " id="emailSContainer">
                        <label>Email <span style="color:red">*</span></label>
                        <div class="mb-2 ">
                            <input type="email" name="email" class="form-control" placeholder="Email" id="semail">
                            <div id="semailError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 d-none" id="otpSContainer">
                        <label>OTP <span style="color:red">*</span></label>
                        <div class="mb-2 ">
                            <input type="text" class="form-control" placeholder="OTP" oninput="verifySOTP(this)" name="otp" id="sotp">
                            <div id="sotpError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex align-items-center  gap-2" id="sbtnContainer">
                        <i class="fas fa-check-circle mt-4 d-none " style="color:green" id="sok"></i>
                        <button id="stud_btn" name="stud_btn" class="btn btn-secondary mb-lg-0 mt-lg-4 mb-sm-4" onclick="sendSOTP(this)" type="button">SEND OTP</button>
                    </div>


                </div>
                <div class="col-xl-12 col-lg-5 col-md-6 ">
                    <label>Password <span style="color:red">*</span></label>
                    <div class="mb-2">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div id="spasswordError" class="error-text"></div>
                    </div>

                </div>
                <input type="hidden" name="stud_status" id="stud_status">
                <div class="col-xl-12 col-lg-5 col-md-6">
                    <div class="text-center">
                        <button type="submit" name="cisBtnStud" class="btn bg-gradient-success w-50 mt-4 mb-0">Register as student</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>