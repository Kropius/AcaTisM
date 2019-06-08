<?php
class Commit_model extends Model
{
    public $succes;
    function __construct()
    {
        parent::__construct();
    }
    function commit()
    {
        $myid=7;
        $descriere=null;
        if(isset($_POST['descriere']))
            $descriere=$_POST['descriere'];
        if(isset($_POST['extensie']))
            $extensie=$_POST['extensie'];
        if(isset($_POST['format']))
            $format=$_POST['format'];

        $ded = $this->db->query("select count(commits.id_deadline) from students left join commits on students.id=commits.id_student left join deadlines on deadlines.id=commits.id_deadline where students.id=$myid");
        $this->current_Deadline = $ded->fetch();
        $nextDeadline = $this->current_Deadline['count(commits.id_deadline)'];
        /////am aflat cate deadline-uri am indeplinit pana acum

        //trebuie sa iau deadline-ul pe care urmeaza sa il indeplinesc

        $sql=$this->db->query("select deadlines.extension,deadlines.format,deadlines.id from students join theses on theses.id_student=students.id join projects on projects.id=theses.id_project
                               join deadlines on deadlines.id_project = projects.id 
                               where students.id=$myid
                               ORDER BY deadlines.mandatory_date LIMIT $nextDeadline,1");
        $current_Deadline=$sql->fetch();

        if(strcmp($current_Deadline['extension'],$extensie)!=0&&strcmp($current_Deadline['extension'],".*")!=0)
        {
            $this->succes=-1;

            return;
        }
        if(strcmp($current_Deadline['format'],$format)!=0)
        {
            $this->succes=-2;
            return;
        }
        $this->succes=1;


        $getId = $this->db->query("Select max(id) from commits");
        $result = $getId->fetch();
        if(null == $result['max(id)'])
            $result['max(id)'] = 0;
        $idInteres=$result['max(id)']+1;

        $sql= "Insert into commits (id, id_student,id_deadline,description,add_date) VALUES (?,?,?,?,?)";
        $STM=$this->db->prepare($sql);
        $STM->execute([$idInteres,$myid,$current_Deadline['id'],$descriere,date("Y/m/d")]);
    }
}

?>