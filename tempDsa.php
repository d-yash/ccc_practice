<?php
//  $n = 36;
// $arr = array();
//  for ($i = 1; $i <= sqrt($n); $i++) {
//     if($n % $i == 0){
//         $arr[] = $i;
//         $rem = $n / $i;
//         if(!in_array($rem, $arr)){
//             $arr[] = $rem;
//         }
//     }
//  }

//  sort($arr);
 
//  echo "<pre>";
//  print_r($arr);
$n = 12556;
echo (int)(log10($n) + 1);

