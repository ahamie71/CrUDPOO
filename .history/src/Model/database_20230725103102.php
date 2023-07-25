<?php

name


class Database
{
  private $host = "localhost";
  private $db_name = "CrudProduit";
  private $username = "ronaldo";
  private $password = "123";
  private $pdo;

  public function __construct($db_name = 'CrudProduit', $username = 'ronaldo', $password = '123', $host = 'localhost')
  {
    $this->$db_name = $db_name;
    $this->$username = $username;
    $this->$password = $password;
    $this->$host = $host;
  }

  public function getPDO()
  {
    if ($this->pdo == null) {
      $pdo = new PDO('mysql:dbname=CrudProduit;host=localhost', 'ronaldo', '123');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo = $pdo;
    }
    
    return $this->pdo;
  }

  public function query($statement)
  {
    $req = $this->getPDO()->query($statement);
    $datas = $req->fetchAll(PDO::FETCH_OBJ);
    return $datas;
  }
}
