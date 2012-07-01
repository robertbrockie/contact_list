<?php 

/**
*	Contact
*
*	Simple class to contain contact entries.
**/
class Contact
{
	public $id;
	public $first_name;
	public $last_name;
	public $number;
	public $type;

	public function __construct($id, $first_name, $last_name, $number, $type)
	{
		$this->id = $id;
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->number = $number;
		$this->type = $type;
	}
}