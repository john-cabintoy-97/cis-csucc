<?php

class Index extends Controller{

    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render('index');
    }

}
