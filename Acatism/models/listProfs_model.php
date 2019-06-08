<?php

class ListProfs_Model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getProfs(){
        $statement = $this->db->prepare("SELECT * from teachers");
        $statement->execute();
        $result = $statement->fetchAll();

        $prof = array();
        foreach ($result as $item){
            $prof[]=$item;
        }

        return $prof;
    }
}
