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

    public function execute()
    {

        $myid = Session::get('idUser');
        $getInfo = $this->db->query("Select * from students where id=$myid");
        $getInterests = $this->db->query("select * from students join interests on interests.id_student=students.id join domains on domains.id=interests.id_domain where students.id=$myid");


        $nr = 0;
        $this->interests = array();
        $this->interests[0] = null;
        $this->interests[1] = null;
        $this->interests[2] = null;
        while ($row = $getInterests->fetch()) {
            $this->interests[$nr++] = $row;
        }

        $result = $getInfo->fetch();
        $this->info = $result;
    }
}