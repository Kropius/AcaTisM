<?php

class MessagesProfs extends Controller{
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
        $this->view->setNames($this->model->getNames());
        $this->view->setMessages($this->model->getMessages());
        $this->view->render('messagesPageProfs');

    }

    public function sendMessage(){
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
        $this->model->sendMessage();
        $this->view->setNames($this->model->getNames());
        $this->view->setMessages($this->model->getMessages());
        $this->view->render('messagesPageProfs');

    }


}
