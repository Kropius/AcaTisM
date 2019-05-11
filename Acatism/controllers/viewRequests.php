<?php

class ViewRequests extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function seeData()
    {
        $this->view->setData($this->model->getData());
        $this->view->render('viewRequests_view');
    }

    public function acceptStudent($student, $project)
    {
        $this->model->acceptStudent($student, $project);
        $this->view->setData($this->model->getData());
        $this->view->render('viewRequests_view');
    }

    public function declineStudent($student, $project)
    {
        $this->model->declineStudent($student, $project);
        $this->view->setData($this->model->getData());
        $this->view->render('viewRequests_view');
    }
}