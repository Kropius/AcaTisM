<?php

class MyThesis extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function execute()
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
        $this->model->execute();
        $this->view->setData($this->model->info);
        $this->view->setOldInfo($this->model->current_Deadline);
        $this->view->render('MyThesis');
    }
    function updateGit()
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
        $this->model->updateGit();
        $this->model->execute();
        $this->view->setData($this->model->info);
        $this->view->setOldInfo($this->model->current_Deadline);
        $this->view->render('MyThesis');
    }
    function updateDoc()
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
        $this->model->updateDoc();
        $this->model->execute();
        $this->view->setData($this->model->info);
        $this->view->setOldInfo($this->model->current_Deadline);
        $this->view->render('MyThesis');
    }
}

?>