<?php
if (!isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'auth?page=login');
}

$controllers = new AdminModel();


if (isset($_GET['r'])) {
    switch ($_GET['r']) {
        case 'consultation':
            include_once 'consultation/index.php';
            break;
        case 'individual':
            include_once 'individual/index.php';
            break;
        case 'student':
            include_once 'student/index.php';
            break;
        case 'faculty':
            include_once 'faculty/index.php';
            break;
        case 'employee':
            include_once 'employee/index.php';
            break;
        case 'medicine':
            include_once 'medicine/index.php';
            break;
        case 'health':
            include_once 'health/index.php';
            break;
        case 'illness':
            include_once 'illness/index.php';
            break;
        case 'resita':
            include_once 'resita/index.php';
            break;
        case 'doctor':
            include_once 'doctor/index.php';
            break;
        default:
            include_once '404/index.php';
            break;
    }
} else {
    include_once 'main/index.php';
}
