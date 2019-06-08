<?php
class EditProfileStudent extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function execute()
    {
        Session::init();
        $this->model->prepare_info();
        $this->view->setOldInfo($this->model->oldinfo);
        $this->view->render('EditProfileStudent');

    }
    public function edit()
    {
        Session::init();
        $this->model->execute();
        $this->model->prepare_info();
        $this->view->setOldInfo($this->model->oldinfo);
        $this->view->render('EditProfileStudent');
    }
}
