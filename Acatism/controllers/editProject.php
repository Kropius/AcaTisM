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
        $data = $this->model->getPastData($project);
        if($data == -1) {
            $this->view->setData(-1);
            $this->view->render('manageErrors_view');
        }
        else {
            $this->view->setData($data);
            $this->view->render('editProject_view');
        }
    }

    public function delete($project)
    {
        Session::init();
        $data = $this->model->delete($project);
        if($data == -1)
        {
            $this->view->setData(-1);
            $this->view->render('manageErrors_view');
        }
        else {
            header('Location: /Acatism/viewProjects/seeData');
            die();
        }
    }

    public function execute($project)
    {
        Session::init();
        $data = $this->model->execute($project);
        if($data == -1)
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