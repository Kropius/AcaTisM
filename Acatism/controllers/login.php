<?php

class Login extends Controller{
    public function __construct(){
        parent::__construct();
        Session::init();
        $this->view->render('login');
    }

    public function run(){
        $this->model->run();
    }

    public function logout(){
        $this->model->logout();
    }
}