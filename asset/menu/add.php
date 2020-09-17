<?php require_once "../functions/dbcon.php";
$type=$_REQUEST['type'];
$counter = 0;
$max = 25;
?>
<div>
	<div class="form">
		<h1>Нэмэх <?php echo $type;?></h1>
		<form name="form" method="post" action="../functions/add.php"> 
			<input type="hidden" name="new" value="1" />

			<input type="hidden"  name="id"/>
			<?php 
				if ($type == 'question_id') {
					?>
						<p>
							<input type='hidden' name='id' placeholder='id'/>
							<input type='hidden' name='question_id' placeholder='Асуулт ID' required  />
						</p>
						<p>
							<label for='question_text'>Асуулт</label><br>
							<input type='text' name='question_text' placeholder='Асуулт' required  />
						</p>
						<p>
							<input type='hidden' name='question_extra' placeholder='Асуултын нэмэлт' required value="1"  />
						</p>
					<?php
				} else {
					?>

							<input type='hidden' name='id' placeholder='id'/>
						</p>
						<p>
							<?php 
							$question_result = mysqli_query($con,$query_q);
							?>
							<label for='q_id'>Асуулт</label><br>
							<select name='q_id'>
								<?php while($row = mysqli_fetch_array($question_result) and ($counter < $max)){
									echo "<option value='".$row['id']."'>".$row['question_text']."</option>";}
								?>
							</select>
						</p>
						<p>
							<label for='answer_text'>Хариулт</label><br>
							<input type='text' name='answer_text' placeholder='Асуулт' required  />
						</p>
						<p>

							<input type='hidden' name='answer_extra' placeholder='Асуулт' required  />
						</p>
					<?php
				}
					?>

				

			<p><input name="submit" type="submit" value="Шинэчлэх" /></p>
		</form>
	</div>
</div>