<?php

/**
 * framework\core\libraries\classes\lmly9193\database\base.php
 * 資料庫操作類
 */

namespace lmly9193\Database;


class base
{
  public $dbh;
  public $error;

  public $stmt;

  function __construct()
  {
    var_dump(get_class_methods($this));
  }

  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bindParam($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = \PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = \PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = \PDO::PARAM_NULL;
          break;
        default:
          $type = \PDO::PARAM_STR;
      }
    }
    $this->stmt->bindParam($param, $value, $type);
  }

  public function bindValue($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = \PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = \PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = \PDO::PARAM_NULL;
          break;
        default:
          $type = \PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    return $this->stmt->execute();
  }

  public function fetchAll()
  {
    $this->execute();
    return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function fetch()
  {
    $this->execute();
    return $this->stmt->fetch(\PDO::FETCH_ASSOC);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }

  /**
   * Transactions allow multiple changes to a database all in one batch.
   */
  public function beginTransaction()
  {
    return $this->dbh->beginTransaction();
  }

  public function endTransaction()
  {
    return $this->dbh->commit();
  }

  public function cancelTransaction()
  {
    return $this->dbh->rollBack();
  }

  public function debugDumpParams()
  {
    return $this->stmt->debugDumpParams();
  }
}
