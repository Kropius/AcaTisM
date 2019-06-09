<?php

class ViewRequests extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function seeData()
    {
        Session::init();
        $this->view->setData($this->model->getData());
        $this->view->render('viewRequests_view');
    }

    public function acceptStudent($student, $project)
    {
        Session::init();
        $data = $this->model->acceptStudent($student, $project);
        if($data == -2 || $data == -5)
        {
            $this->view->setData($data);
            $this->view->render('manageErrors_view');
        }
        else {
            header('Location: /Acatism/viewRequests/seeData');
            die();
        }
    }

    public function declineStudent($student, $project)
    {
        Session::init();
        $data = $this->model->declineStudent($student, $project);
        if($data == -2)
        {
            $this->view->setData(-2);
            $this->view->render('manageErrors_view');
        }
        else {
            header('Location: /Acatism/viewRequests/seeData');
            die();
        }
    }
}