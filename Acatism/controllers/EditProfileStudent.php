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

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "teachers") {
            Session::destroy();
            header('location: /AcaTisM/login');
        }

        if ($logged==false){
            Session::destroy();
            header('location: /AcaTisM/login');
        }
        $this->model->prepare_info();
        $this->view->setOldInfo($this->model->oldinfo);
        $this->view->render('EditProfileStudent');

    }
    public function edit()
    {
        Session::init();

        $logged = Session::get('loggedIn');

        $user = Session::get('user');
        if ($user == "teachers") {
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
        $this->view->render('EditProfileStudent');
    }
}
