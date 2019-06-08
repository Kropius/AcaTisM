<?php

class ProfessorViewProfileStudent_model extends Model
{
    public $info;
    public $domains;
    function __construct()
    {
        parent::__construct();
    }
    function execute($index)
    {
        $myid=Session::get('idUser');
        $getInfo = $this->db->query("Select * from students where id=$index");
        $getInterests = $this->db->query("select * from students join interests on interests.id_student=students.id join domains on domains.id=interests.id_domain where students.id=$index");

        $nr=0;
        $this->interests=array();
        $this->domains[0]=null;
        $this->domains[1]=null;
        $this->domains[2]=null;
        while ($row = $getInterests->fetch()) {
            //echo $nr;
            $this->domains[$nr++]=$row;
        }

        $result = $getInfo->fetch();
        $this->info = $result;
    }
}


?>