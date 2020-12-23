<?php require_once "../functions/dbcon.php";


?>
<div>
	<div class="form">
		<div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
			<h2 class='text-center'>Өвчний нэр нэмэх</h2>
		</div>
		<form name="form" method="post" class="my-form" action="../functions/add.php"> 
			<label for="name_of_disease">Өвчний нэр</label>
			<input type="text" name="name_of_disease" aria-label="Small" id='disease_name'>
			<label for="disease_type">Өвчний төрөл</label>
			<select id='inputGroupSelect01' name="disease_type">
				<?php 
				$disease_type = mysqli_query($con,$query_dt);
				while($disease_types = mysqli_fetch_array($disease_type)){
					echo "<option value='".$disease_types['id']."'>".$disease_types['type_name']."</option>";
				}
			?>
			</select>
			<p><button type="submit" id="pre" class="btn btn-primary">Нэмэх</button></p>
		</form>

		<div class="results">
			<?php 


			?>
		</div>
	</div>
</div>

