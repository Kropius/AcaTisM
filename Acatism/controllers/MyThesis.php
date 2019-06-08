<?php

class MyThesis extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function execute()
    {
        Session::init();
        $this->model->execute();
        $this->view->setData($this->model->info);
        $this->view->setOldInfo($this->model->current_Deadline);
        $this->view->render('MyThesis');
    }
    function updateGit()
    {
        Session::init();
        $this->model->updateGit();
        $this->model->execute();
        $this->view->setData($this->model->info);
        $this->view->setOldInfo($this->model->current_Deadline);
        $this->view->render('MyThesis');
    }
    function updateDoc()
    {
        Session::init();
        $this->model->updateDoc();
        $this->model->execute();
        $this->view->setData($this->model->info);
        $this->view->setOldInfo($this->model->current_Deadline);
        $this->view->render('MyThesis');
    }
}

?>