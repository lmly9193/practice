<?php

/**
 * framework\core\libraries\classes\lmly9193\database\mssql.php
 * mssql資料庫操作類
 */

namespace lmly9193\Database;


class mssql extends base
{
  private $host   = DB_HOST;
  private $dbname = DB_NAME;
  private $user   = DB_USER;
  private $pass   = DB_PASS;

  function __construct($host = $this->host, $dbname = $this->dbname, $user = $this->user, $pass = $this->pass)
  {
    // Set DSN
    $dsn = 'sqlsrv:Server=' . $host . ';Database=' . $dbname;
    // Set options
    $options = array(
      \PDO::ATTR_PERSISTENT => true,
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      \PDO::SQLSRV_ATTR_ENCODING, \PDO::SQLSRV_ENCODING_UTF8
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
