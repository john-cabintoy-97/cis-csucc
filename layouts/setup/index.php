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
    <?php include('./config/init.php'); ?>
</head>

<body>

    <div class="background-1">
        <main class="main-content  mt-0">
            <?= $children; ?>
        </main>
    </div>
    <?php include('./config/script.php'); ?>
</body>

</html>