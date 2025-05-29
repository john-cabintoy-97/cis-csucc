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
        case 'college':
            include_once 'college/index.php';
            break;
        case 'course':
            include_once 'course/index.php';
            break;
        case 'office':
            include_once 'office/index.php';
            break;
        case 'illness':
            include_once 'illness/index.php';
            break;
        case 'nurse':
            include_once 'nurse/index.php';
            break;
        case 'personel':
            include_once 'personel/index.php';
            break;
        default:
            include_once '404/index.php';
            break;
    }
} else {
    include_once 'main/index.php';
}
