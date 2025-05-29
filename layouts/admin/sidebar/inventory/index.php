<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Inventory pages</h6>
</li>

<li class="nav-item">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/inventory'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/inventory">
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

<?php if (isset($permission['inv_medicine']) && $permission['inv_medicine'] == "1") : ?>
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs opacity-6">Entry components</h6>
</li>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'medicine'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/inventory?r=medicine">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 64 64" height="64px" id="Layer_1" version="1.1" viewBox="0 0 64 64" width="64px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path class="color-background" d="M55.239,3.555c-6.69-5.466-16.548-4.475-22.018,2.219L6.542,38.425c-5.468,6.69-4.477,16.552,2.216,22.019  c6.694,5.469,16.552,4.478,22.021-2.216l26.678-32.654C62.925,18.882,61.934,9.024,55.239,3.555z M31.896,49.095l-2.92,3.574  c-3.946,4.832-11.17,5.455-16.138,1.396c-0.308-0.252-0.594-0.519-0.87-0.794c-0.532-0.655,0.34-0.804,0.34-0.804l0.01-0.02  c3.082,0.411,11.245,0.868,18.823-4.207l0.012,0.029c0,0,0.415-0.181,0.614,0C31.967,48.452,32.106,48.837,31.896,49.095z   M54.242,24.131l-4.572,5.597c-0.086,0.112-0.16,0.23-0.251,0.341l-5.705,6.984L24.96,22.259L35.765,9.037  c4.169-5.103,11.686-5.859,16.787-1.691C57.655,11.515,58.41,19.03,54.242,24.131z" fill="#241F20" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Medicine</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['inv_equipment']) && $permission['inv_equipment'] == "1") : ?>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'equipment'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/inventory?r=equipment">
        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                <path  class="color-background" d="M328,16H216a8,8,0,0,0-7.938,8.992l8,64A8,8,0,0,0,224,96V448a48,48,0,0,0,96,0V96a8,8,0,0,0,7.938-7.008l8-64A8,8,0,0,0,328,16Zm-9.062,16-6,48H231.062l-6-48ZM304,448a32,32,0,0,1-64,0V424h24a8,8,0,0,0,0-16H240V392h8a8,8,0,0,0,0-16h-8V360h24a8,8,0,0,0,0-16H240V328h8a8,8,0,0,0,0-16h-8V296h24a8,8,0,0,0,0-16H240V264h8a8,8,0,0,0,0-16h-8V232h24a8,8,0,0,0,0-16H240V200h8a8,8,0,0,0,0-16h-8V168h24a8,8,0,0,0,0-16H240V96h64Zm184-72h-8V192a8,8,0,0,0-8-8H456V160a8,8,0,0,0-8-8h-8V24a8,8,0,0,0-13.657-5.657l-32,32A8,8,0,0,0,392,56v96h-8a8,8,0,0,0-8,8v24H360a8,8,0,0,0-8,8V376h-8a8,8,0,0,0,0,16h40v88H360a8,8,0,0,0,0,16H472a8,8,0,0,0,0-16H448V392h40a8,8,0,0,0,0-16ZM408,59.313l16-16V152H408ZM392,168h48v16H392ZM368,360h24a8,8,0,0,0,0-16H368V328h8a8,8,0,0,0,0-16h-8V296h24a8,8,0,0,0,0-16H368V264h8a8,8,0,0,0,0-16h-8V232h24a8,8,0,0,0,0-16H368V200h96V376H368Zm64,120H400V392h32ZM144,232.57V216h8a8,8,0,0,0,8-8V176a8,8,0,0,0-8-8H56a8,8,0,0,0-8,8v32a8,8,0,0,0,8,8h8v16.57A56.086,56.086,0,0,0,16,288V472a24.028,24.028,0,0,0,24,24H168a24.028,24.028,0,0,0,24-24V288A56.086,56.086,0,0,0,144,232.57ZM64,184h80v16H64ZM32,472V296H96v16H72a8,8,0,0,0,0,16H96v16H72a8,8,0,0,0,0,16H96v16H72a8,8,0,0,0,0,16H96v16H72a8,8,0,0,0,0,16H96v16H72a8,8,0,0,0,0,16H96v24H40A8.009,8.009,0,0,1,32,472Zm144,0a8.009,8.009,0,0,1-8,8H112V456h24a8,8,0,0,0,0-16H112V424h24a8,8,0,0,0,0-16H112V392h24a8,8,0,0,0,0-16H112V360h24a8,8,0,0,0,0-16H112V328h24a8,8,0,0,0,0-16H112V296h64ZM32.8,280A40.071,40.071,0,0,1,72,248a8,8,0,0,0,8-8V216h48v24a8,8,0,0,0,8,8,40.071,40.071,0,0,1,39.2,32ZM104,128A56,56,0,1,0,48,72,56.063,56.063,0,0,0,104,128Zm0-16A40.067,40.067,0,0,1,64.805,80H143.2A40.067,40.067,0,0,1,104,112Zm0-80A40.067,40.067,0,0,1,143.2,64H64.805A40.067,40.067,0,0,1,104,32Z" />
            </svg>
        </div>
        <span class="nav-link-text ms-1">Equipment</span>
    </a>
</li>
<?php endif; ?>
<?php if (isset($permission['inv_stocks']) && $permission['inv_stocks'] == "1") : ?>
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs opacity-6">Stocks components</h6>
</li>
<li class="nav-item">
    <a class="nav-link <?= isset($_GET['r'])  && $_GET['r'] == 'mstocks'  ? 'active' : ''; ?>" href="<?= URL; ?>admin/inventory?r=mstocks">
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
        <span class="nav-link-text ms-1">Medicine Stocks</span>
    </a>
</li>
<?php endif; ?>
<li class="nav-item d-nonex">
    <a class="nav-link <?= isset($_GET['url'])  && $_GET['url'] == 'admin/inventory'  ? 'active' : ''; ?>" href="<?= URL; ?>admin">
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