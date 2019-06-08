<?php
class EditProfileStudent_Model extends Model
{
    public $oldinfo;
    function __construct()
    {
        parent::__construct();
    }
    public function execute()
    {
        $myid=Session::get('idUser');

        //aici vreau sa aflu ce interese mai aveam daca e null, inseamna ca nu am acel interes,  e gol
        $getinfo=$this->db->query("Select * from interests where id_student=$myid");
        //$oldinfo=$getinfo->fetch();
        $nr=0;
        $oldinterests=array();
        $oldinterests[0]=null;
        $oldinterests[1]=null;
        $oldinterests[2]=null;
        while ($row = $getinfo->fetch()) {
            $oldinterests[$nr++]=$row;
        }
        $oldinterest1=$oldinterests[0];
        $oldinterest2=$oldinterests[1];
        $oldinterest3=$oldinterests[2];



        $experience=null;
        $description=null;
        $subject1=null;
        $subject2=null;
        $subject3=null;
        $study=null;
        $lastgrade=null;
        $contactEmail=null;
        $contactPhone=null;

        //aici doar updatez profilul
        if(isset($_POST['description'])) {
            $description = $_POST['description'];
        }
        if(isset($_POST['subjects1'])) {
            $subject1 = $_POST['subjects1'];
        }
        if(isset($_POST['subjects2'])) {
            $subject2 = $_POST['subjects2'];
        }
        if(isset($_POST['subjects3'])) {
            $subject3 = $_POST['subjects3'];
        }
        if(isset($_POST['experience'])) {
        $experience = $_POST['experience'];}
        if(isset($_POST['Study'])) {
        $study=$_POST['Study'];}
        if(isset($_POST['LastGrade'])) {
        $lastgrade=$_POST['LastGrade'];}
        if(isset($_POST['ContactEmail'])) {
            $contactEmail = $_POST['ContactEmail'];
        }
        if(isset($_POST['ContactPhone'])) {
            $contactPhone = $_POST['ContactPhone'];
        }


       $sql= 'UPDATE `students`
   SET `description` = :description,
        `experience` = :experience, 
        `studies` = :study,
        `lastgrade`= :lastgrade,
        `email` = :contactemail,
        `phone` = :contactphone
        where `id` = :myid';
       $state=$this->db->prepare($sql);
       $state->bindValue(":description",$description);
       $state->bindValue(":experience",$experience);
       $state->bindValue(":study",$study);
       $state->bindValue(":lastgrade",$lastgrade);
       $state->bindValue(":contactemail",$contactEmail);
       $state->bindValue(":contactphone",$contactPhone);
       $state->bindValue(":myid",$myid);
       $state->execute();



        //aici iau id-urile domeniilor pe care le-am selectat
        //$getInfo = $this->db->query("Select * from students where id=$myid");
       $domain1=$this->db->query("Select * from `domains` where `name`='".$subject1."'");
       $domain2=$this->db->query("Select * from `domains` where `name`='".$subject2."'");
       $domain3=$this->db->query("Select * from domains where `name`='".$subject3."'");
       $domaininfo1=$domain1->fetch();
       $domaininfo2=$domain2->fetch();
       $domaininfo3=$domain3->fetch();

        if($domaininfo1['name']==$domaininfo2['name'])
            $domaininfo1=null;
        if($domaininfo2['name']==$domaininfo3['name'])
            $domaininfo2=null;
        if($domaininfo3['name']==$domaininfo1['name'])
            $domaininfo3=null;
        //daca nu am avut pana acum aceasta linie
       if($oldinterests[0]['id_domain']==null)
       {
           $getId = $this->db->query("Select max(id) from interests");
           $result = $getId->fetch();
           if(null == $result['max(id)'])
               $result['max(id)'] = 0;
           $idInteres=$result['max(id)']+1;

           //daca am selectat un domeniu
           if($domaininfo1!=null)
           {
              $sql= "Insert into interests (id, id_student,id_domain) VALUES (?,?,?)";
              $STM=$this->db->prepare($sql);
              $STM->execute([$idInteres,$myid,$domaininfo1['id']]);
           }
           else
           {
               //daca nu am avut un domeniu si nu am selectat nicio optoune, atunci lasam asa
               //$sql= "Delete from interests where";
           }
       }
       else{
           $getId = $this->db->query("Select max(id) from interests");
           $result = $getId->fetch();
           if(null == $result['max(id)'])
               $result['max(id)'] = 0;
           $idInteres=$result['max(id)']+1;
           if($domaininfo1!=null)
           {

               $sql= "UPDATE `interests`
                      SET `id_domain` = :iddomain
                      where `id_student` = :myid 
                      and `id_domain` = :oldinterest ";
               $STM=$this->db->prepare($sql);
              $STM->bindValue(":iddomain",$domaininfo1['id']);
              $STM->bindValue(":myid",$myid);
              $STM->bindValue(":oldinterest",$oldinterests[0]['id_domain']);
              $STM->execute();
           }
           else{
               $sql= "Delete from  `interests`
                      where `id_student` = :myid 
                      and `id_domain` = :oldinterest ";
               $STM=$this->db->prepare($sql);
//               $STM->bindValue(":iddomain",$domaininfo1['id']);
               $STM->bindValue(":myid",$myid);
               $STM->bindValue(":oldinterest",$oldinterests[0]['id_domain']);
               $STM->execute();
           }
       }

        if($oldinterests[1]['id_domain']==null)
        {
            $getId = $this->db->query("Select max(id) from interests");
            $result = $getId->fetch();
            if(null == $result['max(id)'])
                $result['max(id)'] = 0;
            $idInteres=$result['max(id)']+1;
            //daca am selectat un domeniu
            if($domaininfo2!=null)
            {
                $sql= "Insert into interests (id, id_student,id_domain) VALUES (?,?,?)";
                $STM=$this->db->prepare($sql);
                $STM->execute([$idInteres,$myid,$domaininfo2['id']]);
            }
            else
            {
                //daca nu am avut un domeniu si nu am selectat nicio optoune, atunci lasam asa
                //$sql= "Delete from interests where";
            }
        }
        else{
            $getId = $this->db->query("Select max(id) from interests");
            $result = $getId->fetch();
            if(null == $result['max(id)'])
                $result['max(id)'] = 0;
            $idInteres=$result['max(id)']+1;
            if($domaininfo2!=null)
            {

                $sql= "UPDATE `interests`
                      SET `id_domain` = :iddomain
                      where `id_student` = :myid 
                      and `id_domain` = :oldinterest ";
                $STM=$this->db->prepare($sql);
                $STM->bindValue(":iddomain",$domaininfo2['id']);
                $STM->bindValue(":myid",$myid);
                $STM->bindValue(":oldinterest",$oldinterests[1]['id_domain']);
                $STM->execute();
            }
            else{
                $sql= "Delete from  `interests`
                      where `id_student` = :myid 
                      and `id_domain` = :oldinterest ";
                $STM=$this->db->prepare($sql);
//               $STM->bindValue(":iddomain",$domaininfo1['id']);
                $STM->bindValue(":myid",$myid);
                $STM->bindValue(":oldinterest",$oldinterests[1]['id_domain']);
                $STM->execute();
            }
        }
        if($oldinterests[2]['id_domain']==null)
        {
            $getId = $this->db->query("Select max(id) from interests");
            $result = $getId->fetch();
            if(null == $result['max(id)'])
                $result['max(id)'] = 0;
            $idInteres=$result['max(id)']+1;
            //daca am selectat un domeniu
            if($domaininfo3!=null)
            {
                $sql= "Insert into interests (id, id_student,id_domain) VALUES (?,?,?)";
                $STM=$this->db->prepare($sql);
                $STM->execute([$idInteres,$myid,$domaininfo3['id']]);
            }
            else
            {
                //daca nu am avut un domeniu si nu am selectat nicio optoune, atunci lasam asa
                //$sql= "Delete from interests where";
            }
        }
        else{
            $getId = $this->db->query("Select max(id) from interests");
            $result = $getId->fetch();
            if(null == $result['max(id)'])
                $result['max(id)'] = 0;
            $idInteres=$result['max(id)']+1;
            if($domaininfo3!=null)
            {
                $sql= "UPDATE `interests`
                      SET `id_domain` = :iddomain
                      where `id_student` = :myid 
                      and `id_domain` = :oldinterest ";

                $STM=$this->db->prepare($sql);
                $STM->bindValue(":iddomain",$domaininfo3['id']);
                $STM->bindValue(":myid",$myid);
                $STM->bindValue(":oldinterest",$oldinterests[2]['id_domain']);
                $STM->execute();
            }
            else{
                $sql= "Delete from  `interests`
                      where `id_student` = :myid 
                      and `id_domain` = :oldinterest ";
                $STM=$this->db->prepare($sql);
//               $STM->bindValue(":iddomain",$domaininfo1['id']);
                $STM->bindValue(":myid",$myid);
                $STM->bindValue(":oldinterest",$oldinterests[2]['id_domain']);
                $STM->execute();
            }
        }

       //explicatie: daca nu am 3 preferinte bagate in bd, va trebuie sa fac alter table, pentru a adauga o noua coloana
        // daca am 3 preferinte inseamna ca dau update si nu alter table
        //daca am preferintele deja in tabela dar eu doar aleg 2 preferinte, trebuie sa fiu atent sa dau update si renunt la una din chestii
    }
    public function prepare_info()
    {
        $myid=Session::get('idUser');

        //aici vvreau sa aflu ce interese mai aveam daca e null, inseamna ca nu am acel interes,  e gol
        $getinfo=$this->db->query("Select * from students where id=$myid");
        $oldinfo=$getinfo->fetch();
        $this->oldinfo=$oldinfo;


    }
}