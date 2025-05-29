<?php
if (isset($_SESSION['cis-admin-exist'])) {
    header('location:' . URL);
}

?>
<section>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-6 d-flex flex-column mx-auto bg-white m-3">
                    <div class="card card-plain ">
                        <div class="card-header mb-0 pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-success text-gradient">Setup Wizard</h3>
                            <p class="m-0 text-dark ">Welcome to the setup-wizard of <strong>CIS-CSUCC</strong> web application.
                            </p>
                            <small>To proceed or access our system, you need to create an account first.</small>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" id="createDatabase">

                                <div class="mb-2">
                                    <label style="font-size: 15px">Username <span style="color:red">*</span></label>
                                    <div class="mb-2">
                                        <input type="text" name="username" class="form-control" placeholder="Ex. admin">
                                        <div id="usernameError" class="error-text"></div>
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
                                <div class="mb-2">
                                    <label style="font-size: 15px">Password <span style="color:red">*</span></label> <br>
                                    <span style="font-size: 13px">To maintain the confidentiality and integrity of our system, it is essential to choose a strong and unique password</span>
                                    <div class="mb-2">
                                        <input type="password" name="password" class=" form-control" placeholder="Enter password">
                                        <div id="usernameError" class="error-text"></div>
                                    </div>
                                </div>
                                <hr>
                                <small>
                                    Remember, it's important to avoid using common phrases, personal information, or easily guessable patterns. Your password should be memorable to you but hard for others to guess. Thank you for your cooperation in maintaining the security of our system.
                                </small>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">Create</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>