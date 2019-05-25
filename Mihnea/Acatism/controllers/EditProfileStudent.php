<?php
class EditProfileStudent extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('EditProfileStudent');
    }
    public function execute(){
            $this->model->execute();
    }
}