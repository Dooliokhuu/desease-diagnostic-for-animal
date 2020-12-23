<?php require_once "../functions/dbcon.php";


?>
<div>
	<div class="form">
		<div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
			<h2 class='text-center'>Өвчний нийтлэг шинж тэмдэг тохируулах </h2>
		</div>
		<form name="form" method="post" class="my-form" action="../functions/add.php"> 
			<label for="disease_id">Өвчний нэр сонгох</label>
			<select id='inputGroupSelect01' name="disease_id">
				<?php 
				$disease_name = mysqli_query($con,$query_disease_name);
				while($disease_names = mysqli_fetch_array($disease_name)){
					echo "<option value='".$disease_names['id']."'>".$disease_names['disease_name']."</option>";
				}
			?>
			</select>
			<h3>Шинж тэмдэгүүд</h3>
			<table  class="table table-striped">

				<tbody>
					<tr class="thead-dark">
						<th>Асуумж</th>
						<th>Хариулт</th>
					</tr>
					<?php 	
						$question_result = mysqli_query($con,$query_q);								
					?>
		
								<?php while($row_q = mysqli_fetch_array($question_result)){
									$id = $row_q['id'];
									echo "<tr><td><input value='".$row_q['id']."' name='".$row_q['id']."' type='hidden'/><p>".$row_q['question_text']."</p></td><td><select class='custom-select important' id='inputGroupSelect01".$row_q['id']."' name='answer[".$id."]'>";

										$cat = $row_q['id'];
										$query_a_qid  = "SELECT * FROM answer_id WHERE q_id = '$cat'";
										$get_q_id = mysqli_query($con,$query_a_qid) or die(mysql_error());

							            while($a_q_id = mysqli_fetch_array($get_q_id)) {
							                echo "<option value='".$a_q_id['id']."'>".$a_q_id['answer_text']."</option>";
							            }
										
									echo "</select></td></tr>";
									}
								?>

				</tbody>
			</table>
			<p><button type="submit" id="pre" class="btn btn-primary">Шинж тэмдэгийг бүртгэх</button></p>
		</form>

		<div class="results">
			<?php 


			?>
		</div>
	</div>
</div>
