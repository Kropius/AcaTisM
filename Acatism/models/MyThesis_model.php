<?php

class MyThesis_model extends Model{
    public $info;
    public $current_Deadline;

    function  __construct()
    {
        parent::__construct();
    }
    function execute()
    {
        $myid=Session::get('idUser');
        $sql=$this->db->query("select * from students join theses on theses.id_student=students.id join projects on projects.id=theses.id_project where students.id=$myid");
        $this->info=$sql->fetch();



        $ded = $this->db->query("select count(commits.id_deadline) from students left join commits on students.id=commits.id_student left join deadlines on deadlines.id=commits.id_deadline where students.id=$myid");
        $this->current_Deadline = $ded->fetch();
        $nextDeadline = $this->current_Deadline['count(commits.id_deadline)'];
        /////am cate deadline-uri am indeplinit pana acum

       //trebuie sa iau deadline-ul pe care urmeaza sa il indeplinesc

        $sql=$this->db->query("select * from students join theses on theses.id_student=students.id join projects on projects.id=theses.id_project
                               join deadlines on deadlines.id_project = projects.id 
                               where students.id=$myid
                               ORDER BY deadlines.mandatory_date LIMIT $nextDeadline,1");
        $this->current_Deadline=$sql->fetch();


        //acum am detalii despre acest deadline



    }
    function updateGit()
    {
        $myid=Session::get('idUser');
        if(isset($_POST['git']))
        {
            $link=$_POST['git'];
        }

        $sql= "UPDATE `theses`
                      SET `project_link` = :link
                      where `id_student` = :myid 
                      ";
        //echo $oldinterests[0]['id_domain'];
        $STM=$this->db->prepare($sql);
        $STM->bindValue(":link",$link);
        $STM->bindValue(":myid",$myid);

        $STM->execute();
    }
    function updateDoc()
    {
        $myid=Session::get('idUser');
        if(isset($_POST['doc']))
        {
            $link=$_POST['doc'];
        }

        $sql= "UPDATE `theses`
                      SET `documentation_link` = :link
                      where `id_student` = :myid 
                      ";
        //echo $oldinterests[0]['id_domain'];
        $STM=$this->db->prepare($sql);
        $STM->bindValue(":link",$link);
        $STM->bindValue(":myid",$myid);

        $STM->execute();
    }
}
?>