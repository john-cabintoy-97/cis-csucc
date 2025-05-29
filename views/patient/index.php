<?php


if (!isset($_SESSION['cis-patient-islogin'])) {
    header('location:' . URL . 'auth?page=login');
}

$controllers = new AdminModel();
$treatment_list = $controllers->getAllTreatment();
// $medicine_list = $controllers->getAllMedicine();

?>
<main class="main-content  mt-0">
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'feedback':
                include_once 'feedback/index.php';
                break;
            case 'schedule':
                include_once 'schedule/index.php';
                break;
            default:
                include_once '404/index.php';
                break;
        }
    } else {
        include_once 'home/index.php';
    }

    ?>
</main>