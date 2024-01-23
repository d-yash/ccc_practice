<?php
    $col = 9;
    $row;
    $start = 1;
    $end = $col;
    if($col % 2 == 0){
        $row = $col - 1;
        $mid = $col/2;
    }
    else{
        $row = $col;
        $mid = (int)($col/2) + 1;
    }

    for($i=1; $i<=$row; $i++){
        for($j=1; $j<$start; $j++){
            echo "_ ";
        }
        for($k=$start; $k<=$end; $k++){
            echo $k . " ";
        }
        for($j=1; $j<$start; $j++){
            echo "_ ";
        }

        if($i < $mid){
            $start++;
            $end--;
        }else{
            $start--;
            $end++;
        }
        echo "<br>";
    }
?>