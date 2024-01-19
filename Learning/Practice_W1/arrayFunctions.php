<?php
    function printArray($str, $arr){
        echo "$str ";
        foreach($arr as $i){
            echo "$i  ";
        }
        echo "<br>";
    }
    echo "<h4>1. Array Creation</h4>";
    $clrArray = ["Red", "Blue", "Pink", "Black"];
    printArray("Created Array : ", $clrArray);

    $studArray1 = ["Yash", "Tosha", "Parth"];
    $studArray2 = ["Manan", "Dhwani", "Pal"];
    $studArray3 = array("Vivek", "Meet");

    $students = array_merge($studArray1, $studArray2, $studArray3);
    printArray("Merged student array : ", $students);

    $key = array("Name", "Age", "City");
    $value = array("Yash", "20", "Rajkot");
    $result = array_combine($key, $value);
    // printArray("Combined key-value array : ", $result);
    echo var_dump($result) . "<br>";

    $oddNum = range(1, 10, 2);
    printArray("Odd numbers : ", $oddNum);
    
    echo "<h4>2. Array Modification</h4>";
    //Multiple values can be added
    array_push($oddNum, 11, 13);
    $oddNum[] = 15;     //only single values can be added
    printArray("After adding 2 elements : ", $oddNum);

    $poppedElement = array_pop($oddNum);
    echo "Popped Element : " . $poppedElement . "<br>";
    array_unshift($oddNum, -3, -1);
    printArray("After adding 2 element at beginning : ", $oddNum);

    $removedFront = array_shift($oddNum);
    echo "Element " . $removedFront . " removed from front.<br>";
    printArray("After removing a element from beginning : ", $oddNum);

    //Removes a subarray and replace it with the given
    array_splice($oddNum, 1, 3, [1.1, 3.1, 5.1]);
    printArray("Splice : ", $oddNum);

    echo "<h4>3. Array Access</h4>";
    echo "Total Odd numbers upto 10 : " . count($oddNum) . "<br>";
    echo "Total size of odd numbers : " . sizeof($oddNum) . "<br>";         //alias of count, avoid using 
    
    echo "Does Age key exist? : " . array_key_exists("Age", $result) . "<br>";
    $resultKey = array_keys($result);
    printArray("Keys of result Array : ", $resultKey) . "<br>";
    $resultValue = array_Values($result);
    printArray("Values of result Array : ", $resultValue) . "<br>";
    
    echo "<h4>4. Array Search</h4>";
    //print 1 if found, doesn't print anything
    echo "Searching for Yash : " . in_array("Yash", $students) . "<br>";
    //doesn't print anything if not found
    echo "3 is at ind : " . array_search(9, $oddNum) . "<br>";
    printArray("Reversed Array : ", array_reverse($oddNum));

    $num = array(1,5,2,12,30,24,11,8);
    echo "<h4>5. Array Sorting</h4>";
    //returns true, modifies the array in ascending order
    sort($num);
    printArray("Sorted Array : ", $num);
    rsort($num);
    printArray("Reverse Sorted Array : ", $num);
    
    $capitalCity = array(
        "India" => "Delhi",
        "USA" => "Washington D.C.",
        "UK" => "London"
    );
    asort($capitalCity);
    printArray("Capital city sorted by Values : ", $capitalCity);
    arsort($capitalCity);
    printArray("Capital city Reverse sorted by Values : ", $capitalCity);
    
    ksort($capitalCity);
    echo "Capital city sorted by Keys : ";
    echo var_dump($capitalCity) . "<br>";
    krsort($capitalCity);
    echo "Capital city Reverse sorted by Keys : ";
    echo var_dump($capitalCity) . "<br>";

    echo "<h4>6. Array Filtering</h4>";
    $even = array_filter($num, fn($val) => $val%2 == 0);
    printArray("Even numbers : ", $even);
    
    $intArray = [2,3,5,6];
    $squared = array_map(fn($val)=> $val*$val, $intArray);
    printArray("Squared : ", $squared);
    
    $sumOfSquare = array_reduce($squared, fn($carry, $val)=> $carry+$val, 0);
    echo "Sum of Square : " . $sumOfSquare . "<br>";

    echo "<h4>6. Array Slicing</h4>";
    $arr = range(1,10);
    $sliced = array_slice($arr, 2);
    printArray("From 2 to end : ", $sliced);
    $sliced = array_slice($arr, 2, 5); 
    printArray("From 2 to 5 : ", $sliced);
    //key_preserving = true that means key will be also sliced to new array
    $sliced = array_slice($result, 1, 2, true);
    printArray("Slicing with key preserving : ", $sliced);
    // echo var_dump($sliced);
?>