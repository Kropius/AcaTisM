<?php
class ViewRepoProf extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function execute($id_students,$id_project)
    {
        Session::init();
        $this->model->ViewRepo($id_students,$id_project);
        $this->view->setData($this->model->student_info);
        $this->view->setOldInfo($this->model->deadlines);
        $this->view->render('ViewRepoProf');
    }
}
?>