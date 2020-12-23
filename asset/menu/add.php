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
							<input type='hidden' name='id' placeholder='Асуулт ID' required  />
						</p>
						<p>
							<label for='question_text'>Асуулт оруулах хэсэг</label><br>
							<input class="form-control" aria-label="Small" type='text' name='question_text' placeholder='Асуултаа бичнэ үү' required  />
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
							<label for='q_id'>Асуултаа сонгоно уу</label><br>
							<select class="custom-select" id="inputGroupSelect01" name='q_id'>
								<?php while($row = mysqli_fetch_array($question_result) and ($counter < $max)){
									echo "<option value='".$row['id']."'>".$row['question_text']."</option>";}
								?>
							</select>
						</p>
						<p>
							<label for='answer_text'>Хариулт бичих хэсэг</label><br>
							<input class="form-control" aria-label="Small" type='text' name='answer_text' placeholder='Хариултаа бичнэ үү' required  />
						</p>
						<p>

							<input type='hidden' name='answer_extra' placeholder='Асуултын нэмэлт' required  />
						</p>
					<?php
				}
					?>

				

			<p><button type="submit" class="btn btn-primary">Нэмэх</button></p>
		</form>
	</div>
</div>