<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Consultation pages</h6>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'students'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/consultation?r=students">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" />
                <path class="color-background" d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Students</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'faculty'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/consultation?r=faculty">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" />
                <path class="color-background" d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Faculty</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'employee'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/consultation?r=employee">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg id="Layer_1_1_" style="enable-background:new 0 0 16 16;" version="1.1" viewBox="0 0 16 16" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M12,9H8H4c-2.209,0-4,1.791-4,4v3h16v-3C16,10.791,14.209,9,12,9z" />
                <path class="color-background" d="M12,5V4c0-2.209-1.791-4-4-4S4,1.791,4,4v1c0,2.209,1.791,4,4,4S12,7.209,12,5z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Employee</span>
    </a>
</li>
<li class="nav-item d-nonex">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/consultation'  ? 'active' : ''; ?>" href="<?= URL; ?>admin">
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