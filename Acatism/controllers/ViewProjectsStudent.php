<?php
class ViewProjectsStudent extends Controller
{
    function __construct()
    {
        parent::__construct();


        //$this->view->render('ViewProjects');

    }
    public function execute()
    {
        Session::init();

        $this->model->getAllProjects();
        $this->view->setData($this->model->projects);
        $this->view->setOldInfo($this->model->nr_projects);
        $this->view->render('ViewProjectsStudent');
    }
}