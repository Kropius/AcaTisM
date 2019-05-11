<?php

class View
{
    public $info;

    function __construct()
    {

    }

    public function setData($data)
    {
        $this->info = $data;
    }

    public function render($name)
    {
        require 'views/' . $name . '.php';
    }
}