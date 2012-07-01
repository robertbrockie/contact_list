<?php
class Database {
  var $host;
  var $user;
  var $pass;
  var $database;
  var $persistent=0;
  var $last_query;
  var $result;
  var $connection_id;
  var $num_queries=0;
function configure($host, $user, $pass, $database, $persistent=0)
  {
    $this->host=$host;
    $this->user=$user;
    $this->pass=$pass;
    $this->database=$database;
    $this->persistent=$persistent;
    return 1; //Success.
  }
  function connect()
  {
    if(!$this->host) { $this->host="localhost"; }
    if(!$this->user) { $this->user="root"; }
    if($this->persistent)
    {
      $this->connection_id=mysql_pconnect($this->host, $this->user, $this->pass) or $this->connection_error();
    }
    else
    {
      $this->connection_id=mysql_connect($this->host, $this->user, $this->pass, 1) or $this->connection_error();
    }
    mysql_select_db($this->database, $this->connection_id);
    return $this->connection_id;
  }
  function disconnect()
  {
    if($this->connection_id) { mysql_close($this->connection_id); $this->connection_id=0; return 1; }
    else { return 0; }
  }
}
