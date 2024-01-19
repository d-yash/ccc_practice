<?php
    $i = 1;
    echo "First 5 Natural numbers are : ";
    while($i <= 5){
        echo $i++ . " ";
    }
    echo "<br>";

    $n = 5;
    $copyOfN = $n;
    $fact = 1;
    while($copyOfN >= 1){
        $fact *= $copyOfN;
        $copyOfN--;
    }
    echo  "Factorial of " . $n . " = " . $fact . "<br>";
?>