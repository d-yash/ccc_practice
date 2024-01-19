<?php
    $carArray = array("Audi", "Porsche", "Rangerover", "Bently");
    foreach($carArray as $i){
        echo $i . "<br>";
    }

    $numArray = array(24, 3, 30, 11);
    $sum = 0;
    foreach($numArray as $i){
        $sum += $i;
    }
    echo "<br>Sum of Array : $sum<br>";  

    $sumOfOdd = 0;
    $sumOfEven = 0;
    $intArray = array(2,4,5,7,8,9);
    foreach($intArray as $i){
        if($i % 2 == 0){
            $sumOfEven += $i;
        }else{
            $sumOfOdd += $i;
        }
    }
    echo "Sum of Odd numbers : $sumOfOdd<br>";
    echo "Sum of Even numbers : $sumOfEven<br>";
?>