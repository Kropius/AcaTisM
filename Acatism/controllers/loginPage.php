<?php

class LoginPage extends Controller{
    public function __construct(){
        parent::__construct();

        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }
        if ($user=="students"){
           $this->view->render('StudentHomePage');
        }
        else if ($user=="teachers"){
            $this->view->render('homePage_view');
        }
    }
}
