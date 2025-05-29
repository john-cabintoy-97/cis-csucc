<form id="consultationForm" method="post">

    <div class="card " style="background:#D8EBE0">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-xl-12 col-sm-6 mb-xl-0">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" name="cnew" id="cnew" class="btn btn-sm bg-gradient-success">New</button>
                        <button type="submit" name="csave" class="btn btn-sm bg-gradient-success" disabled>Save</button>
                        <button type="button" name="ccancel" onclick="location.reload();" class="btn btn-sm bg-gradient-success" disabled>Cancel</button>
                    </div>
                </div>
                <div class="col-xl-7 col-sm-6 mb-xl-0">
                    <div class=" d-flex align-items-center gap-2 ">
                        <label class="w-40">Date</label>
                        <div class="input-group input-group-sm p-1 mt-1 mb-1">
                            <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" id="cdate" name="cdate" disabled>
                        </div>
                    </div>
                    <div id="cdateError" class="error-text"></div>
                    <div class="d-flex align-items-center gap-2">
                        <label class="w-40">Semester</label>
                        <div class="input-group input-group-sm p-1 mb-1">
                            <select class="form-select" id="csemester" name="csemester" disabled>
                                <option value="1" <?= ($currentMonth >= 1 && $currentMonth <= 6) ? 'selected' : ''; ?>>1st Semester</option>
                                <option value="2" <?= ($currentMonth >= 7 && $currentMonth <= 12) ? 'selected' : ''; ?>>2nd Semester</option>
                            </select>

                        </div>
                    </div>
                    <div id="csemesterError" class="error-text"></div>
                    <div class="d-flex align-items-center gap-2">
                        <label class="w-40">School Year</label>
                        <div class="input-group input-group-sm p-1 mb-1">
                            <input type="number" class="form-control" value="<?= date('Y'); ?>" id="cschool_year" name="cschool_year" disabled>
                        </div>
                        <div id="cschool_yearError" class="error-text"></div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <label class="w-40">Time</label>
                        <div class="input-group input-group-sm p-1 mb-1">
                            <input type="time" class="form-control" value="<?= date('H:i'); ?>" id="ctime" name="ctime" disabled>
                        </div>
                        <div id="ctimeError" class="error-text"></div>
                    </div>
                    <small class="custom-font-size-xs d-flex justify-content-end w-100 d-none">(ex.01:10 AM/PM)</small>
                </div>
                <div class="col-xl-5 col-sm-6 mb-xl-0 ">
                    <div class="mt-2 m-1 border border-secondary">
                        <div class="d-flex align-items-center gap-1">
                            <label class="w-40">Temp.</label>
                            <div class="input-group input-group-sm p-1 mb-1">
                                <input type="number" class="form-control" name="ctemp" disabled>
                            </div>
                            <label class="w-40">°C</label>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <label class="w-40">Pulse</label>
                            <div class="input-group input-group-sm p-1 mb-1">
                                <input type="number" class="form-control" name="cpulse" disabled>
                            </div>
                            <label class="w-40">b/m</label>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <label class="w-40">RR</label>
                            <div class="input-group input-group-sm p-1 mb-1">
                                <input type="number" class="form-control" name="crr" disabled>
                            </div>
                            <label class="w-40">br/m</label>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <label class="w-40">BP</label>
                            <div class="d-flex align-items-center">
                                <div class="input-group input-group-sm p-1 mb-1">
                                    <input type="text" class="form-control" name="cbp1" disabled>
                                </div>
                                <p class="mt-2">/</p>
                                <div class="input-group input-group-sm p-1 mb-1">
                                    <input type="text" class="form-control" name="cbp2" disabled>
                                </div>
                            </div>
                            <label class="w-40">mmHg</label>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-6 mb-xl-0">
                    <div class=" d-flex align-items-center gap-2 ">
                        <label>Complaint</label>
                        <div class="input-group input-group-sm p-1 mb-1">
                            <select class="form-select fw-bold" name="ccomplaint" id="select-field" disabled>
                                <option value="" selected></option>
                                <?php foreach ($drop_illness as $lists) : ?>
                                    <option value="<?= $lists->illness_id; ?>">
                                        <?= $lists->illness_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div id="ccomplaintError" class="error-text"></div>
                    </div>

                </div>
                <div class="col-xl-12 col-sm-6 mb-xl-0">
                    <div class=" d-flex justify-content-between align-items-center gap-2 ">
                        <div class="d-flex align-items-center w-100 gap-1">
                            <label>Medication</label>
                            <div class="input-group input-group-sm p-1 mb-1">
                                <select class="form-select fw-bold " name="cmedicine" id="cmedicine" disabled>
                                    <option value="" selected></option>
                                    <?php
                                    $current_date = date('Y-m-d');
                                    foreach ($drop_inv_m as $lists) :
                                        $md = $controllers->getByIdMedicine($lists->inv_med_id);
                                    ?>
                                        <?php if ($lists->inv_expiration > $current_date) : ?>
                                            <option value="<?= $lists->inv_id . '/' . $lists->inv_remaining; ?>">
                                                <?= $md->med_generic  . ', ' . $md->med_brand; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="input-group input-group-sm p-1 ">
                                <input type="number" class="form-control" name="cqty" value="1" placeholder="Qty" min="1" disabled>
                            </div>
                            <button id="addButton" style="margin-top: 12px;" class=" btn btn-sm btn-secondary" name="addButton" type="button" disabled>Add</button>

                        </div>
                    </div>
                    <div class="border border-secondary mb-2">
                        <div class="table-responsived">
                            <table id="cmedicineTable" class="table table-borderless">
                                <thead class="bg-gradient-success text-white m-0" style="padding: 0px !important;">
                                    <tr>
                                        <th style="width:100px">Item</th>
                                        <th>Medicine</th>
                                        <th>Qty</th>
                                        <th style="width:100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex align-items-center ">
                        <label class="w-20">Action Taken</label>
                        <div class="input-group input-group-sm p-1 mb-1">
                            <input type="text" class="form-control" name="ctaken" disabled>
                        </div>
                        <div id="ctakenError" class="error-text"></div>
                    </div>
                    <div class="d-flex align-items-center ">
                        <label class="w-20">Remarks</label>
                        <div class="input-group input-group-sm p-1 mb-1">
                            <input type="text" class="form-control" name="cremark" disabled>
                            <div id="cremarkError" class="error-text"></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center ">
                        <label class="w-20">In Charge</label>
                        <div class="input-group input-group-sm p-1 mb-1">
                            <input type="text" class="form-control" name="cconsultans" disabled>
                            <div id="cconsultansError" class="error-text"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>