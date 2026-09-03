<?php
class Hana
{
  //private $host = "odbc:SAPHANA";
  private $user = "SYSTEM";
  private $pwd = "BXSbec2022";
  private $dsn = "";

  public function __construct()
  {
    $this->dsn = "odbc:Driver={HDBODBC};ServerNode=192.168.201.19:30015;UID={$this->user};PWD={$this->pwd};Database=BEC2;CHAR_AS_UTF8=TRUE;WString=True;";
  }

  public function connect()
  {
    $conn = new PDO($this->dsn);
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
