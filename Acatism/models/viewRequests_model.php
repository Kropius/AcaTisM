<?php

class ViewRequests_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getData()
    {
        $data = null;
        $myId = Session::get('idUser'); //id preluat din sesiune
        $getRequests = $this->db->prepare("SELECT p.name as project, p.id as project_id, s.id as student_id, s.name as student from teachers t join concepts c on c.id_teacher = t.id 
          join projects p on p.id = c.id_project join requests r on r.id_project = p.id join students s on r.id_student = s.id where t.id = :id");
        $getRequests->execute(array(':id' => $myId));
        $result = $getRequests->fetchAll();
        $i = 0;
        foreach ($result as $row) {
            $data[$i]['p_name'] = $row['project'];
            $data[$i]['p_id'] = $row['project_id'];
            $data[$i]['s_name'] = $row['student'];
            $data[$i]['s_id'] = $row['student_id'];
            $i = $i + 1;
        }
        return $data;
    }

    public function acceptStudent($student, $project)
    {
        $myId = Session::get('idUser'); //id preluat din sesiune
        $count = $this->db->prepare("select count(id) as nr from requests where id_project = :proj and id_student = :stud");
        $count->execute(array(
            ':proj' => $project,
            ':stud' => $student
        ));
        $res = $count->fetch();
        if($res['nr']>=1) {
            $countCollab = $this->db->prepare("select count(id) as nr from collaborations where id_student = :id");
            $countCollab->execute(array(
                ':id' => $student
            ));
            $res=$countCollab->fetch();
            $deleteRequest = $this->db->prepare("delete from requests where id_student = :sid");   //delete all the requests of the student if he is accepted
            $deleteRequest->execute(array(
                ':sid' => $student
            ));
            if($res['nr']==0){
                $insertCollab = $this->db->prepare("insert into collaborations (id, id_student, id_teacher) 
                  values(null, :student, :myId)");
                $insertCollab->execute(array(
                    ':student' => $student,
                    ':myId' => $myId
                ));
                $insertThesis = $this->db->prepare("insert into theses(id, id_project, id_student, project_link, documentation_link) 
                  values(null, :project, :student, null, null)");
                $insertThesis->execute(array(
                    ':project' => $project,
                    ':student' => $student
                ));
                $getName = $this->db->prepare("select p.name from projects p where p.id = :id");
                $getName->execute(array(':id' => $project));
                $result = $getName->fetch();
                $pname = $result['name'];
                $getEmail = $this->db->prepare("select s.email from students s where s.id = :id");
                $getEmail->execute(array(':id' => $student));
                $result = $getEmail->fetch();
                $email = $result['email'];
                $this->mail->Subject = "ACATISM!";
                $this->mail->Body = 'Your application for the project "' . $pname . '" has been accepted!';
                $this->mail->AddAddress($email);

                if (!$this->mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $this->mail->ErrorInfo;
                }
            }
        }
    }

    public function declineStudent($student, $project)
    {
        $count = $this->db->prepare("select count(id) as nr from requests where id_project = :proj and id_student = :stud");
        $count->execute(array(
            ':proj' => $project,
            ':stud' => $student
        ));
        $res = $count->fetch();
        if($res['nr']==1) {
            $deleteRequest = $this->db->prepare("delete from requests where id_project = :pid and id_student = :sid");
            $deleteRequest->execute(array(
                ':pid' => $project,
                ':sid' => $student
            ));
            $getName = $this->db->prepare("select p.name from projects p where p.id = :id");
            $getName->execute(array(':id' => $project));
            $result = $getName->fetch();
            $pname = $result['name'];
            $getEmail = $this->db->prepare("select s.email from students s where s.id = :id");
            $getEmail->execute(array(':id' => $student));
            $result = $getEmail->fetch();
            $email = $result['email'];
            $this->mail->Subject = "ACATISM!";
            $this->mail->Body = 'Your application for the project "' . $pname . '" has been declined!';
            $this->mail->AddAddress($email);

            if (!$this->mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }
    }
}