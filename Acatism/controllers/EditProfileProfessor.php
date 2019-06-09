<?php
class EditProfileProfessor extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function execute()
    {
        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "students") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }
        $this->model->prepare_info();
        $this->view->setOldInfo($this->model->oldinfo);
        $this->view->render('EditProfileProfessor');
       // $this->model->execute();
    }
    public function edit()
    {
        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "students") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }
        $this->model->execute();
        $this->model->prepare_info();
        $this->view->setOldInfo($this->model->oldinfo);
        $this->view->render('EditProfileProfessor');
    }
}

?>