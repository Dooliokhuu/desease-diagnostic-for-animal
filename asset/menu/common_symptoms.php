<?php 
require_once "../functions/dbcon.php";
echo "
<div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
    <h2 class='text-center'>Өвчнийг нийтлэг шинжээр оношлох</h2>
</div>
";?>
<?php   
  $question_result = mysqli_query($con,$query_q);               
?>
<form name="my-form" method="post" id="my-form" >
      <table  class="table table-striped">

        <tbody>
          <tr class="thead-dark">
            <th>Асуулт</th>
            <th>Хариулт</th>
          </tr>
          <?php   
            $question_result = mysqli_query($con,$query_q);               
          ?>
    
                <?php while($row_q = mysqli_fetch_array($question_result)){
                  $id = $row_q['id'];
                  echo "<tr><td><input value='".$row_q['id']."' type='hidden'/><p>".$row_q['question_text']."</p></td><td><select class='custom-select important' id='inputGroupSelect01".$row_q['id']."' name='answer[".$id."]'>";

                    $cat = $row_q['id'];
                    $query_a_qid  = "SELECT * FROM answer_id WHERE q_id = '$cat' ORDER BY answer_text ASC";
                    $get_q_id = mysqli_query($con,$query_a_qid) or die(mysql_error());

                          while($a_q_id = mysqli_fetch_array($get_q_id)) {
                              echo "<option value='".$a_q_id['id']."'>".$a_q_id['answer_text']."</option>";
                          }
                    
                  echo "</select></td></tr>";
                  }
                ?>

        </tbody>
      </table>
      <button type="submit" class="btn btn-primary">Оношлох</button>
      
</form>
<script>
$("#my-form").on("submit", function(e) {
    var dataString = $(this).serialize();
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../functions/task.php",
      data: dataString,
        success : function( response ) {
            $("#table-responsive").html(response);
        },
        error : function( response ) {
            alert("Unknown Error")
            console.error(response)
        }

    });
    
  });

</script>
