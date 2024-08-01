<?php
class Hana
{
  private $host = "odbc:SAPHANA";
  private $user = "SYSTEM";
  private $pwd = "BXSbec2022";

  public function __construct()
  {

  }

  public function connect()
  {
    $conn = new PDO ($this->host, $this->user, $this->pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);

    return $conn;
  }

  public function SQLtoHANA($SQL)
  {
    $query = str_replace(["[","]"], ["\"", "\""], $SQL);

    return $query;
  }
}

 ?>
