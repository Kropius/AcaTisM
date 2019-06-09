<?php
//vizualizarea profilului unui student din ipostaza unui profesor
class ProfessorViewProfileStudent extends Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function execute($index)
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
        $this->model->execute($index);
        $this->view->setData($this->model->info);
        $this->view->setInterests($this->model->domains);
        $this->view->render('ProfessorViewProfileStudent');
    }
}
?>