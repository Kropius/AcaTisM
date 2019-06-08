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
        $this->model->execute($idp,$ids);
        $this->view->setData($this->model->applied);

        $this->view->render('ApplyProject');
    }
}