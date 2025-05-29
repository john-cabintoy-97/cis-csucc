<div class="card">
    <div class="card-body p-2">
        <div class="table-responsived" style="width:100% !important">
            <table id="personnelTable" class="table table-borderless w-100">
                <thead class="bg-gradient-success text-white" style="padding: 0px !important;">
                    <tr>
                        <th>No.</th>
                        <th class="d-none"></th>
                        <th>Personnel</th>
                        <th>User Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1;

                    foreach ($personnel_list as $lists) :

                    ?>
                        <?php if ($lists->patient_type == 'admin' || $lists->patient_type == 'staff') : ?>
                            <tr>
                                <td><?= $counter++ ?></td>
                                <td class="d-none">
                                    <?= $lists->patient_id ?>
                                </td>
                                <td><?= $lists->username; ?></td>
                                <td><?= $lists->patient_type; ?></td>

                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>