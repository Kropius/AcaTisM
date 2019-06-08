<?php

class ViewStudents_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getData()
    {
        $data = null;
        $myId = Session::get('idUser'); //id preluat din sesiune
        $getStudents = $this->db->prepare("SELECT p.name as project, p.id as project_id, s.id as student_id, s.name as student from teachers t join collaborations c on c.id_teacher = t.id 
          join students s on s.id = c.id_student join theses th on th.id_student = s.id join projects p on th.id_project = p.id where t.id = :id");
        $getStudents->execute(array(':id' => $myId));
        $result = $getStudents->fetchAll();
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

    public function deleteStudent($student, $project)
    {
        $myId = Session::get('idUser'); //id preluat din sesiune
        $count = $this->db->prepare("select count(id) as nr from collaborations where id_student = :stud and id_teacher = :prof");
        $count->execute(array(
            ':prof' => $myId,
            ':stud' => $student
        ));
        $res = $count->fetch();
        if ($res['nr'] == 1) {
            $deleteCollab = $this->db->prepare("delete from collaborations where id_teacher = :prof and id_student = :sid");
            $deleteCollab->execute(array(
                ':prof' => $myId,
                ':sid' => $student
            ));
            $deleteThesis = $this->db->prepare("delete from theses where id_project = :pid and id_student = :sid");
            $deleteThesis->execute(array(
                ':pid' => $project,
                ':sid' => $student
            ));
            $getName = $this->db->prepare("select t.name from teachers t where t.id = :id");
            $getName->execute(array(':id' => $myId));
            $result = $getName->fetch();
            $tname = $result['name'];
            $getEmail = $this->db->prepare("select s.email from students s where s.id = :id");
            $getEmail->execute(array(':id' => $student));
            $result = $getEmail->fetch();
            $email = $result['email'];
            $this->mail->Subject = "ACATISM!";
            $this->mail->Body = $tname.' has ended the collaboration with you!';
            $this->mail->AddAddress($email);
            if (!$this->mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }
    }
}