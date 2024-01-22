<?php
    $num = 97;
    $flag = 1;
    if($num==0 || $num==1)
        $flag = 0;

    for($i=2; $i<=sqrt($num); $i++){
        if($num%$i == 0){
            $flag = 0;
            break;
        }
    }

    if($flag == 1){
        echo "$num is prime";
    }else{
        echo "$num is not prime";
    }
?>