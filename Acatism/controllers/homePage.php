<?php

class HomePage extends Controller
{
    function __construct()
    {
        parent::__construct();
        Session::init();
        $this->view->render('homePage_view');
    }
}