<?php

/**
 * framework\core\libraries\classes\ethan\database\mysql.php
 * mysql資料庫操作類
 */

namespace Ethan\Database;


class mysql extends base
{
  private $host   = DB_HOST;
  private $dbname = DB_NAME;
  private $user   = DB_USER;
  private $pass   = DB_PASS;

  function __construct($host = $this->host, $dbname = $this->dbname, $user = $this->user, $pass = $this->pass)
  {
    // Set DSN
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
    // Set options
    $options = array(
      \PDO::ATTR_PERSISTENT => true,
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    );
    //Create a new PDO instance
    try {
      $this->dbh = new \PDO($dsn, $user, $pass, $options);
    }
    // Catch any errors
    catch (\PDOException $e) {
      $this->error = '資料庫連接失敗：' . $e->getMessage();
    }
  }
}
