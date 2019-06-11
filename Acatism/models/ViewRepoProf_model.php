<?php


class ViewRepoProf_model extends Model{
    public $deadlines;
    public $student_info;
    function __construct()
    {
        parent::__construct();
    }
    function ViewRepo($id_stud,$id_proj)
    {
        $myid=Session::get('idUser');
        $sql = $this->db->query("select students.name as 'students',projects.name as 'project',theses.project_link as 'project_link',theses.documentation_link as 'documentation_link' 
                    from students join theses on students.id=theses.id_student
                                      join projects on projects.id=theses.id_project where students.id=$id_stud");
        $this->student_info = $sql->fetch();
        $sql  = $this->db->query("select commits.description,commits.add_date,students.name from commits join students on students.id=commits.id_student where students.id=$id_stud");

        $this->deadlines=array();
        $nr=0;
        $this->deadlines[0]=null;
        $this->deadlines[1]=null;
        $this->deadlines[2]=null;
        $this->deadlines[3]=null;

        while($row=$sql->fetch())
        {
            $this->deadlines[$nr++]=$row;

        }

        if($this->deadlines[3]==null)
        {
            $this->deadlines=array_slice($this->deadlines,0,3);
        }
        if($this->deadlines[2]==null)
        {
            $this->deadlines=array_slice($this->deadlines,0,2);
        } if($this->deadlines[1]==null)
        {
            $this->deadlines=array_slice($this->deadlines,0,1);
        } if($this->deadlines[0]==null)
        {
            $this->deadlines=array_slice($this->deadlines,0,0);
        }

    }
}
?>