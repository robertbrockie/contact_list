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
    
    //what are we doing?
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
        $this->edit($vals['id']);
        break;
      }

      case "list":
      {
        $this->listing();
        break;
      }

      case "search":
      {
        $this->search();
        break;
      }

      case "update":
      {
        $this->update();
        break;
      }
    }
  }

  /**
  * index
  *
  * Display the application to the user.
  *
  **/
  public function index()
  {
    $contacts = $this->contact_model->GetContacts();
    include("view/template.php");
  }

  /**
  * add()
  *
  * Validate the proper contact fields and add the contact.
  *
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
      $errors['type'] = "Type is required.";
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
  * Delete($id)
  *
  * Remove a specific contact.
  *
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
  * Edit($id)
  *
  * Display the edit contact form.
  *
  **/
  public function edit($id)
  {
    //get the current contact details
    $contact = $this->contact_model->GetContact($id);

    //ajax calls will be done via post
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      //Javascript will take care of handling the edit 
      //fields.
    }
    else
    {
      //display the contact for editing
      include('view/header.php');
      include('view/edit_contact.php');
      include('view/footer.php');
    }
  }

  /**
  * List()
  *
  * List all contacts in the database, sorted and ordered
  * specified in $vals
  *
  **/
  public function listing()
  {
    //get all the data inputted
    $vals = array_merge($_POST, $_GET);

    //get the field/ordering
    $field = isset($vals['field']) ? $vals['field'] : 'last_name';
    $order = isset($vals['order']) ? $vals['order'] : 'asc';

    //get the contacts
    $contacts = $this->contact_model->GetContacts($field, $order);

    //ajax calls will be done via post
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      //javascript will put the html where it needs to be.
      include('view/list_contacts.php');
    }
    else
    {
      //display the ordered fields.
      include('view/template.php');
    }
  }

  /**
  * Update
  *
  * Update the information of a contact in the database.
  **/
  public function update()
  {
    //get all the data inputted
    $vals = array_merge($_POST, $_GET);

    //validate the data
    $errors = array();

    //TODO:move the bulk of this to the validation library.
    if(empty($vals['id']))
      $errors['id'] = "Cannot update a contact without an id.";
    if(empty($vals['last_name']))
      $errors['last_name'] = "Last name is required.";
    if(empty($vals['first_name']))
      $errors['first_name'] = "First name is required.";
    if(empty($vals['type']))
      $errors['type'] = "Type is required.";
    if(empty($vals['number']))
      $errors['number'] = "Number is required.";

    // All AJAX calls are done via a POST request. This is because
    // I want the application to function if Javascript isn't enabled.
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      if(count($errors) == 0)
      {
        //update the contact
        $this->contact_model->UpdateContact($vals);
      }

      //get the updated contact
      $contact = $this->contact_model->GetContact($vals['id']);
      include("view/edit_row.php");

    }
    else
    {
      //If we are error free, add the new contact and redirect to the 
      //index page to update the contact list.
      if(count($errors) == 0)
      {
        //update the contact
        $this->contact_model->UpdateContact($vals);
        header('Location: index.php');
      }
      else
      {
        //display the errors
        $contact = $this->contact_model->GetContact($vals['id']);
        include("view/header.php");
        include("view/edit_contact.php");
        include("view/footer.php");
      }
    }
  }
}