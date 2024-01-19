<?php
    $diff = 10;
    $lower = ($diff*100)/($diff + 100);
    $higher = ($diff*100)/(100-$diff);

    echo "A is 10% higher than B, Then how much percent B is lower ??<br>";
    echo "Ans : " . round($lower, 2) . "<br><br>";
    echo "B is 10% lower than A, Then how much percent A is higher ??<br>";
    echo "Ans : " . round($higher, 2) . "<br>";
?>