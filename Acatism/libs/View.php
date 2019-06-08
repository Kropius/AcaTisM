<?php

class View
{
    public $oldinfo;
    public $info;
    public $interests;

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
	
	public function setOldInfo($info)
    {
        $this->oldinfo=$info;
    }
	
	public function setInterests($Interests)
    {
        $this->interests=$Interests;
    }
}