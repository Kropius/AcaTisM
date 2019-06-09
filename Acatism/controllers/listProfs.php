<?php

class ListProfs extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function seeData(){
        $this->view->setProfs($this->model->getProfs());
        $this->view->render('listProfsPage');
    }
}