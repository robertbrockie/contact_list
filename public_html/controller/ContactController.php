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
    //the default action is 'add'
    $action = isset($_GET['action']) ? $_GET['action'] : "add";

    switch ($action)
    {
      case "add":
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
          //validate the data
          $errors = array();

          //TODO:move the bulk of this to the validation library.
          if(empty($_POST['last_name']))
            $errors['last_name'] = "Last name is required.";
          if(empty($_POST['first_name']))
            $errors['first_name'] = "First name is required.";
          if(empty($_POST['type']))
            $errors['type'] = "Number type is required.";
          if(empty($_POST['number']))
            $errors['number'] = "Number is required.";

          //if validation passed add the contact, otherwise send back
          //the errors and data to fill out the form.
          if(count($errors) == 0)
          {
            $this->contact_model->AddContact($_POST);
          }
          else
          {
            //pass the data back to the view for the user to update
            $data = $_POST;
          }

          include('view/add_contact.php');
        }
        else
        {
          include('view/add_contact.php');
        }
    }

  }
}
