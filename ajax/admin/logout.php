<?php

session_start();

if (isset($_POST['logout_admin'])) {
    unset($_SESSION['cis-admin-islogin']);
    echo "ok";
}
