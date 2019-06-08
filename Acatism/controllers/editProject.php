<?php

class EditProject extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function edit($project)
    {
        Session::init();
        $this->view->setData($this->model->getPastData($project));
        $this->view->render('editProject_view');
    }

    public function delete($project)
    {
        $this->model->delete($project);
        header('Location: /Acatism/viewProjects/seeData');
        die();
    }

    public function execute($project)
    {
        $this->model->execute($project);
        header('Location: /Acatism/viewProjects/seeData');
        die();
    }
}