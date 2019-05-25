<?php
class View{

    public $info;
    public $interests;
    function __construct()
    {
      //  echo 'This is the view<br>';
    }
    public function setData($Data)
    {
        $this->info=$Data;
       // print($info);
    }
    public function setInterests($Interests)
    {
        $this->interests=$Interests;
    }
    public function  render($name)
    {

        require 'views/' . $name . '.php';
    }

}