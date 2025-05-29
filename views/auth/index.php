<?php

if (isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'admin');
}
if (isset($_SESSION['cis-patient-islogin'])) {
     header('location:' . URL . 'patient');
}

$controllers = new UserModel();

// if (!isset($_SESSION['cis-admin-exist'])) {
//     header('location:' . URL . 'wizard');
// }
?>
<main class="main-content  mt-0">
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'login':
                include_once 'login/index.php';
                break;
            case 'register':
                include_once 'register/index.php';
                break;
            default:
                include_once '404/index.php';
                break;
        }
    } else {
        header('location:' . URL);
    }

    ?>
</main>