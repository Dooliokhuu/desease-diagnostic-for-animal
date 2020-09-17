<?php
class Menu {
  /* [DATABASE FUNCTIONS] */
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  public $lastID = null;

  function __construct() {
  // __construct() : connect to the database
  // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD

    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
        DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false]
      );
      return true;
    } catch (Exception $ex) {
      print_r($ex);
      die();
    }
  }

  function __destruct() {
  // __destruct() : close connection when done

    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }
 
  function exec($sql, $data=null) {
  // exec() : run insert, replace, update, delete query
  // PARAM $sql : SQL query
  //       $data : array of data
 
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      $this->lastID = $this->pdo->lastInsertId();
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return true;
  }

  function fetch($sql, $cond=null, $key=null, $value=null) {
  // fetch() : perform select query
  // PARAM $sql : SQL query
  //       $cond : array of conditions
  //       $key : sort in this $key=>data order, optional
  //       $value : $key must be provided, sort in $key=>$value order

    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      if (isset($key)) {
        $result = array();
        if (isset($value)) {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row[$value];
          }
        } else {
          while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
            $result[$row[$key]] = $row;
          }
        }
      } else {
        $result = $this->stmt->fetchAll();
      }
    } catch (Exception $ex) {
      $this->error = $ex;
      return false;
    }
    $this->stmt = null;
    return $result;
  }

  /* [MENU FUNCTIONS] */
  function get() {
  // get() : get the menu items

    $items = $this->fetch("SELECT * FROM `menu` ORDER BY `sort` ASC");
    return count($items)==0 ? false : $items ;
  }

  function add($label, $link, $target, $sort) {
  // add() : add a new menu item
  // PARAM $label : the menu label
  //       $link : menu link
  //       $target : link target SELF or BLANK
  //       $sort : sort order

    return $this->exec(
      "INSERT INTO `menu` (`label`, `link`, `target`, `sort`) VALUES (?, ?, ?, ?)",
      [$label, $link, $target, $sort]
    );
  }

  function edit($label, $link, $target, $sort, $id) {
  // edit() : update an existing menu item
  // PARAM $label : the menu label
  //       $link : menu link
  //       $target : link target SELF or BLANK
  //       $sort : sort order
  //       $id : menu ID

    return $this->exec(
      "UPDATE `menu` SET `label`=?, `link`=?, `target`=?, `sort`=? WHERE `menu_id`=?",
      [$label, $link, $target, $sort, $id]
    );
  }

  function delete($id) {
  // delete() : delete an existing menu item
  // PARAM $id : menu ID

    return $this->exec(
      "DELETE FROM `menu` WHERE `menu_id`=?",
      [$id]
    );
  }
}
?>