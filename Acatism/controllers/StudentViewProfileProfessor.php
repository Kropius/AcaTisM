<?php
//vizualiarea profilului unui profsor din ipostaza unui student
class StudentViewProfileProfessor extends Controller
{
    function __construct()
    {
        parent::__construct();
//        $this->view->render('StudentViewProfileProfessor');
    }
    function execute($index)
    {
        Session::init();
        $this->model->execute($index);
        $this->view->setData($this->model->info);
        //$this->view->setOldInfo($this->model->domains);
        $this->view->setInterests($this->model->domains);
        $this->view->render('StudentViewProfileProfessor');
    }
}