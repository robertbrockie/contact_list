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
        $query = sprintf("INSERT INTO contact (first_name, last_name, type, number) VALUES ('%s', '%s', '%s', '%s')",
            mysql_real_escape_string($data['first_name']),
            mysql_real_escape_string($data['last_name']),
            mysql_real_escape_string($data['type']),
            mysql_real_escape_string($data['number']));

        $contact_id = $this->db->insert($query);

        return ($contact_id > 0);

    }

    /**
    *   GetContact
    *
    *   Get a contact by id
    **/
    public function GetContact($id)
    {
        $query = sprintf("SELECT * FROM contact WHERE id='%d'", $id);
        $result = $this->db->query($query);

        //get the contact we want
        $row = mysql_fetch_assoc($result);
        $contact = new Contact($row['id'], $row['first_name'], $row['last_name'], $row['number'], $row['type']);
        
        return $contact;
    }

    /**
    *   GetContacts
    *
    *   Get a list of contacts from the database.
    **/
    public function GetContacts($field = "last_name", $order = "desc")
    {
        $query = sprintf("SELECT * FROM contact ORDER BY %s %s ", 
                    mysql_real_escape_string($field),
                    mysql_real_escape_string($order));

        $result = $this->db->query($query);

        //get the contacts we want
        $contacts = array();
        while ($row = mysql_fetch_assoc($result))
        {
            array_push($contacts, new Contact(
                    $row['id'], $row['first_name'], $row['last_name'],
                    $row['number'], $row['type']));
        }

        return $contacts;
    }

    /**
    *   DeleteContact
    *
    *   Remove a contact from the database by their id.
    **/
    public function DeleteContact($id)
    {  
        $query = sprintf("DELETE FROM contact WHERE id='%s'", $id);
        $result = $this->db->query($query);

        return $result;
    }

    /**
    *   UpdateContact
    *
    *   Update the information for a specific contact.
    **/
    public function UpdateContact($data)
    {
        //insert the contact
        $query = sprintf("UPDATE contact SET first_name='%s', last_name='%s', type='%s', number='%s' WHERE id='%s'",
            mysql_real_escape_string($data['first_name']),
            mysql_real_escape_string($data['last_name']),
            mysql_real_escape_string($data['type']),
            mysql_real_escape_string($data['number']),
            mysql_real_escape_string($data['id']));

        $result = $this->db->query($query);

        return $result;
    }
}