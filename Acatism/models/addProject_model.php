<?php

class AddProject_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function execute()
    {
        $countProj = $this->db->prepare("select count(id) as nr from concepts where id_teacher = :tid");
        $countProj->execute(array(
           ':tid' => Session::get('idUser')
        ));
        $rez = $countProj->fetch();
        if($rez['nr'] >= 12)
            return -4;
        $getId = $this->db->query("Select max(id) from projects");
        $getDomain = $this->db->prepare("select d.id from domains d where d.name = :thisname;");
        $result = $getId->fetch();
        if(null == $result['max(id)'])
            $result['max(id)'] = 0;
        $idProj = intval($result['max(id)']) + 1;
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
        if(null != $name && null!= $short && null != $long) {
            $insertProject = $this->db->prepare("INSERT INTO projects (id, name, short_description, long_description, added_date, last_edit) 
              VALUES (:id, :pname, :short, :long, sysdate(), sysdate())");
            $insertProject->execute(array(
                ':id' => $idProj,
                ':pname' => $name,
                ':short' => $short,
                ':long' => $long
            ));
            if(null!=$date1 && null!=$ext1 && null!= $for1 && null!=$desc1)
            {
                $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :id_proj, sysdate())");
                $insertDeadline->execute(array(
                    ':mdate' => $date1,
                    ':ext' => $ext1,
                    ':format' => $for1,
                    ':descr' => $desc1,
                    ':id_proj' => $idProj
                ));
            }
            if(null!=$date2 && null!=$ext2 && null!= $for2 && null!=$desc2)
            {
                $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :id_proj, sysdate())");
                $insertDeadline->execute(array(
                    ':mdate' => $date2,
                    ':ext' => $ext2,
                    ':format' => $for2,
                    ':descr' => $desc2,
                    ':id_proj' => $idProj
                ));
            }
            if(null!=$date3 && null!=$ext3 && null!= $for3 && null!=$desc3)
            {
                $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :id_proj, sysdate())");
                $insertDeadline->execute(array(
                    ':mdate' => $date3,
                    ':ext' => $ext3,
                    ':format' => $for3,
                    ':descr' => $desc3,
                    ':id_proj' => $idProj
                ));
            }
            if(null!=$date4 && null!=$ext4 && null!= $for4 && null!=$desc4)
            {
                $insertDeadline = $this->db->prepare("INSERT INTO deadlines(id, mandatory_date, extension, format, description, id_project, last_edit)
                  VALUES (NULL, STR_TO_DATE(:mdate, '%d-%m-%y'), :ext, :format, :descr, :id_proj, sysdate())");
                $insertDeadline->execute(array(
                    ':mdate' => $date4,
                    ':ext' => $ext4,
                    ':format' => $for4,
                    ':descr' => $desc4,
                    ':id_proj' => $idProj
                ));
            }
            $insertConcept = $this->db->prepare("INSERT INTO concepts (id, id_teacher, id_project) 
              VALUES (NULL, :my_id, :id)");
            $insertConcept->execute(array(
                ':my_id' => Session::get('idUser'), //aici ar veni id-ul profului luat din sesiune
                ':id' => $idProj
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
            $insertSubject = $this->db->prepare("INSERT INTO subjects (id, id_domain, id_project) values 
                (NULL, :id_dom, :id_proj)");
            if($domain1['id'] == $domain2['id'] || $domain2['id'] == $domain3['id'])
                $domain2 = null;
            if($domain1['id'] == $domain3['id'])
                $domain3 = null;
            if($domain1!=null)
                $insertSubject->execute(array(
                    ':id_dom' => $domain1['id'],
                    ':id_proj' => $idProj
                ));
            if($domain2!=null)
                $insertSubject->execute(array(
                    ':id_dom' => $domain2['id'],
                    ':id_proj' => $idProj
                ));
            if($domain3!=Null)
                $insertSubject->execute(array(
                    ':id_dom' => $domain3['id'],
                    ':id_proj' => $idProj
                ));
            return 1;
        }
        else
        {
            return -3;
        }
    }
}