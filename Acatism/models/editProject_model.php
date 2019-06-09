<?php

class EditProject_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getPastData($project)
    {
        $myId = Session::get('idUser');
        $exists = $this->db->prepare("select count(id) as nr from concepts where id_project = :pid and id_teacher = :tid");
        $exists->execute(array(
            ':pid' => $project,
            'tid' => $myId
        ));
        $count = $exists->fetch();
        if($count['nr'] == 0)
            return -1;
        $data = null;
        $getProject = $this->db->prepare("SELECT p.id, p.name, p.short_description, p.long_description FROM projects p 
            where p.id = :id");
        $getProject->execute(array(':id' => $project));
        $result = $getProject->fetch();
        $data['id'] = $result['id'];
        $data['name'] = $result['name'];
        $data['short_description'] = $result['short_description'];
        $data['long_description'] = $result['long_description'];
        $getDeadlines = $this->db->prepare("SELECT DATE_FORMAT(d.mandatory_date, '%d-%m-%Y') as mandatory_date, d.extension, d.format, d.description from deadlines d join projects p on 
            d.id_project = p.id where p.id = :id");
        $getDomains = $this->db->prepare("SELECT d.name from domains d join subjects s on s.id_domain = d.id join projects p on s.id_project
            = p.id where p.id = :id");
        $getDeadlines->execute(array(':id' => $project));
        $result2 = $getDeadlines->fetchAll();
        $j = 0;
        foreach($result2 as $row2)
        {
            $data['deadlines'][$j]['mandatory_date'] = $row2['mandatory_date'];
            $data['deadlines'][$j]['extension'] = $row2['extension'];
            $data['deadlines'][$j]['format'] = $row2['format'];
            $data['deadlines'][$j]['description'] = $row2['description'];
            $j = $j + 1;
        }
        $getDomains->execute(array(
            ':id' => $project
        ));
        $result3 = $getDomains->fetchAll();
        $j = 0;
        foreach($result3 as $row3)
        {
            $data['domains'][$j]['name'] = $row3['name'];
            $j = $j + 1;
        }
        return $data;
    }

    public function delete($project)
    {
        $myId = Session::get('idUser');
        $exists = $this->db->prepare("select count(id) as nr from concepts where id_project = :pid and id_teacher = :tid");
        $exists->execute(array(
            ':pid' => $project,
            'tid' => $myId
        ));
        $count = $exists->fetch();
        if($count['nr'] == 0)
            return -1;
        $getEmails = $this->db->prepare("select s.email from students s join theses th on s.id = th.id_student where th.id_project = :pid");
        $getEmails->execute(array(
            ':pid' => $project
        ));
        $result = $getEmails->fetchAll();
        foreach($result as $stud)
        {
            $this->mail->Subject = "ACATISM!";
            $this->mail->Body = 'Your teacher deleted the project you were working on and the collaboration ended. Please look for a new project!';
            $this->mail->AddAddress($stud['email']);
            if (!$this->mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }
        $deleteCollab = $this->db->prepare("delete cl from collaborations cl
          join students s on s.id = cl.id_student join theses th on s.id = th.id_student where th.id_project = :pid");
        $deleteCollab->execute(array(
           ':pid' => $project
        ));
        $deleteProject = $this->db->prepare("delete p from projects p where p.id = :pid");
        $deleteProject->execute(array(
           ':pid' => $project
        ));
        return 1;
    }

    public function execute($project)
    {
        $myId = Session::get('idUser');
        $exists = $this->db->prepare("select count(id) as nr from concepts where id_project = :pid and id_teacher = :tid");
        $exists->execute(array(
            ':pid' => $project,
            'tid' => $myId
        ));
        $count = $exists->fetch();
        if($count['nr'] == 0)
            return -1;
        $getEmails = $this->db->prepare("select s.email from students s join theses th on s.id = th.id_student where th.id_project = :pid");
        $getEmails->execute(array(
            ':pid' => $project
        ));
        $result = $getEmails->fetchAll();
        foreach($result as $stud)
        {
            $this->mail->Subject = "ACATISM!";
            $this->mail->Body = 'Your teacher updated the project you are working on! Check it out to be safe!';
            $this->mail->AddAddress($stud['email']);
            if (!$this->mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }
        $getDomain = $this->db->prepare("select d.id from domains d where d.name = :thisname");
        $name = $_POST['name'];
        $short = $_POST['short'];
        $long = $_POST['task'];
        $dom1 = $_POST['domain1'];
        $dom2 = $_POST['domain2'];
        $dom3 = $_POST['domain3'];
        $domain1 = null;
        $domain2 = null;
        $domain3 = null;
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $date3 = $_POST['date3'];
        $date4 = $_POST['date4'];
        $ext1 = $_POST['ext1'];
        $ext2 = $_POST['ext2'];
        $ext3 = $_POST['ext3'];
        $ext4 = $_POST['ext4'];
        $for1 = $_POST['for1'];
        $for2 = $_POST['for2'];
        $for3 = $_POST['for3'];
        $for4 = $_POST['for4'];
        $desc1 = $_POST['desc1'];
        $desc2 = $_POST['desc2'];
        $desc3 = $_POST['desc3'];
        $desc4 = $_POST['desc4'];
        if(null != $name)
        {
            $updateName = $this->db->prepare("UPDATE projects set name = :nm, last_edit = sysdate() where id = :pid");
            $updateName->execute(array(
                ':nm' => $name,
                ':pid' => $project
            ));
        }
        if(null != $short)
        {
            $updateShort = $this->db->prepare("UPDATE projects set short_description = :sd, last_edit = sysdate() where id = :pid");
            $updateShort->execute(array(
                ':sd' => $short,
                ':pid' => $project
            ));
        }
        if(null != $long)
        {
            $updateShort = $this->db->prepare("UPDATE projects set long_description = :ld, last_edit = sysdate() where id = :pid");
            $updateShort->execute(array(
                ':ld' => $long,
                ':pid' => $project
            ));
        }
        $deleteDeadlines = $this->db->prepare("delete from deadlines where id_project = :pid");
        $deleteDeadlines->execute(array(
            ':pid' => $project
        ));
        if(null!=$date1 && null!=$ext1 && null!= $for1 && null!=$desc1)
        {
            $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :pid, sysdate())");
            $insertDeadline->execute(array(
                ':mdate' => $date1,
                ':ext' => $ext1,
                ':format' => $for1,
                ':descr' => $desc1,
                ':pid' => $project
            ));
        }
        if(null!=$date2 && null!=$ext2 && null!= $for2 && null!=$desc2)
        {
            $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :pid, sysdate())");
            $insertDeadline->execute(array(
                ':mdate' => $date2,
                ':ext' => $ext2,
                ':format' => $for2,
                ':descr' => $desc2,
                ':pid' => $project
            ));
        }
        if(null!=$date3 && null!=$ext3 && null!= $for3 && null!=$desc3)
        {
            $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :pid, sysdate())");
            $insertDeadline->execute(array(
                ':mdate' => $date3,
                ':ext' => $ext3,
                ':format' => $for3,
                ':descr' => $desc3,
                ':pid' => $project
            ));
        }
        if(null!=$date4 && null!=$ext4 && null!= $for4 && null!=$desc4)
        {
            $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :pid, sysdate())");
            $insertDeadline->execute(array(
                ':mdate' => $date4,
                ':ext' => $ext4,
                ':format' => $for4,
                ':descr' => $desc4,
                ':pid' => $project
            ));
        }
        $deleteSubjects = $this->db->prepare("delete from subjects where id_project = :pid");
        $deleteSubjects->execute(array(
            ':pid' => $project
        ));
        if($dom1 != 'Null') {
            $getDomain->execute(array(':thisname' => $dom1));
            $domain1 = $getDomain->fetch();
        }
        if($dom2 != 'Null') {
            $getDomain->execute(array(':thisname' => $dom2));
            $domain2 = $getDomain->fetch();
        }
        if($dom3 != 'Null')
        {
            $getDomain->execute(array(':thisname' => $dom3 ));
            $domain3 = $getDomain->fetch();
        }
        $updateSubject = $this->db->prepare("INSERT INTO subjects (id, id_domain, id_project) values 
                (NULL, :id_dom, :pid)");
        if($domain1['id'] == $domain2['id'] || $domain2['id'] == $domain3['id'])
            $domain2 = null;
        if($domain1['id'] == $domain3['id'])
            $domain3 = null;
        if($domain1!=null)
            $updateSubject->execute(array(
                ':id_dom' => $domain1['id'],
                ':pid' => $project
            ));
        if($domain2!=null)
            $updateSubject->execute(array(
                ':id_dom' => $domain2['id'],
                ':pid' => $project
            ));
        if($domain3!=Null)
            $updateSubject->execute(array(
                ':id_dom' => $domain3['id'],
                ':pid' => $project));
        return 1;
    }
}