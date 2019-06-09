<?php

class Commit extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function commit()
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
        $this->model->commit();
        $this->view->setData($this->model->succes);
        $this->view->render('Commit');
    }
}
?>