<?php
    $term1 = 0;
    $term2 = 1;
    $n = 10;
    $term3;

    if($n >= 0)
        echo "$term1  ";
    if($n >= 1)
        echo "$term2  ";
    for($i=2; $i<=$n; $i++){
        $term3 = $term1 + $term2;
        echo "$term3  ";
        $term1 = $term2;
        $term2 = $term3;
    }
?>