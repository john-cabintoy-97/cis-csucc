<?php

class Admin extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function consultation($arg = false)
    {
        $this->view->render('admin/consultation/index');
    }

    function reports($arg = false)
    {
        $this->view->render('admin/reports/index');
    }

    function setup($arg = false)
    {
        $this->view->render('admin/setup/index');
    }

    function inventory($arg = false)
    {
        $this->view->render('admin/inventory/index');
    }

    function users($arg = false)
    {
        $this->view->render('admin/users/index');
    }

    function feedback($arg = false)
    {
        $this->view->render('admin/feedback/index');
    }


    // function login($arg = false)
    // {
    //     $this->view->render('admin/login/index');
    // }

    function index()
    {
        $this->view->render('admin/index');
    }
}
