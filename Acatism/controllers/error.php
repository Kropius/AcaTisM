<?php
class Errors extends Controller
{
    function __construct()
    {
        parent::__construct();
        echo 'This is an error!';
        echo "tardalaac\n";
        $this->view->msg='This page doesn`t exist';
        $this->view->render('error/index');
    }
}

?>