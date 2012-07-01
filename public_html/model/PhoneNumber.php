<?php

class PhoneNumber
{
	public $id;
	public $type;
	public $number;

	public function __construct($id, $type, $number)
	{
		$this->id = $id;
		$this->type = $type;
		$this->number = $number;
	}
}