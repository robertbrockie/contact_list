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
        //TODO:remove debugging
        error_log("delete: ".$vals['id']);

        $this->delete($vals['id']);
        break;
      }

      case "edit":
      {
        $this->edit($_GET['id']);
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

    //if validation passed add the contact, otherwise send back
    //the errors and data to fill out the form.
    if(count($errors) == 0)
    {
      //add the contact
      $this->contact_model->AddContact($vals);
      header('Location: index.php');
    }

    //ajax calls will be done via post
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      include('view/add_contact.php');
    }
    else
    {
      //update the contacts for display
      $contacts = $this->contact_model->GetContacts();
      include("view/template.php");
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



}
