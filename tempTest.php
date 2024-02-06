<?php
$arr = [1,3,5,7,9];
$num = 3;

$sortedArr = sort($arr);
$minSum = 0;
$maxSum = 0;
// for($i=0; $i<$num; $i++){
//     $minSum += $arr[$i];
// }
// for($i=count($arr)-$num; $i<count($arr); $i++){
//     $maxSum += $arr[$i];
// }
// print_r(array_slice($arr,0,4));
$minSum = array_reduce(array_slice($arr,0,$num), fn($a, $b)=> $a+$b);
$maxSum = array_reduce(array_slice($arr,count($arr)-$num,count($arr)), fn($a, $b)=> $a+$b);

echo "Min sum : $minSum<br>";
echo "Max sum : $maxSum<br>";