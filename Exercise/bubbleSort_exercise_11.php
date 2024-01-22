<?php
    $arr = [1,-5,7,3,2,8,0,4];
    $n = count($arr);

    for($i=0; $i<$n; $i++){
        for($j=0; $j<$n - $i -1; $j++){
            if($arr[$j] > $arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }

    foreach($arr as $i){
        echo "$i  ";
    }
?>