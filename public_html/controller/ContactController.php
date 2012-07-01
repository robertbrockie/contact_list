<?php

//include_once("model/Validate.php");
include_once("model/ContactModel.php");

class ContactController
{
  public $contact_model;

  public function __construct()  
  {
    $this->contact_model = new ContactModel();
  }

  public function invoke()  
  {
    //invoke will take care of figuring out 
    $vals = array_merge($_POST, $_GET);
    $action = isset($vals['action']) ? $vals['action'] : "index";

    switch ($action)
    {
      case "index":
      {
        $this->index();
        break;
      }
      
      case "add":
      {
        $this->add();
        break;
      }

      case "delete":
      {
        $this->delete($vals['id']);
        break;
      }

      case "edit":
      {
        $this->edit($_GET['id']);
        break;
      }

      case "list":
      {
        $this->listing();
        break;
      }
    }
  }

  /**
  * index
  *
  * Display the application to the user.
  **/
  public function index()
  {
    $contacts = $this->contact_model->GetContacts();
    include("view/template.php");
  }

  /**
  * add()
  *
  * Validate the proper contact fields.
  **/
  public function add()
  {
    //get all the data inputted
    $vals = array_merge($_POST, $_GET);

    //validate the data
    $errors = array();

    //TODO:move the bulk of this to the validation library.
    if(empty($vals['last_name']))
      $errors['last_name'] = "Last name is required.";
    if(empty($vals['first_name']))
      $errors['first_name'] = "First name is required.";
    if(empty($vals['type']))
      $errors['type'] = "Number type is required.";
    if(empty($vals['number']))
      $errors['number'] = "Number is required.";

    // All AJAX calls are done via a POST request. This is because
    // I want the application to function if Javascript isn't enabled.
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      //If we are error free, add the new contact and clear the vals
      //because we don't need to populate the form anymore.
      if(count($errors) == 0)
      {
        $this->contact_model->AddContact($vals);
        unset($vals);
      }
      
      include('view/add_contact.php');
    }
    else
    {
      //If we are error free, add the new contact and redirect to the 
      //index page to update the contact list.
      if(count($errors) == 0)
      {
        //add the contact
        $this->contact_model->AddContact($vals);
        header('Location: index.php');
      }
      else
      {
        //display the errors
        $contacts = $this->contact_model->GetContacts();
        include("view/template.php");
      }
    }
  }

  /**
  * delete($id)
  *
  * Remove a specific contact.
  **/
  public function delete($id)
  {
    $result = $this->contact_model->DeleteContact($id);

    //ajax calls will be done via post
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      //do something?
    }
    else
    {
      header('Location: index.php');
    }
  }

  /**
  * edit($id)
  *
  * Edit the fields of a specific contact.
  **/
  public function edit($id)
  {
    //do something
  }

  /**
  * list
  *
  * List all contacts in the database.
  **/
  public function listing()
  {
    //get the latest contacts
    $contacts = $this->contact_model->GetContacts();

    //ajax calls will be done via post
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      include('view/list_contacts.php');
    }
    else
    {
      include('view/header.php');
      include('view/list_contacts.php');
      include('view/footer.php');
    }
  }



}
