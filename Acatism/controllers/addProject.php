<?php

class AddProject extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('addProject_view');
    }
    public function execute()
    {
        $this->model->execute();
    }
}