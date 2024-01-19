<?php
// Example: Print numbers from 1 to 5 using a for loop
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 5; $j >= 1; $j--) {
            if($i >= $j){
                echo $j;
            }
            echo " ";
        }
        echo "<br>";
        // echo $i . " ";
    }

    //Parth
    // echo "( 3 )  Pattern<br>";
    for ($i = 5; $i > 0; $i--) {
        for ($j = 1; $j <= 5; $j++) {
            if ($j <= $i) {
                echo $j;
            }
        }
    echo "<br>";
    }

    //Dhruvit
    for($i=1; $i<5;$i++){
        for($j=1;$j<5;$j++){
            echo $j;
            if($i==$j){
                break;   
            }
        }
        echo "<br>";
    }

    //Devendra
    for($i=0;$i<5;$i++)
    {
        for($j=0;$j<5;$j++)
        {   
            if(($i+$j)>=5)
                echo "-";
            else
                echo $j;
        }
        echo "<br>";
    }   
?>