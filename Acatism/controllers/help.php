<?php

class Help extends Controller
{
    function __construct()
    {
        parent::__construct();
        echo 'We are in help' . '<br>';
    }

    public function other()
    {
        echo 'We are inside other';
    }

    public function getNumber($number)
    {
        echo $number;
    }
}