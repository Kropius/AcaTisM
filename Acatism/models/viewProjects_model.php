<?php

class ViewProjects_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getData()
    {
        //see the id from the session in order to get from concepts
        $myId = Session::get('idUser');
        $data = null;
        $i = 0;
        $getProjects = $this->db->prepare("SELECT p.id, p.name, p.short_description, p.long_description FROM projects p join concepts c on
            c.id_project = p.id join teachers t on t.id = c.id_teacher where t.id = :id");
        $getProjects->execute(array(':id' => $myId));
        $result = $getProjects->fetchAll();
        foreach( $result as $row ) {
            $data[$i]['id'] = $row['id'];
            $data[$i]['name'] = $row['name'];
            $data[$i]['short_description'] = $row['short_description'];
            $data[$i]['long_description'] = $row['long_description'];
            $getDeadlines = $this->db->prepare("SELECT d.mandatory_date, d.extension, d.format, d.description from deadlines d join projects p on 
              d.id_project = p.id where p.id = :id");
            $getDomains = $this->db->prepare("SELECT d.name from domains d join subjects s on s.id_domain = d.id join projects p on s.id_project
              = p.id where p.id = :id");
            $getDeadlines->execute(array(':id' => $data[$i]['id']));
            $result2 = $getDeadlines->fetchAll();
            $j = 0;
            foreach($result2 as $row2)
            {
                $data[$i]['deadlines'][$j]['mandatory_date'] = $row2['mandatory_date'];
                $data[$i]['deadlines'][$j]['extension'] = $row2['extension'];
                $data[$i]['deadlines'][$j]['format'] = $row2['format'];
                $data[$i]['deadlines'][$j]['description'] = $row2['description'];
                $j = $j + 1;
            }
            $getDomains->execute(array(
                ':id' => $row['id']
            ));
            $result3 = $getDomains->fetchAll();
            $j = 0;
            foreach($result3 as $row3)
            {
                $data[$i]['domains'][$j]['name'] = $row3['name'];
                $j = $j + 1;
            }
            $i = $i + 1;
        }
        return $data;
    }
}