<?php

class ViewStudents extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function seeData()
    {
        Session::init();
        $this->view->setData($this->model->getData());
        $this->view->render('viewStudents_view');
    }

    public function deleteStudent($student, $project)
    {
        Session::init();
        $this->model->deleteStudent($student, $project);
        header('Location: /Acatism/viewStudents/seeData');
        die();
    }
}