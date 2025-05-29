<?php

if (isset($_SESSION['cis-admin-permission'])) {
    $permission = json_decode($_SESSION['cis-admin-permission'], true);
}

$controllers = new AdminModel();
$admin_info = $controllers->getByIdPatient($_SESSION['cis-admin-id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="<?= URL; ?>manifest.json">
    <link rel="apple-touch-icon" href="<?= URL; ?>public/img/icons/app-icon-512x.png">
    <link rel="shortcut icon" href="<?= URL; ?>public/img/logo.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URL; ?>public/img/logo.png">

    <title><?= !isset($page_title) ? TITLE : $page_title; ?></title>
    <?php include('./config/init.php'); 
    
    
    ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- sidebar page -->
    <?php include('sidebar/index.php'); ?>
    <!-- content page -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- header page -->
        <?php include('header/index.php'); ?>
        <?php include('modal/modal.php'); ?>
        <div class=" container-fluid py-4 background-1">
            <?= $children; ?>
        </div>
        <!-- footer page -->
        <?php include('footer/index.php'); ?>
    </main>
    <!-- footer page -->
    <?php include('config/index.php'); ?>
    <?php include('./config/script.php'); ?>
</body>

</html>