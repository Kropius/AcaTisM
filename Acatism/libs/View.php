<?php

class View
{
    public $oldinfo;
    public $info;
    public $interests;

    public $names;//stores names of the students/teachers, depends on the session
    public $messages;//all the messages, depends on the session
    public $profs;//stores the teacher


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

    public function setNames($nm){
        $this->names=$nm;
    }

    public function setMessages($msg){
        $this->messages=$msg;
    }

    public function setProfs($pf){
        $this->profs=$pf;
    }
}