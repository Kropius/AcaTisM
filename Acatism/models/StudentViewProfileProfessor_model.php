<?php

class StudentViewProfileProfessor_model extends Model
{
    public $info;
    public $domains;
    function __construct()
    {
        parent::__construct();
    }
    function execute($index)
    {
        $getInfo = $this->db->query("Select * from teachers where id=$index");
        $getInterests = $this->db->query("select * from teachers join work on work.id_teacher=teachers.id join domains on domains.id=work.id_domain where teachers.id=$index");
        $this->info=$getInfo->fetch();
        $nr=0;

        $this->domains=array();
        $this->domains[0]=null;
        $this->domains[1]=null;
        $this->domains[2]=null;
        while ($row = $getInterests->fetch()) {
            $this->domains[$nr++]=$row;
        }

    }
}
?>