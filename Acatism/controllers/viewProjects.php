<?php

class ViewProjects extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function seeData()
    {
        $this->view->setData($this->model->getData());
        $this->view->render('viewProjects_view');
    }
}