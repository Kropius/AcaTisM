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
        $this->model->execute();
        $this->view->setData($this->model->getName());
        $this->view->setInterests($this->model->getInterests());
        $this->view->render('StudentViewProfileStudent');

    }
}