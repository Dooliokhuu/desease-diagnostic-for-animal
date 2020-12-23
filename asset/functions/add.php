<?php
require_once "../functions/dbcon.php";

// $id=$_REQUEST['id'];

// $update_query = "SELECT * from $type where id='".$id."'"; 
// $result = mysqli_query($con, $update_query) or die ( mysqli_error());
// $row = mysqli_fetch_assoc($result);
?>

<?php
$status = "";
		if (isset($_REQUEST['question_text'])) { //questions
			$question_text =$_REQUEST['question_text'];
			$question_extra =$_REQUEST['question_extra'];

			$add_q_query= "INSERT INTO `question_id` (`id`, `question_id`, `question_text`, `question_extra`) VALUES (NULL, NULL, '".$question_text."', '".$question_extra."');";
			mysqli_query($con, $add_q_query) or die(mysqli_error());
			header('Location: content.php');
			$status = "Асуултыг амжилттай бүртгэлээ. </br></br>";


		} elseif (isset($_REQUEST['answer_text'])) { //answer
			$q_id = $_REQUEST['q_id'];
			$answer_ =$_REQUEST['answer_text'];
			$answer_extra =$_REQUEST['answer_extra'];
			$add_a_query="INSERT INTO `answer_id` (`id`, `q_id`, `answer_text`, `answer_extra`) VALUES (NULL, '".$q_id."', '".$answer_text."', '".$answer_extra."');";
			mysqli_query($con, $add_a_query) or die(mysqli_error());
			header('Location: content.php');
			$status = "Хариултыг амжилттай бүртгэлээ. </br></br>";


		} elseif (isset($_REQUEST['disease_id'])) { //symptoms 
			$disease_id = $_REQUEST['disease_id'];
			$question_answer = $_POST['answer'];
			foreach ($question_answer as $key => $value) {
				$add_a_query="INSERT INTO `symptoms` (`id`, `disease_id`, `question_id`, `answer_id`) VALUES (NULL, '".$disease_id."', '".$key."', '".$value."');";
			mysqli_query($con, $add_a_query) or die(mysqli_error());
			}
			
			header('Location: content.php');
			$status = "Шинж тэмдэгүүдийг амжилттай бүртгэлээ. </br></br>";


		} elseif(isset($_REQUEST['name_of_disease'])){ //disease
			$disease_name=$_REQUEST['name_of_disease'];
			$type_id=$_REQUEST['disease_type'];
			$add_a_query="INSERT INTO `disease_name` (`id`, `disease_name`, `type_id`, `symptoms`) VALUES (NULL, '".$disease_name."', '".$type_id."', NULL);";
			mysqli_query($con, $add_a_query) or die(mysqli_error());

			header('Location: content.php');
			$status = "Өвчин амжилттай бүртгэлээ. </br></br>";



		} else {
			echo "Ямар нэгэн зүйл буруу байна";
		}
		echo '<p style="color:#FF0000;">'.$status.'</p>';
		return $status;
