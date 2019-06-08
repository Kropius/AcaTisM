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
        $this->model->execute($index);
        $this->view->setData($this->model->info);
        $this->view->setInterests($this->model->domains);
        $this->view->render('ProfessorViewProfileStudent');
    }
}
?>