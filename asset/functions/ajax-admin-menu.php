<?php
// INIT
require __DIR__ . DIRECTORY_SEPARATOR . "dbcon.php";
require PATH_LIB . "admin_menu.php";
$menuLib = new Menu();

// HANDLE AJAX REQUEST
switch ($_POST['req']) {
  default:
    echo "ERROR";
    break;

  // GET MENU ITEMS
  case "get":
    echo json_encode($menuLib->get());
    break;

  // ADD NEW MENU ITEM
  case "add":
    echo $menuLib->add($_POST['label'], $_POST['link'], $_POST['target'], $_POST['sort']) ? "OK" : "ERROR" ;
    break;

  // EDIT MENU ITEM
  case "edit":
    echo $menuLib->edit($_POST['label'], $_POST['link'], $_POST['target'], $_POST['sort'], $_POST['id']) ? "OK" : "ERROR" ;
    break;

  // DELETE MENU ITEM
  case "del":
    echo $menuLib->del($_POST['id']) ? "OK" : "ERROR" ;
    break;
}
?>