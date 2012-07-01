<?php

include_once("lib/Database.php");
include_once("model/Contact.php");
include_once("model/PhoneNumber.php");

class ContactModel
{
    //database connection
    public $db;

    public function __construct()  
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function __destruct()
    {
        $this->db->disconnect();
    }
    
    public function AddContact($data)
    {
        var_dump($this->db);
        return 0;
    }
      
    public function DeleteContact($id)
    {  
        return 0;
    }

    public function UpdateContact($data)
    {
        return 0;
    }
}