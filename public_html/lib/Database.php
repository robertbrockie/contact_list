<?php

class Database
{
  public $hostname = "localhost";
  public $username = "root";
  public $password = "foobar";
  public $database = "contact_list";
  public $result;
  public $connection_id;

  public function connect()
  {
    $this->connection_id=mysql_pconnect($this->hostname, $this->username, $this->password) or $this->connection_error();
    
    mysql_select_db($this->database, $this->connection_id);
    return $this->connection_id;
  }
  
  public function disconnect()
  {
    if($this->connection_id)
    {
      mysql_close($this->connection_id);
      $this->connection_id = 0;
      return 1;
    }
    else
      return 0;
  }

  public function connection_error()
  {
    die("<b>DATABASE CONNECTION ERROR:</b> Couldn't connect to database ".$this->database." on ".$this->hostname." (".mysql_error().")");
  }

  public function query($query)
  {
    $this->result=mysql_query($query, $this->connection_id) or $this->query_error();
    return $this->result;
  }

  public function insert($query)
  {
    return $this->query($query) ? mysql_insert_id() : 0;
  }

  function query_error()
  {
    die("<b>QUERY ERROR:</b> ".mysql_error());
  }

}
