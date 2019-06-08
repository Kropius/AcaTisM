<?php
class ProfessorViewProfileProfessor_model extends Model
{
    public $info;
    public $domains;
    function __construct()
    {
        parent::__construct();
    }
    public function get_domains()
    {
        return $this->domains;
    }
    public function get_info()
    {
        return $this->info;
    }
    public function execute()
    {
        $myid=Session::get('idUser');
        $getInfo = $this->db->query("Select * from teachers where id=$myid");
        $getInterests = $this->db->query("select * from teachers join work on work.id_teacher=teachers.id join domains on domains.id=work.id_domain where teachers.id=$myid");
        $this->info=$getInfo->fetch();
        $nr=0;
        $this->domains=array();
        $this->domains[0]=null;
        $this->domains[1]=null;
        $this->domains[2]=null;
        while ($row = $getInterests->fetch()) {
            //echo $nr;
            $this->domains[$nr++]=$row;
        }
    }
}

?>