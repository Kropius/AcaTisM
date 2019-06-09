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
        $this->view->setData($this->model->get_info());
        $this->view->setInterests($this->model->get_domains());
        $this->view->render('ProfessorViewProfileProfessor');

    }
}


?>