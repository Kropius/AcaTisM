<?php

class ApplyProject extends Controller
{
    function __construct()
    {

        parent::__construct();
    }
    function execute($idp,$ids)
    {
        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "teachers") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }
        $this->model->execute($idp,$ids);
        $this->view->setData($this->model->applied);

        $this->view->render('ApplyProject');
    }
}