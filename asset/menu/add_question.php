<?php
echo "<div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
        <h1 class='h2'>Асуулт нэмэх</h1>
        <div class='btn-toolbar mb-2 mb-md-0'>
          <div class='btn-group mr-2'>
            <button type='button' class='btn btn-sm btn-outline-secondary'>Export</button>
          </div>
          <button type='button' class='btn btn-sm btn-outline-secondary dropdown-toggle'>
            <span data-feather='calendar'></span>
            This week
          </button>
          <a type='button' class='btn btn-sm btn-outline-secondary' href='../menu/add.php?type=question_id' target='_SELF'>
          Асуулт нэмэх
          </a>
        </div>
      </div>";
require_once "../functions/dbcon.php";
$result = mysqli_query($con,$query_a);
    $q = "SELECT count(*) as `counter` FROM `question_id` ORDER BY `id` ASC";
    $c = mysqli_query($con,$q);
    if($c) {
        if($t = mysqli_fetch_assoc($c)) {
            $counter = $t['counter'];
        }
    }


    $currpage = isset($_REQUEST['currpageno']) && $_REQUEST['currpageno'] != 0 ? $_REQUEST['currpageno'] : 1;
    $numpages = ceil($counter / $max);
    $startrow = ($currpage - 1) * $max;
    if($startrow > $counter) {
        $startrow = $counter - $max;
    }
    if($startrow < 0) {
        $startrow = 0;
    }


    $q = "SELECT * FROM `question_id` ORDER BY `id` ASC LIMIT ".$startrow.",".$max.";";
    $r = mysqli_query($con,$q);
// $result = mysqli_query($con,$query_q);

echo "<table class='table'><thead class='thead-dark'>
    <tr>
      
      <th scope='col'>Асуултын дугаар</th>
      <th scope='col'>Асуулт</th>

      <th scope='col'></th>
      <th scope='col'></th>
    </tr>
</thead>"; 

while($row = mysqli_fetch_array($r)){   
echo "<tr><td>" . $row['id'] . "</td><td>" . $row['question_text'] . "</td><td><a target='_SELF' href='../menu/edit.php?type=question_id&id=". $row["id"]."'>Засварлах</a></td><td><a href='../functions/delete.php?type=question_id&id=". $row["id"]."'>Устгах</a></td></tr>";  
}
echo "</table>"; 
?>
<script>
$(document).ready(function(){
    $("table.table a").click(function(){
        var link = $(this).attr("href");
        if (link != "#") {
            $.get(link, function(data){
                $("#table-responsive").html(data);
            });
        }
        return false;
    });

});
    $(".btn-toolbar a").click(function(){
        var link = $(this).attr("href");
        if (link != "#") {
            $.get(link, function(data){
                $("#table-responsive").html(data);
            });
        }
        return false;
    });
</script>