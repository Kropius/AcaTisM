<?php

class AddProject extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        $this->view->render('addProject_view');
    }

    public function execute()
    {
        Session::init();
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