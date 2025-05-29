<?php

class Logout_u extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function id($arg = false)
    {
        if (!empty($arg)) {

            if ($_SESSION['cis-patient-id'] == $arg) {
                unset($_SESSION['cis-patient-id']);
                unset($_SESSION['cis-patient-islogin']);
                unset($_SESSION['cis-patient-no']);
                unset($_SESSION['cis-patient-name']);
                header('location:' . URL);
            }
        } else {
        }
    }

    function index()
    {
        $this->view->render('404/index');
    }
}
