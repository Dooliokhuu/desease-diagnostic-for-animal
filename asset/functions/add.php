<?php
require_once "../functions/dbcon.php";

// $id=$_REQUEST['id'];

// $update_query = "SELECT * from $type where id='".$id."'"; 
// $result = mysqli_query($con, $update_query) or die ( mysqli_error());
// $row = mysqli_fetch_assoc($result);
?>

<?php
$status = "";
		if (isset($_REQUEST['question_text'])) {
			$question_text =$_REQUEST['question_text'];
			$question_extra =$_REQUEST['question_extra'];

			$add_q_query= "INSERT INTO `question_id` (`id`, `question_id`, `question_text`, `question_extra`) VALUES (NULL, NULL, '".$question_text."', '".$question_extra."');";
			var_dump($add_q_query);
			mysqli_query($con, $add_q_query) or die(mysqli_error());
			header('Location: content.php');
			$status = "Асуултыг амжилттай нэмлээ. </br></br>";

		} elseif (isset($_REQUEST['answer_text'])) {
			$q_id = $_REQUEST['q_id'];
			$answer_text =$_REQUEST['answer_text'];
			$answer_extra =$_REQUEST['answer_extra'];

			$add_a_query="INSERT INTO `answer_id` (`id`, `q_id`, `answer_text`, `answer_extra`) VALUES (NULL, '".$q_id."', '".$answer_text."', '".$answer_extra."');";
			var_dump($add_a_query);
			mysqli_query($con, $add_a_query) or die(mysqli_error());
			header('Location: content.php');
			$status = "Хариултыг амжилттай нэмэгдлээ. </br></br>";
		} else {
			echo "Ямар нэгэн зүйл буруу байна";
		}
		echo '<p style="color:#FF0000;">'.$status.'</p>';
