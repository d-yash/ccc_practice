<?php
    echo "First 5 Natural numbers are : ";
    for($i=1; $i<=5; $i++){
        echo $i . " ";
    }

    $sum = 0;
    for($i=1; $i<=10; $i++){
        $sum += $i;
    }
    echo "<br><br>Addition of first 10 natural numbers are : $sum";

    echo "<h4>Patterns</h4>";
    $noOfLines = 4;
    for($i=0; $i<$noOfLines; $i++){
        for($j=0; $j<$noOfLines; $j++){
            echo "* ";
        }
        echo "<br>";
    }
    echo "<br>";

    for($i=0; $i<$noOfLines; $i++){
        for($j=0; $j<=$i; $j++){
            echo "* ";
        }
        echo "<br>";
    }
    echo "<br>";

    for($i=0; $i<$noOfLines; $i++){
        for($j=0; $j<$noOfLines-$i; $j++){
            echo "* ";
        }
        echo "<br>";
    }
    echo "<br>";
    
    $digit = 1;
    for($i=0; $i<$noOfLines; $i++){
        for($j=0; $j<=$i; $j++){
            echo $digit++ . " ";
        }
        echo "<br>";
    }
    echo "<br>";

    for($i=1; $i<=$noOfLines; $i++){
        for($j=1; $j<=$i; $j++){
            echo $i . " ";
        }
        echo "<br>";
    }
    echo "<br>";

    for($i=1; $i<=$noOfLines; $i++){
        for($j=$noOfLines; $j>=$i; $j--){
            echo $i . " ";
        }
        echo "<br>";
    }
    echo "<br>";

    for($i=1; $i<=$noOfLines; $i++){
        for($j=1; $j<=$i; $j++){
            echo $j . " ";
        }
        echo "<br>";
    }
    echo "<br>";

    for($i=1; $i<=$noOfLines; $i++){
        for($j=$noOfLines; $j>=$i; $j--){
            echo $j . " ";
        }
        echo "<br>";
    }
    echo "<br>";

    for($i=1; $i<$noOfLines; $i++){
        for($j)
    }
?>