<?php
if (!isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'auth?page=login');
}

$controllers = new AdminModel();
$college_drop = $controllers->getAllCollege();
$course_drop = $controllers->getAllCourse();
$office_drop = $controllers->getAllOffice();

if (isset($_SESSION['cis-admin-permission'])) {
    $permission = json_decode($_SESSION['cis-admin-permission'], true);
}

if (isset($_GET['r'])) {
    switch ($_GET['r']) {
        case 'students':
            include_once 'students/index.php';
            break;
        case 'faculty':
            include_once 'faculty/index.php';
            break;
        case 'employee':
            include_once 'employee/index.php';
            break;
        case 'personnel':
            include_once 'personnel/index.php';
            break;
        default:
            include_once '404/index.php';
            break;
    }
} else {
    include_once 'main/index.php';
}
