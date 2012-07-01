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
    
    /**
    *   AddContact
    *
    *   Add a new contact and an associated phone number.
    *   Returns true if the contact and number are successfully created,
    *   false otherwise.
    **/
    public function AddContact($data)
    {
        //insert the contact
        $query = sprintf("INSERT INTO contact (first_name, last_name) VALUES ('%s', '%s')",
            mysql_real_escape_string($data['first_name']),
            mysql_real_escape_string($data['last_name']));
        
        $contact_id = $this->db->insert($query);

        //insert the contact's number
        $query = sprintf("INSERT INTO number (contact_id, type, number) VALUES (%d, '%s', '%s')",
            $contact_id,
            mysql_real_escape_string($data['type']),
            mysql_real_escape_string($data['number']));

        $number_id = $this->db->insert($query);

        return ($contact_id > 0 && $number_id);

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