<?php
require('dbcon.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$query = "DELETE FROM $type WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: content.php"); 
?>

