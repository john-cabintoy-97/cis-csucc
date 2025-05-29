<?php

class Logout extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function id($arg = false)
    {
        if (!empty($arg)) {

            if ($_SESSION['cis-admin-id'] == $arg) {
                unset($_SESSION['cis-admin-id']);
                unset($_SESSION['cis-admin-islogin']);
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
