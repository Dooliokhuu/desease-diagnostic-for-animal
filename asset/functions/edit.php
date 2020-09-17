<?php
require_once "../functions/dbcon.php";
// $type=$_REQUEST['type'];
$id=$_REQUEST['id'];

// $update_query = "SELECT * from $type where id='".$id."'"; 
// $result = mysqli_query($con, $update_query) or die ( mysqli_error());
// $row = mysqli_fetch_assoc($result);
?>

<div class="form">
<h1>Update</h1>
<?php
$status = "";
	if (isset($_REQUEST['question_id'])) {
		$id=$_REQUEST['id'];
		$question_id = $_REQUEST['question_id'];
		$question_text =$_REQUEST['question_text'];
		$type='question_id';

		$update_query="update ".$type." set question_id=NULL,question_text='".$question_text."' where id='".$id."'";
		mysqli_query($con, $update_query) or die(mysqli_error());
		header('Location: content.php');
		$status = "Асуултыг амжилттай засварлалаа. </br></br>";
	} elseif (isset($_REQUEST['answer_id'])) {
		$id=$_REQUEST['id'];
		$q_id = $_REQUEST['answer_id'];
		$answer_text =$_REQUEST['answer_text'];
		$type='answer_id';

		$update_query="update ".$type." set q_id='".$q_id."',answer_text='".$answer_text."' where id='".$id."'";

		mysqli_query($con, $update_query) or die(mysqli_error());
		header('Location: content.php');
		$status = "Хариултыг амжилттай засварлалаа. </br></br>";
	} else {
		echo "Ямар нэгэн зүйл буруу байна";
	}
	echo '<p style="color:#FF0000;">'.$status.'</p>';


