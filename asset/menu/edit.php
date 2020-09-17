<?php
require_once "../functions/dbcon.php";
$type=$_REQUEST['type'];
$id=$_REQUEST['id'];

$update_query = "SELECT * from $type where id='".$id."'"; 
$result = mysqli_query($con, $update_query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<div class="form">
	<h1>Нэмэх <?php echo $type;?></h1>
	<div>
		<form name="form" method="post" action="../functions/edit.php"> 
			<input type="hidden" name="new" value="1" />

			<input name="id" value="<?php echo $row['id'];?>" />
			<?php 
				if ($type== 'question_id') {
					?>
						<p>
							<label for='question_id'>Асуултын дугаар</label>
							<input type='hidden' name='question_id' placeholder='Асуулт ID' required value='<?php echo $row['question_id'];?>' />
						</p>
						<p>
							<label for='question_text'>Асуулт</label><br>
							<input type='text' name='question_text' placeholder='Асуулт' required value='<?php echo $row['question_text'];?>' />
						</p>
					<?php
				} else {
					?>
						<p>
							<label for='answer_id'>Хариултын дугаар</label>
							<input type='hidden' name='answer_id' placeholder='Асуулт ID' required value='<?php echo $row['q_id'];?>' />
						</p>
						<p>
							<label for='answer_id'>Хариулт</label><br>
							<input type='text' name='answer_text' placeholder='Асуулт' required value='<?php echo $row['answer_text'];?>' />
						</p>
					<?php
				}
					?>

				

			<p><input name="submit" type="submit" value="Шинэчлэх" /></p>
		</form>
	</div>
</div>
