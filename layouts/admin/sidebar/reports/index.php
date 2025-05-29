<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Reports pages</h6>
</li>
<?php if (isset($permission['rep_consultation']) && $permission['rep_consultation'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'consultation'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=consultation">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Consultation & Treatment</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['rep_individual']) && $permission['rep_individual'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'individual'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=individual">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Individual Treatment</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['rep_medicine']) && $permission['rep_medicine'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'medicine'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=medicine">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Medicine</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['rep_health']) && $permission['rep_health'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'doctor'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=doctor">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Doctor</span>
    </a>
</li>
<?php endif; ?>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'resita'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=resita">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Resita Issued</span>
    </a>
</li>

<?php if (isset($permission['rep_registered']) && $permission['rep_registered'] == "1") : ?>
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bold opacity-6">Total REGISTERED</h6>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'student'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=student">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Students</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'faculty'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=faculty">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Faculty</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'employee'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=employee">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Employee</span>
    </a>
</li>
<?php endif; ?>

<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bold opacity-6">Summary</h6>
</li>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'illness'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=illness">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Illness/Complaint</span>
    </a>
</li>
<?php if (isset($permission['rep_health']) && $permission['rep_health'] == "1") : ?>
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bold opacity-6">Logs</h6>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'health'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/reports?r=health">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g>
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="22" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="29" />
                    <rect class="color-background" fill="#241F20" height="4" width="16" x="8.979" y="36" />
                    <path class="color-background" d="M31.979,0h-30v14.167V18v30h30V18h14.043V0H31.979z M27.979,44h-22V18h22V44z M27.979,14h-22V4h22V14z    M37,11.422L33.086,6.62h7.83L37,11.422z" fill="#241F20" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Health Services</span>
    </a>
</li>
<?php endif; ?>

<li class="nav-item d-nonex">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/reports'  ? 'active' : ''; ?>" href="<?= URL; ?>admin">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #101820;
                        }
                    </style>
                </defs>
                <title />
                <g data-name="Layer 50" id="Layer_50">
                    <path class="color-background" class="cls-1" d="M30,29a1,1,0,0,1-.81-.41l-2.12-2.92A18.66,18.66,0,0,0,15,18.25V22a1,1,0,0,1-1.6.8l-12-9a1,1,0,0,1,0-1.6l12-9A1,1,0,0,1,15,4V8.24A19,19,0,0,1,31,27v1a1,1,0,0,1-.69.95A1.12,1.12,0,0,1,30,29ZM14,16.11h.1A20.68,20.68,0,0,1,28.69,24.5l.16.21a17,17,0,0,0-15-14.6,1,1,0,0,1-.89-1V6L3.67,13,13,20V17.11a1,1,0,0,1,.33-.74A1,1,0,0,1,14,16.11Z" />
                </g>
            </svg>
        </div>
        <span class="nav-link-text ms-1">Go Back</span>
    </a>
</li>