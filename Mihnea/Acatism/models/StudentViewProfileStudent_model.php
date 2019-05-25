<?php
class StudentViewProfileStudent_Model extends Model
{
    public $info;
    public $interests;
    function __construct()
    {
        parent::__construct();
    }
    public function getName()
    {
       // echo $this->name;
        return $this->info;
    }
    public function getInterests()
    {
        return $this->interests;
    }
    public function  execute(){

        $myid=7;
        $getInfo = $this->db->query("Select * from students where id=$myid");
        $getInterests = $this->db->query("select * from students join interests on interests.id_student=students.id join domains on domains.id=interests.id_domain where students.id=$myid");


        $nr=0;
        $this->interests=array();
        $this->interests[0]=null;
        $this->interests[1]=null;
        $this->interests[2]=null;
        while ($row = $getInterests->fetch()) {
            //echo $nr;
            $this->interests[$nr++]=$row;
        }

        //$interest=$getInterests->fetch();
//        echo $this->interests[0]['name'];
//        echo $this->interests[1]['name'];
//        echo $this->interests[2]['name'];
        $result = $getInfo->fetch();
        $this->info = $result;
        //echo $this->name;
       // print($this->name);



    }
}