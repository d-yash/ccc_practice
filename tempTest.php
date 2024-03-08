<?php
$k = 1;
for($i = 1; $i <= 10; ) {
    // for ($j = 1; $j <= 10; $j++) {
    //     $ans = $i * $j;
    //     echo "{$ans}  ";
    // }
    $ans = $i * $k;
    $k++;
    echo "{$ans}  ";
    if($k > 10){
        $k = 1;
        $i++;
        echo "<br><br>";
    }
}