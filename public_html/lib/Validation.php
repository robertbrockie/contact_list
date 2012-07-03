<?php

/**
* Validation
*
* A very simple validation class that can handle validating required
* fields in a form. 
*
**/
class Validation
{

  //store required fields and error messages
  public $required_fields = array();

  /**
  * add_field
  *
  * Add a field and an error message for validation
  *
  **/
  public function required_field($field, $message)
  {
    //add the field and message
    $this->required_fields[$field] = $message;
  }

  /**
  * run
  *
  * Validate $data against the fields that are currently required.
  * Return true if data is validated, return an array of fields and messages
  * otherwise.
  *
  **/
  public function run($data)
  {
    foreach($this->required_fields as $field => $message)
    {
      //check to see that the field exists and not empty
      if(!isset($data[$field]) || trim($data[$field]) == "")
        $errors[$field] = $message;
    }

    return $errors;
  }
}
