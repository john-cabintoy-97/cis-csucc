<?php
if (!isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'auth?page=login');
}

$controllers = new AdminModel();


if (isset($_SESSION['cis-admin-permission'])) {
    $permission = json_decode($_SESSION['cis-admin-permission'], true);
}

if (isset($_GET['r'])) {
    switch ($_GET['r']) {
        case 'medicine':
            include_once 'medicine/index.php';
            break;
        case 'equipment':
            include_once 'equipment/index.php';
            break;
        case 'mstocks':
            include_once 'mstocks/index.php';
            break;
        default:
            include_once '404/index.php';
            break;
    }
} else {
    include_once 'main/index.php';
}
