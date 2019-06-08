<?php

class Commit extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function commit()
    {
        $this->model->commit();
        $this->view->setData($this->model->succes);
        $this->view->render('Commit');
    }
}
?>