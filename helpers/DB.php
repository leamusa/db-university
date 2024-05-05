<?php
require_once __DIR__ . '/../env.php';
class DB
{


  public static function connect()
  {

    $connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($connection && $connection->connect_error) {
      throw new Exception("DB Connection failed", 1);
    }

    return $connection;
  }



  public static function disconnect($connection)
  {
    $connection->close();
  }
}