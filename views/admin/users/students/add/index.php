<?php

$type_list = $controllers->getAllType();
?>
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

            <div class="card-body p-3">
                <h4 class="card-title">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-success">ADD STUDENTS FORM</h5>
                        <a href="<?= URL ?>admin/users?r=students" class="btn bg-gradient-secondary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </h4>
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-5">
                        <form role="form" method="post" id="createStudent">

                            <div class="mb-2">
                                <label>ID number <span style="color:red">*</span></label>
                                <div class="mb-2">
                                    <input type="text" name="idnum" class="form-control" placeholder="ID number" aria-label="ID number" aria-describedby="ID-addon">
                                    <div id="sidnumError" class="error-text"></div>
                                </div>

                            </div>
                            <div class="mb-2 row">
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
                            <div class="mb-2 row">
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
                            <div class="mb-2 row">
                                <div class="col-xl-6 col-lg-5 col-md-6">
                                    <label>Course <span style="color:red">*</span></label>
                                    <div class="mb-2">
                                        <select class="form-select " name="course" id="courseCollege">
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
                            <div class="mb-2">
                                <label>Email <span style="color:gray">(Optional)</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Email" id="semail">
                                <div id="semailError" class="error-text"></div>
                            </div>
                            <div class="mb-2">
                                <label>Password <span style="color:gray">(Password default: abcde12345)</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Password" value="abcde12345">
                                <div id="spasswordError" class="error-text"></div>
                            </div>
                            <input type="hidden" name="createStudentSubmit">
                            <div class="text-center">
                                <button type="submit" name="studentButton" class="btn bg-gradient-success w-100 mt-4 mb-0">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>