<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Setup pages</h6>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/setup'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/setup">
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

<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs">components</h6>
</li>
<?php if (isset($permission['st_college']) && $permission['st_college'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'college'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/setup?r=college">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1" style="enable-background:new 0 0 1024 1024;" version="1.1" viewBox="0 0 1024 1024" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="XMLID_8_">
                    <path class="color-background" d="M508.7,64.1L80.5,287.3v113.9h863v-114L508.7,64.1z M512.6,316.1c-33.8,0-61.2-27.5-61.2-61.2   c0-33.8,27.5-61.2,61.2-61.2s61.2,27.5,61.2,61.2C573.8,288.6,546.4,316.1,512.6,316.1z" id="XMLID_149_" />
                    <polygon class="color-background" id="XMLID_137_" points="928.5,899.8 928.5,959.8 95.5,959.8 95.5,899.8 161,899.8 161,471.9 221,471.9 221,899.8    374.9,899.8 374.9,471.9 434.9,471.9 434.9,899.8 588.8,899.8 588.8,471.9 648.8,471.9 648.8,899.8 802.7,899.8 802.7,471.9    862.7,471.9 862.7,899.8  " />
                </g>
                <g id="XMLID_1_" />
                <g id="XMLID_2_" />
                <g id="XMLID_3_" />
                <g id="XMLID_4_" />
                <g id="XMLID_5_" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">College</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['st_course']) && $permission['st_course'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'course'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/setup?r=course">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <polygon class="color-background" points="0,5 8,9 15,5.5 15,14 16,14 16,5 8,1 " />
                <polygon class="color-background" points="3,7.059 3,11.5 8,14 13,11.5 13,7.059 8,9.559 " />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Course</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['st_office']) && $permission['st_office'] == "1") : ?>
<li class="nav-item ">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'office'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/setup?r=office">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1" style="enable-background:new 0 0 91 91;" version="1.1" viewBox="0 0 91 91" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(304.000000, 151.000000)">
                                <path class="color-background" d="M52.7,19.1H19.9v53.2h32.8V19.1z M34.7,62.2h-3.4v-6.2h3.4V62.2z M34.7,49.7h-3.4v-6.2h3.4V49.7z M34.7,37.3h-3.4v-6.2h3.4   V37.3z M45,62.2h-3.4v-6.2H45V62.2z M45,49.7h-3.4v-6.2H45V49.7z M45,37.3h-3.4v-6.2H45V37.3z" />
                                <path class="color-background" d="M75.2,65.6V40.9l-19.7,0v31.4h13C72.2,72.3,75.2,69.3,75.2,65.6z M67.6,62.3H61V59h6.6V62.3z M67.6,54H61v-3.4h6.6V54z" />
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>

        <span class="nav-link-text ms-1">Office</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['st_illness']) && $permission['st_illness'] == "1") : ?>
<li class="nav-item ">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'illness'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/setup?r=illness">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg enable-background="new 0 0 32 32" id="Glyph" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M17,17c3.314,0,6-2.686,6-6V7c0-2.209-1.791-4-4-4h-8v8C11,14.314,13.686,17,17,17z M13,7  c0-0.552,0.448-1,1-1h6c0.552,0,1,0.448,1,1v4c0,2.209-1.791,4-4,4s-4-1.791-4-4V7z" id="XMLID_991_" />
                <path class="color-background" d="M25,11c0-0.737,0.405-1.375,1-1.722V3c0-0.552,0.447-1,1-1s1,0.448,1,1v6.278c0.595,0.347,1,0.985,1,1.722  c0,1.103-0.897,2-2,2S25,12.103,25,11z" />
                <path class="color-background" d="M6.105,9.553L6.882,8L6.105,6.447c-0.141-0.282-0.141-0.613,0-0.895l1-2c0.248-0.495,0.848-0.695,1.342-0.447  c0.494,0.247,0.694,0.848,0.447,1.342L8.118,6l0.776,1.553c0.141,0.282,0.141,0.613,0,0.895L8.118,10l0.776,1.553  c0.247,0.494,0.047,1.095-0.447,1.342c-0.489,0.244-1.092,0.052-1.342-0.447l-1-2C5.965,10.166,5.965,9.834,6.105,9.553z" />
                <path class="color-background" d="M4.895,11.553c0.247,0.494,0.047,1.095-0.447,1.342c-0.489,0.244-1.092,0.052-1.342-0.447l-1-2  c-0.141-0.282-0.141-0.613,0-0.895L2.882,8L2.105,6.447c-0.141-0.282-0.141-0.613,0-0.895l1-2c0.248-0.495,0.847-0.695,1.342-0.447  c0.494,0.247,0.694,0.848,0.447,1.342L4.118,6l0.776,1.553c0.141,0.282,0.141,0.613,0,0.895L4.118,10L4.895,11.553z" />
                <path class="color-background" d="M29,23v7h-4v-5c0-0.552-0.447-1-1-1s-1,0.448-1,1v5H11v-5c0-0.552-0.447-1-1-1s-1,0.448-1,1v5H5v-7c0-2.209,1.791-4,4-4h16  C27.209,19,29,20.791,29,23z" />
                <path class="color-background" d="M17,11c1.105,0,2,0.895,2,2h-4C15,11.895,15.895,11,17,11z" />
                <path class="color-background" d="M16,9h-2V8h2V9z" />
                <path class="color-background" d="M20,9h-2V8h2V9z" />
            </svg>
        </div>

        <span class="nav-link-text ms-1">Illness</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['st_nurse']) && $permission['st_nurse'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'nurse'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/setup?r=nurse">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" />
                <path class="color-background" d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">School Nurse</span>
    </a>
</li>
<?php endif; ?>
<li class="nav-item d-nonex">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/setup'  ? 'active' : ''; ?>" href="<?= URL; ?>admin">
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