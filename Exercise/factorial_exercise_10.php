<?php
    $num = 5;
    $i = 1;
    $fact = 1;
    if($num > 0){
        while($i <= 5){
            $fact *= $i++;
        }
    }
    echo "Factorial of $num : $fact<br>";
?>