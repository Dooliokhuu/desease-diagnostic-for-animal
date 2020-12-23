<?php 


    $q = "SELECT count(*) as `counter` FROM `question_id` ORDER BY `question_extra` ASC";
    $qc = mysqli_query($con,$q);
    if($c) {
        if($t = mysqli_fetch_assoc($c)) {
            $counter = $t['counter'];
        }
    }
    $a = "SELECT count(*) as `counter` FROM `answer_id` ORDER BY `q_id` ASC";
    $ac = mysqli_query($con,$a);
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


    $q = "SELECT * FROM `question_id` ORDER BY `question_extra` ASC LIMIT ".$startrow.",".$max.";";
    $a = "SELECT * FROM `answer_id` ORDER BY `q_id` ASC LIMIT ".$startrow.",".$max.";";
    $rq = mysqli_query($con,$q);
    $ra = mysqli_query($con,$a);
?>