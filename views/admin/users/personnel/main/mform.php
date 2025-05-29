<div class="card " style="background:#D8EBE0">
    <div class="card-body p-3">
        <div class="d-flex align-items-center p-1 gap-2">
            <label class="w-40 d-flex justify-content-end ">Username</label>
            <div class="input-group input-group-sm p-1 ">
                <input type="text" class="form-control" name="username" disabled required>
            </div>
        </div>

        <div class="d-flex align-items-center p-1 gap-2">
            <label class="w-40 d-flex justify-content-end ">Password</label>
            <div class="input-group input-group-sm p-1 ">
                <input type="password" class="form-control" name="password" disabled required value="abcde12345">

            </div>

        </div>
        <div class="d-flex align-items-center ">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<small>Default Password: (<strong>abcde12345</strong>)</small>
        </div>
        <div class="d-flex align-items-center p-1 gap-2">
            <label class="w-40 d-flex justify-content-end ">Lastname</label>
            <div class="input-group input-group-sm p-1 ">
                <input type="text" class="form-control" name="lname" id="tcount" disabled required>

            </div>
        </div>
        <div class="d-flex align-items-center p-1 gap-2">
            <label class="w-40 d-flex justify-content-end ">Firstname</label>
            <div class="input-group input-group-sm p-1 ">
                <input type="text" class="form-control" name="fname" disabled required>

            </div>
        </div>
        <div class="d-flex align-items-center p-1 gap-2">
            <label class="w-40 d-flex justify-content-end ">Middlename</label>
            <div class="input-group input-group-sm p-1 ">
                <input type="text" class="form-control" name="mname" disabled >

            </div>
        </div>
        <div class="d-flex align-items-center p-1 gap-2">
            <label class="w-40 d-flex justify-content-end ">Sex</label>
            <div class="input-group input-group-sm p-1 ">
                <select class="form-select " name="gender" disabled required>
                    <option value="" selected></option>
                    <option value="male"> Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div id="ssexError" class="error-text"></div>
        </div>
        <div class="d-flex align-items-center p-1 gap-2">
            <label class="w-40 d-flex justify-content-end ">User Type</label>
            <div class="input-group input-group-sm p-1 ">
                <select class="form-select " name="usertype" disabled required>

                    <option value="staff">Staff</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
        </div>
        <input type="hidden" name="save_personnel_action" >
        <input type="hidden" name="update_personnel_action" disabled>
    </div>
</div>