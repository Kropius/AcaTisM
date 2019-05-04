<?php

class AddProject_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function execute()
    {
        //see the id from the session in order to insert into concepts
        $getId = $this->db->query("Select max(id) from projects");
        $result = $getId->fetch();
        if(null == $result['max(id)'])
            $result['max(id)'] = 0;
        $idProj = intval($result['max(id)']) + 1;
        $name = $_POST['name'];
        $short = $_POST['short'];
        $long = $_POST['task'];
        $recom = $_POST['recom'];
        if(null != $name && null!= $short && null != $long && null!= $recom) {
            $insertProject = $this->db->prepare("INSERT INTO projects (id, name, short_description, long_description, tools, added_date) 
              VALUES (:id, :pname, :short, :long, :recom, sysdate())");
            $insertProject->execute(array(
                ':id' => $idProj,
                ':pname' => $name,
                ':short' => $short,
                ':long' => $long,
                ':recom' => $recom
            ));
            $insertConcept = $this->db->prepare("INSERT INTO concepts (id, id_teacher, id_project) 
              VALUES (NULL, :my_id, :id)");
            $insertConcept->execute(array(
                ':my_id' => 3, //aici ar veni id-ul profului luat din sesiune
                ':id' => $idProj
            ));
        }
    }
}