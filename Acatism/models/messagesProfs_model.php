<?php

class MessagesProfs_Model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getNameFromId($id){
        $statement = $this->db->prepare("SELECT name from students where id='$id'");
        $statement->execute();

        $result = $statement->fetch();

        return $result['name'];

    }

    public function getNames(){
        $names = array();
        $statement = $this->db->prepare("SELECT * from students");
        $statement->execute();

        while($result = $statement->fetch()){//storing all the students names
            $names[] = $result['name'];
        }

        return $names;
    }

    public function sendMessage(){
        $idProf = Session::get('idUser');
        $message = $_POST['mesaj'];
        $studName= $_POST['selectName'];

        $statement = $this->db->prepare("SELECT id from students where name='$studName'");
        $statement->execute();
        $result = $statement->fetch();
        $idStud=$result['id'];

        $curDate = date("Y-m-d H:i:s");

        $stmt = $this->db->prepare("INSERT into messages(id_teacher,id_student,content,id_sender,sent_date) VALUES (?,?,?,?,?)");
        $stmt->execute([$idProf,$idStud,$message,$idProf,$curDate]);
    }

    public function getMessages()
    {
        $messages = array();
        $idProf = Session::get('idUser');

        $statement = $this->db->prepare("SELECT * FROM messages where id_teacher='$idProf' and id_sender!='$idProf'");
        $statement->execute();
        $result = $statement->fetchAll();

        foreach ($result as $item){
            $messages[] = $item;
        }

        $messagesFinal= array();
        foreach ($messages as $message){
            $message['id_sender'] = $this->getNameFromId($message['id_sender']);
            $messagesFinal[] = $message;
        }
        return $messagesFinal;
    }
}
