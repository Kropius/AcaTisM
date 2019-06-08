<?php
//-1=am aplicat deja la un proiect
//-2=nu indeplinesc cerintele
//1=am reusit
class ApplyProject_model extends Model{
    public $applied;
    function  __construct()
    {
        parent::__construct();
    }
    function execute($project_id,$student_id)
    {
        $this->testPreferences($project_id,$student_id);
    }
    function testPreferences($project_id,$student_id)
    {

        $ppref_fr = array(15);
        for($i=1;$i<=14;$i++)
        {
            $ppref_fr[$i]=0;
        }

        $already = $this->db->query("select count(*) as countio from students join theses on theses.id_student = students.id where students.id = $student_id");
        $var = $already->fetch()['countio'];
        if($var  > 0) {$this->applied=-2;return;}
        echo $this->applied;
        $student_pref=$this->db->query("select * from Students join interests on interests.id_student=students.id where Students.id=$student_id");

        $nr=0;
        $interests_stud=array();
        $interests_stud[0]=null;
        $interests_stud[1]=null;
        $interests_stud[2]=null;
        while ($row = $student_pref->fetch()) {
            //echo $nr;
                $interests_stud[$nr++]=$row['id_domain'];
                $ppref_fr[ $row['id_domain']]++;
            //echo $ppref_fr[ $row['id_domain']] . "\n";

            ////////mai sus avem preferintele  studentului

        }
            $prof_id=$this->db->query("select teachers.id from Teachers left join concepts on teachers.id=concepts.id_teacher where concepts.id_project=$project_id ");
        $id_prof=$prof_id->fetch();
        $final_id=$id_prof['id'];
        //echo $final_id;
        $prof_pref = $this->db->query("select * from projects join subjects on projects.id=subjects.id_project and projects.id=$project_id");

        /////aici ne trebuiesc preferintele PROIECTULUI1!!!!!!!!!!!!!!!
        $nr=0;
        $interests_prof=array();
        $interests_prof[0]=null;
        $interests_prof[1]=null;
        $interests_prof[2]=null;
        while ($row = $prof_pref->fetch()) {
            $interests_prof[$nr++]=$row['id_domain'];
            $ppref_fr[ $row['id_domain']]++;
        }

        $match=0;
       // echo $interests_prof[0];
        if($interests_prof[0]==null)
        {
            $this->applied=1;
        }
        if($interests_prof[0]!=null&&$interests_prof[1]==null)
        {
            if($interests_prof[0]==$interests_stud[0]||$interests_stud[1]==$interests_prof[0]||$interests_stud[2]==$interests_prof[0])
            {
                $this->applied=1;
            }
        }
        for($i=1;$i<=14;$i++)
        {
            if(isset($ppref_fr[$i])) {
                if ($ppref_fr[$i] == 2)
                    $match++;
            }
        }
        if($match>=2) $this->applied=1;
        else if($this->applied!=1) $this->applied=-1;
        if($this->applied==1)
        {
            $getId = $this->db->query("Select max(id) from requests");
            $result = $getId->fetch();
            if(null == $result['max(id)'])
                $result['max(id)'] = 0;
            $idInteres=$result['max(id)']+1;
            $sql='insert into requests(id,id_student,id_project,apply_date) values(?,?,?,?)';
            $STM=$this->db->prepare($sql);
            $STM->execute([$idInteres,$student_id,$project_id, date("Y/m/d")]);
            $getEmail = $this->db->prepare("select t.email from teachers t where t.id = :tid");
            $getEmail->execute(array(
                ':tid' => $final_id
            ));
            $getSName = $this->db->prepare("select s.name from students s where s.id = :sid");
            $getSName->execute(array(
               ':sid' => $student_id
            ));
            $getPName = $this->db->prepare("select p.name from projects p where p.id = :pid");
            $getPName->execute(array(
               ':pid' => $project_id
            ));
            $result = $getEmail->fetch();
            $resultName = $getSName->fetch();
            $resultProject = $getPName->fetch();
            $this->mail->Subject = "ACATISM!";
            $this->mail->Body = $resultName['name'].' applied to one of your projects: '.$resultProject['name'].' !';
            $this->mail->AddAddress($result['email']);
            if (!$this->mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }
    }
}
?>