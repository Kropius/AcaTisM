<?php
//vizualiarea propirului profil din ipostaza de profesor
class ProfessorViewProfileProfessor extends Controller
{
    function __construct()
    {
        parent::__construct();
       // $this->view->render('ProfessorViewProfileProfessor');
    }
    public function execute()
    {
        Session::init();
        $this->model->execute();
        $this->view->setData($this->model->get_info());
        $this->view->setInterests($this->model->get_domains());
        $this->view->render('ProfessorViewProfileProfessor');

    }
}


?>