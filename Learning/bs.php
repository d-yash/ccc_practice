<?php
    $arr = array(1,2,3,5,7,9,11,16);
    $target = 9;
    $n = count($arr);
    $low = 0; 
    $high = $n - 1;

    while($low <= $high){
        $mid = (int)($low + ($high-$low)/2);
        if($arr[$mid] == $target){
            echo "$target found on ind : $mid<br>";
            break;
        }else if($arr[$mid] < $target){
            $low = $mid + 1;
        }else{
            $high = $mid - 1;
        }
    }

?>