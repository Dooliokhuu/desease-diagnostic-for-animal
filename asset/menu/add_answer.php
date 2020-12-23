<?php
echo "<div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
        <h2 class='text-center'>Хариулт нэмэх</h2>
        <div class='btn-toolbar mb-2 mb-md-0'>
          <div class='btn-group mr-2'>
            <button type='button' class='btn btn-sm btn-outline-secondary'>Export</button>
          </div>
          
          <a type='button' class='btn btn-sm btn-outline-secondary' href='../menu/add.php?type=answer_id' target='_SELF'>
          Хариулт нэмэх
          </a>
        </div>
      </div>";
require_once "../functions/dbcon.php";
$result = mysqli_query($con,$query_a);
    $q = "SELECT count(*) as `counter` FROM `answer_id` ORDER BY `q_id` ASC";
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


    $q = "SELECT * FROM `answer_id` ORDER BY `q_id` ASC LIMIT ".$startrow.",".$max.";";
    $r = mysqli_query($con,$q);

echo "<table class='table table-striped'><thead class='thead-dark'>
    <tr>
      <th scope='col'>Хариултын дугаар</th>
      <th scope='col'>Асуулт</th>
      <th scope='col'>Хариулт</th>
      <th scope='col'></th>
      <th scope='col'></th>
    </tr>
</thead>"; 

while($row = mysqli_fetch_array($r)){   
echo "<tr><td>" . $row['id'] . "</td><td>" . $row['q_id'] . "</td><td>" . $row['answer_text'] . "</td><td><a target='_%s' href='../menu/edit.php?type=answer_id&id=". $row["id"]."'>Засварлах</a></td><td><a href='../functions/delete.php?type=answer_id&id=". $row["id"]."'>Устгах</a></td></tr>";  
}

echo "</table>"; 

?>
<nav aria-label="Хуудас">
  <ul class="pagination">
    <?php
        for($pgno = 1;$pgno <= $numpages;$pgno++) {
            echo "<li class='page-item'><a class='page-link' href='../menu/add_answer.php?currpageno=".$pgno."'>".$pgno."</a></li>";
        }
    ?>
  </ul>
</nav>
<script>
$(document).ready(function(){

    $("table.table a, .btn-toolbar a").click(function(){
        var link = $(this).attr("href");
        
        if (link != "#") {
            $.get(link, function(data){
                $('#overlay').show();
                $("#table-responsive").delay(2000).fadeIn().html(data);
                $('#overlay').fadeOut(500);
            });
        }
        return false;
    });

});
    $("ul.pagination a").click(function(){
        var link = $(this).attr("href");
        if (link != "#") {
            $.get(link, function(data){
                $("#table-responsive").html(data);
            });
        }
        return false;
    });
</script>