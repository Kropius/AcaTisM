<?php

class HomePage extends Controller
{
    function __construct()
    {
        parent::__construct();
        Session::init();

        $user = Session::get('user');
        if ($user == "students") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        $this->view->render('homePage_view');
    }
}