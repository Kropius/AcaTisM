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
        $this->model->execute();
        header('Location: /Acatism/viewProjects/seeData');
        die();
    }
}