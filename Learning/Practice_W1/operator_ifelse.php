<?php
    $intVar = 24;
    $floatVar = 30.11;
    $stringVar = "Hello, PHP";
    $boolVar = true; 
    $arrayVar = array("Apple", 1, 3.14);
    $nullVar = null;

    /*
    echo "<h4>Type casting</h4>";
    echo var_dump((string)$intVar) . "<br>";
    echo var_dump((int)$stringVar) . "<br>";
    echo var_dump((float)$intVar) . "<br>";
    echo var_dump((boolean)$floatVar) . "<br>";
    echo var_dump((boolean)0) . "<br>";
    echo var_dump((array)$boolVar) . "<br>";

    // unset is no longer supported after php 7.2
    // echo var_dump((unset)$floatVar) . "<br>";    
    */

    /*
    $negFloatVar = -5.568256;
    echo "<br><h4>Maths functions</h4>";
    echo "abs : " . abs($negFloatVar) . "<br>";
    echo "Ceil : " . ceil($negFloatVar) . "<br>";
    echo "Floor : " . floor($negFloatVar) . "<br>";
    echo "Round : " . round($negFloatVar, 3) . "<br>";
    echo "Round : " . round($floatVar, 8) . "<br>";     //will not add zeros at back
    echo "6^3 : " . pow(6, 3) . "<br>";
    echo "Square root of 144 : " . sqrt(144) . "<br>";

    echo "<br>Roll a dice : " . rand(1, 6) . "<br>";
    echo "Number Formating : " . number_format(99998888.5666, 2, ".", ",") . "<br><br>";

    function calcProfit($cost_price, $selling_price, $quantity) : float{
        $total_cost = $cost_price * $quantity;
        $total_sell = $selling_price * $quantity;
        $profit = $total_sell - $total_cost;
        return $profit;
    }
    */

    /*
    echo "<h4>Operators Arithmatic, Assignment, Comparison, Logical, If-else</h4>";
    echo "Remainder of 12/5 is : " . 12%5 . "<br>";
    echo "4 ^ 3 = " . 4 ** 3 . "<br>";
    $profit1 = calcProfit(100, 1050, 100);
    $profit2 = calcProfit(1000, 98, 3);
    echo "<br>Profit of item 1 : " . $profit1 . "<br>";
    echo "Profit of item 2 : " . $profit2 . "<br>";

    $total_profit = $profit1 + $profit2;
    echo "Total Profit = " . $total_profit . "<br>";

    $total_income = $total_profit;
    $sideIncome = 35000;
    echo "Side income : " . $sideIncome . "<br>";
    $total_income += $sideIncome;
    echo "Total Income = " . $total_income . "<br>";
    $rent = 20000;
    $total_saving = $total_income;
    $total_saving -= $rent;
    echo "Total saving : " . $total_saving . "<br>";
    echo "<br>After 6 months ... <br>";  
    $total_saving *= 6;
    echo "Total saving : " . $total_saving . "<br>";

    $modShorthand = 65;
    $modShorthand %= 6;
    echo "<br>Modulo shorthand : " . $modShorthand . "<br>"; 
    $divShorthand = 25;
    $divShorthand /= 5;
    echo "Divison shorthand : " . $divShorthand . "<br><br>"; 

    echo "<h4>Comparision operator</h4>";
    $num1 = 12;
    $num2 = (float)12;
    echo "Using == operator  :  ";
    if($num1 == $num2)  
        echo "Both are same<br>";
    else    
        echo "Both are not same<br>";

    echo "Using === operator  :  ";
    if($num1 === $num2) 
        echo "Both are same<br>";
    else 
        echo "Both are not same<br>";


    echo "Using != operator  :  ";
    if($num1 != $num2)
        echo "Both are not same<br>";
    else    
        echo "Both are Same<br>";

    echo "Using !== operator  :  ";
    if($num1 !== $num2)
        echo "Both are not Identical<br>";
    else    
        echo "Both are Identical<br><br>";

    if($num1 > $num2)
        echo $num1 . " is greater<br>";
    elseif($num2 < $num1)
        echo $num2 . " is greater<br>";
    else
        echo $num1 . " & " . $num2 . " both are same<br>";

    $age = 21;
    $height = 172;
    $isEngineer = false;
    $isIndian = true;
    $isTerrorist = false;

    if($isIndian || !$isTerrorist){
        if($age > 20 && $height > 170)
            if($isEngineer)
                echo "Congratulations, You can serve as Engineer in armed forces<br>";
            else
                echo "<br>Congratulations, You can serve in armed forces<br>";
        elseif($age < 20 && $height > 170)
            echo "<br>Sorry, You are below 20<br>";
        elseif($age > 20 && $height < 170)    
            echo "<br>Sorry, You are height 20<br>";
    }
    */

    $num1 = 4;
    $num2 = 6;
    $num3 = 5;
    /*
    echo "<h4>Increment decrement operator</h4>";
    
    echo "Postfix inc : " . $num2++ . "<br>";
    echo "Postfix dec : " . $num1-- . "<br>";
    
    echo "Prefix inc : " . ++$num2 . "<br>";
    echo "Prefix dec : " . --$num1 . "<br>";
    */
    
    
    echo "<h4>Conditional(Ternary) Op.</h4>";
    $max;
    $num1 > $num2 ?  $max = $num1 : $max = $num2;
    echo "Maximum : " . $max . "<br>";

    //Null coalescing operator
    // $result = $value ?? $default_value
    $name = $firstName ?? "Guest_user";
    $name .= " is good person.";        //String concatination assignment
    echo $name . "<br>";
?>