<?php

class AddProject extends Controller
{
    function __construct()
    {
        parent::__construct();

    }

    public function add()
    {
        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "students") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }
        $this->view->render('addProject_view');
    }

    public function execute()
    {
        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "students") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        $data = $this->model->execute();
        if($data == -3 || $data == -4)
        {
            $this->view->setData($data);
            $this->view->render('manageErrors_view');
        }
        else {
            header('Location: /Acatism/viewProjects/seeData');
            die();
        }
    }
}