<?php

class MessagesStuds_Model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getNameFromId($id){
        $statement = $this->db->prepare("SELECT name from teachers where id='$id'");
        $statement->execute();

        $result = $statement->fetch();

        return $result['name'];
    }

    public function getNames(){
        $names = array();
        $statement = $this->db->prepare("SELECT * from teachers");
        $statement->execute();

        while($result = $statement->fetch()){//storing all the teachers names
            $names[] = $result['name'];
        }

        return $names;
    }

    public function sendMessage(){
        $idStud= Session::get('idUser');
        $message = $_POST['mesaj'];
        $teacherName= $_POST['selectName'];

        $statement = $this->db->prepare("SELECT id from teachers where name='$teacherName'");
        $statement->execute();
        $result = $statement->fetch();
        $idProf=$result['id'];

        $curDate = date("Y-m-d H:i:s");

        $stmt = $this->db->prepare("INSERT into messages(id_teacher,id_student,content,id_sender,sent_date) VALUES (?,?,?,?,?)");
        $stmt->execute([$idProf,$idStud,$message,$idStud,$curDate]);
    }

    public function getMessages()
    {
        $messages = array();
        $idStud = Session::get('idUser');

        $statement = $this->db->prepare("SELECT * FROM messages m
                                                    JOIN students s on m.id_student=s.id
                                                    JOIN teachers t on m.id_teacher=t.id
                                                    where id_student='$idStud'");
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
