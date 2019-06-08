<?php
class EditProfileProfessor extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function execute()
    {
        Session::init();
        $this->model->prepare_info();
        $this->view->setOldInfo($this->model->oldinfo);
        $this->view->render('EditProfileProfessor');
       // $this->model->execute();
    }
    public function edit()
    {
        Session::init();
        $this->model->execute();
        $this->model->prepare_info();
        $this->view->setOldInfo($this->model->oldinfo);
        $this->view->render('EditProfileProfessor');
    }
}

?>