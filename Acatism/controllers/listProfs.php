<?php

class ListProfs extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function seeData(){
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
        $this->view->setProfs($this->model->getProfs());
        $this->view->render('listProfsPage');
    }
}