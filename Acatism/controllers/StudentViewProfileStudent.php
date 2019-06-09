<?php
//vizualairea propriului profil din ipostaza de student
class StudentViewProfileStudent extends  Controller
{

    function  __construct()
    {

        parent::__construct();
       // require 'views/StudentViewProfileStudent.php';
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
        $this->model->execute();
        $this->view->setData($this->model->getName());
        $this->view->setInterests($this->model->getInterests());
        $this->view->render('StudentViewProfileStudent');

    }
}