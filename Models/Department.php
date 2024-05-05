<?php

class Department
{

  /**
   * Gets all Departments from the database
   * @param mysqli $connection A db connection instance
   * @return mysqli_result 
   */
  public static function all($connection)
  {
    $sql = "SELECT * FROM `departments`";

    return $connection->query($sql);
  }
}