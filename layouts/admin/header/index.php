<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">CIS-CSUCC</a></li>
                <?php
                if (isset($_GET['url'])) {
                    switch ($_GET['url']) {
                        case 'admin':
                            echo ' <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>';
                            break;
                        case 'admin/consultation':
                            echo ' <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Consultation</li>';
                            break;
                        case 'admin/reports':
                            echo ' <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Reports</li>';
                            break;
                        case 'admin/inventory':
                            echo ' <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Inventory</li>';
                            break;
                        case 'admin/setup':
                            echo ' <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Setup</li>';
                            break;
                        default:
                            # code...
                            break;
                    }
                }
                ?>
            </ol>
            <?php
            if (isset($_GET['url'])) {
                switch ($_GET['url']) {
                    case 'admin':
                        echo '<h6 class="font-weight-bolder mb-0">Dashboard</h6>';
                        break;
                    case 'admin/consultation':
                        if (isset($_GET['r'])) {
                            switch ($_GET['r']) {
                                case 'students':
                                    echo '<h6 class="font-weight-bolder mb-0">Constulation / Students</h6>';
                                    break;
                                case 'faculty':
                                    echo '<h6 class="font-weight-bolder mb-0">Constulation / Faculty</h6>';
                                    break;
                                case 'employee':
                                    echo '<h6 class="font-weight-bolder mb-0">Constulation / Employee</h6>';
                                    break;
                                default:
                                    echo '<h6 class="font-weight-bolder mb-0">Constulation </h6>';
                                    break;
                            }
                        } else {
                            echo '<h6 class="font-weight-bolder mb-0">Constulation </h6>';
                        }
                        break;
                    case 'reports':
                        echo '<h6 class="font-weight-bolder mb-0">Reports</h6>';
                        break;
                    case 'admin/inventory':
                        if (isset($_GET['r'])) {
                            switch ($_GET['r']) {
                                case 'medicine':
                                    echo '<h6 class="font-weight-bolder mb-0">Inventory / Medicine</h6>';
                                    break;
                                case 'stocks':
                                    echo '<h6 class="font-weight-bolder mb-0">Inventory / Stocks Entry</h6>';
                                    break;
                                default:
                                    echo '<h6 class="font-weight-bolder mb-0">Inventory </h6>';
                                    break;
                            }
                        } else {
                            echo '<h6 class="font-weight-bolder mb-0">Inventory </h6>';
                        }
                        break;
                    case 'admin/setup':
                        if (isset($_GET['r'])) {
                            switch ($_GET['r']) {
                                case 'college':
                                    echo '<h6 class="font-weight-bolder mb-0">Setup / College</h6>';
                                    break;
                                case 'course':
                                    echo '<h6 class="font-weight-bolder mb-0">Setup / Course</h6>';
                                    break;
                                case 'office':
                                    echo '<h6 class="font-weight-bolder mb-0">Setup / Office</h6>';
                                    break;
                                case 'illness':
                                    echo '<h6 class="font-weight-bolder mb-0">Setup / Illness</h6>';
                                    break;
                                case 'nurse':
                                    echo '<h6 class="font-weight-bolder mb-0">Setup / School Nurse</h6>';
                                    break;
                                case 'personel':
                                    echo '<h6 class="font-weight-bolder mb-0">Setup / Clinic Personel</h6>';
                                    break;
                                default:
                                    echo '<h6 class="font-weight-bolder mb-0">Setup </h6>';
                                    break;
                            }
                        } else {
                            echo '<h6 class="font-weight-bolder mb-0">Setup </h6>';
                        }
                        break;
                    default:
                        # code...
                        break;
                }
            }
            ?>


        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group d-none">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body  font-weight-bold p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none">Welcome <?= isset($_SESSION['cis-admin-username']) ?  ucfirst($_SESSION['cis-admin-username']) : 'Guest'; ?></span>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-0">
                            <button class="btn  mb-0 btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#profileModal">Profile</button>
                        </li>
                        <li class="mb-0">
                            <button class="btn btn-outline-danger mb-0 btn-sm w-100" onclick="cislogout(<?= $_SESSION['cis-admin-id']; ?>)">Logout</button>
                        </li>

                    </ul>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center d-none">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center d-none">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0 ">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New album</span> by Travis Scott
                                        </h6>
                                        <p class="text-xs text-secondary mb-0 ">
                                            <i class="fa fa-clock me-1"></i>
                                            1 day
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>