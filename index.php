<?php

session_start();
date_default_timezone_set('Asia/Manila');
require 'modal/modal.php';
require 'libs/bootstrap.php';
require 'libs/controller.php';
require 'libs/model.php';
require 'models/admin.model.php';
require 'models/user.model.php';

require 'libs/view.php';
require 'config/path.php';

if (isset($_SESSION['cis-admin-permission'])) {
    $permission = json_decode($_SESSION['cis-admin-permission'], true);
}

$model = new Model();
$model->loadAdmin();

$app = new Boostrap();
