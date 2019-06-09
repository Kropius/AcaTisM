<?php

class MessagesProfs extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function seeData(){
        Session::init();
        $this->view->setNames($this->model->getNames());
        $this->view->setMessages($this->model->getMessages());
        $this->view->render('messagesPageProfs');

    }

    public function sendMessage(){
        Session::init();
        $this->model->sendMessage();
        $this->view->setNames($this->model->getNames());
        $this->view->setMessages($this->model->getMessages());
        $this->view->render('messagesPageProfs');

    }


}
