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
        $this->model->acceptStudent($student, $project);
        header('Location: /Acatism/viewRequests/seeData');
        die();
    }

    public function declineStudent($student, $project)
    {
        $this->model->declineStudent($student, $project);
        header('Location: /Acatism/viewRequests/seeData');
        die();
    }
}