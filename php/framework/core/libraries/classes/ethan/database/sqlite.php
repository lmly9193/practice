<?php

/**
 * framework\core\libraries\classes\ethan\database\sqlite.php
 * sqlite資料庫操作類
 */

namespace Ethan\Database;


class sqlite extends base
{
  private $db_file = DB_FILE;

  function __construct($db_file = $this->db_file)
  {
    // Set DSN
    $dsn = 'sqlite:' . $db_file;
    // Set options
    $options = array(
      \PDO::ATTR_PERSISTENT => true,
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    );
    //Create a new PDO instance
    try {
      $this->dbh = new \PDO($dsn, null, null, $options);
    }
    // Catch any errors
    catch (\PDOException $e) {
      $this->error = '資料庫連接失敗：' . $e->getMessage();
    }
  }
}
