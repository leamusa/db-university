<?php

class Course
{

  /**
   * Gets all courses from the database
   * @param mysqli $connection A db connection instance
   * @return mysqli_result 
   */
  public static function all($connection)
  {
    $sql = "SELECT * FROM `courses`";

    return $connection->query($sql);
  }
}