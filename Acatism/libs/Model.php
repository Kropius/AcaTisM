<?php

class Model
{
    function __construct()
    {
        try {
            $this->db = new Database();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db->setAttribute(PDO::ATTR_PERSISTENT, TRUE);
        }
        catch(PDOException $e)
        {
            $e->getMessage();
        }
    }
}
