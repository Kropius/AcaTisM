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
        $data = $this->model->deleteStudent($student, $project);
        if($data == -2)
        {
            $this->view->setData(-2);
            $this->view->render('manageErrors_view');
        }
        else {
            header('Location: /Acatism/viewStudents/seeData');
            die();
        }
    }
}