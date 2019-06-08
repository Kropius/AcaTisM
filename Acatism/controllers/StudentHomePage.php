<?php

class StudentHomePage extends Controller
{
    function __construct(){
        parent::__construct();
        Session::init();
        $this->view->render('StudentHomePage');
    }
}
?>