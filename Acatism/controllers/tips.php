<?php

class Tips extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function seeData()
    {
        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "teacher") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }
        $this->view->render('Tips');
    }
}