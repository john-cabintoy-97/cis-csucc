<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">User Management pages</h6>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/users'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/users">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Dashboard </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(0.000000, 148.000000)">
                                <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Main</span>
    </a>
</li>
<?php if (isset($permission['mn_students']) && $permission['mn_students'] == "1") : ?>
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs">components</h6>
</li>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'students'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/users?r=students">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" />
                <path class="color-background" d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Students</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['mn_faculty']) && $permission['mn_faculty'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'faculty'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/users?r=faculty">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" />
                <path class="color-background" d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Faculty</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['mn_employee']) && $permission['mn_employee'] == "1") : ?>
<li class="nav-item ">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'employee'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/users?r=employee">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" />
                <path class="color-background" d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" />
            </svg>
        </div>

        <span class="nav-link-text ms-1">Emloyee</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'personnel'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/users?r=personnel">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M43.281,27.487V8.115C33.105,7.944,24.292,0.008,24.292,0.008S15.479,7.944,5.303,8.115H4.719v18.897  c0,0.803,0.186,2.161,0.187,2.165c0.604,3.032,3.658,11.327,19.091,18.794c0.001,0.007,0.003,0.014,0.004,0.021  c0.006-0.004,0.012-0.006,0.019-0.009c0.006,0.003,0.012,0.005,0.018,0.009c0.002-0.007,0.003-0.014,0.004-0.021  c15.244-7.375,18.408-15.556,19.065-18.678C43.223,28.742,43.281,27.487,43.281,27.487z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Clinic Personnel</span>
    </a>
</li>
<?php endif; ?>
<li class="nav-item d-nonex">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/users'  ? 'active' : ''; ?>" href="<?= URL; ?>admin">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #101820;
                        }
                    </style>
                </defs>

                <g data-name="Layer 50" id="Layer_50">
                    <path class="color-background" class="cls-1" d="M30,29a1,1,0,0,1-.81-.41l-2.12-2.92A18.66,18.66,0,0,0,15,18.25V22a1,1,0,0,1-1.6.8l-12-9a1,1,0,0,1,0-1.6l12-9A1,1,0,0,1,15,4V8.24A19,19,0,0,1,31,27v1a1,1,0,0,1-.69.95A1.12,1.12,0,0,1,30,29ZM14,16.11h.1A20.68,20.68,0,0,1,28.69,24.5l.16.21a17,17,0,0,0-15-14.6,1,1,0,0,1-.89-1V6L3.67,13,13,20V17.11a1,1,0,0,1,.33-.74A1,1,0,0,1,14,16.11Z" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Go Back</span>
    </a>
</li>