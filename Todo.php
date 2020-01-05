<?php

namespace MyApp;

class Todo {
  private $_db;
  
  public function __construct() {
    // DBのエラーの例外処理
    try {
      $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }

  /**
   * Todoのid高い順に全件取得をする
   */
  public function getAll() {
    $stmt = $this->_db->query("select * from todos order by id desc");
    return $stmt->fetchAll(\PDO::FETCH_OBJ);
  }
}