<?php 
require_once "../functions/dbcon.php";

// call to function
?>
<table class="table table-striped" id="details_table">
	<tr>
		<th>Өвчний нэр</th>
		<th colspan='2'>Магадлал</th>
	</tr>

<?php
$all_symptoms =  mysqli_query($con,$query_symptoms);
//$str1 = $_REQUEST['symptoms']; // came from request that means it has detected 
$array = $_POST['answer'];

// Prepairing query to do task
$comparing_query = "SELECT COUNT(*) FROM symptoms WHERE";
// Array from form and prepairing all symptoms
foreach ($array as $key => $value) {
	$compare[] = "(question_id = ".$key." AND answer_id=".$value.")" ;
};
//Main Query to calculate all the data
$comparing_prepair = "SELECT COUNT(*), disease_id FROM symptoms WHERE ".implode(" OR ", $compare)." GROUP BY disease_id";
$result = mysqli_query($con, $comparing_prepair) or die(mysqli_error());
// Loop 
while ($results = mysqli_fetch_array($result)) {
	$percent = (float)$results['COUNT(*)'];
	$multify = 5; // Need to make this variable came from database
	// Getting Disease name from database in loop
	$disease_id = $results['disease_id'];
	$get_disease_name = "SELECT * FROM disease_name WHERE id = $disease_id";
	$get_row = mysqli_query($con,$get_disease_name) or die(mysqli_error());
	$get_data = mysqli_fetch_array($get_row);

	echo "<tr><td>".$get_data['disease_name']." </td><td> ".$percent*$multify."</td><td>%</td></tr>";
}
?>
</table>
<script type="text/javascript">
function find() {
  var tb= document.getElementById('details_table'),
      header = tb.getElementsByTagName('th'),
      cell,
      j,
      k;
  
  for(j = 0; j < header.length; j++) {
    if (header[j].innerText === 'Магадлал') {
      for(k = 1 ; k < tb.rows.length ; k++) {
        cell = tb.rows[k].cells[j]
        if(cell.innerText<='10') {
          cell.style.background= '#00d122';
        } else if (cell.innerText<='20'){
        	cell.style.background= '#31a81c';
        } else if (cell.innerText<='30'){
        	cell.style.background= '#578917';
        } else if (cell.innerText<='40'){
        	cell.style.background= '#5b8616';
        } else if (cell.innerText<='50'){
        	cell.style.background= '#ab9b18';
        } else if (cell.innerText<='60'){
        	cell.style.background= '#796e12';
        } else if (cell.innerText<='70'){
        	cell.style.background= '#9b510d';
        } else if (cell.innerText<='80'){
        	cell.style.background= '#b0400a';
        } else if (cell.innerText<='90'){
        	cell.style.background= '#d42406';
        } else if (cell.innerText<='100'){
        	cell.style.background= '#ff0000';
        }
      }
    }
  }
}

find();
</script>