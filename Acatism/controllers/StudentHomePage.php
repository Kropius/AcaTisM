<?php

class StudentHomePage extends Controller
{
    function __construct(){
        parent::__construct();
        Session::init();

        $user = Session::get('user');
        if ($user == "teachers") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        $this->view->render('StudentHomePage');
    }
}
?>