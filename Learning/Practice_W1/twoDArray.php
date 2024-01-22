<?php
    // $arr = array(array(1,2,3), array(4,5,6));
    $arr1 = [[1,2,3], [4,5,6], [7,8,9]];
    $arr2 = [[2,4,6,8], [5,5,5], [8,6,4,2]];
    function printArray($str, $arr){
        echo $str . "<br>";
        foreach($arr as $i){
            foreach($i as $j){
                echo $j . " ";
            }
            echo "<br>";
        }
        echo "<br>";
    }

    printArray("2D array : ", $arr1);
    $merged = array_merge($arr1, $arr2);
    printArray("Merged Array : ", $merged);
    // echo count($merged) . ",". count($merged[3]) . "<br>";   //dimension of row depends on the no. of elements in the row

    //                  -: ERROR :-
    // $key = [["name", "age", "tech", "income"], [7,8,9,10]];
    // $value = [["Yash", "20", "PHP", "1000"], ["Vivek", "21", "Java", "1050"]];
    // $combined = array_combine($key, $value);
    // printArray("Combined Array : ", $combined);
    // var_dump($combined);
    // $key = [[1,2,3], [4,5,6]];
    // $value = [[11,12,13], [14,15,16]];
    // $combined = array_combine($key, $value);
    // var_dump($combined);

    $arr = [range(1,5), range(5,10)];
    printArray("Using range : ", $arr);

    // array_push($arr, 24);        //creates new row at end
    // var_dump($arr);
    // printArray("New arr : ", $arr);

    echo "Pos of 5 : " . array_search(5, $arr[1]);
?>