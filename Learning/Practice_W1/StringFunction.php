<?php
function practice($str)
{
    $lang = "PHP";
    echo $str[0] . "<br>";
    echo $str[-2] . "<br><br>";

    echo "String length : " . strlen($str) . "<br>";
    echo "String length : " . strlen("  ") . "<br><br>";
    // Doesn't change the original str
    //str_replace($strToReplace, $replacement, $str)
    echo "String replace : " . str_replace("practice", $lang, $str) . "<br>";
    echo "Original string : " . $str . "<br><br>";

    // Positions starts from 0
    //strpos($str, $var), case sensitive
    echo "String position : " . strpos($str, "file") . "<br>";

    // Includes the ending char as well 
    //substr($str, $startInd, $endInd) 
    echo "Substring : " . substr($str, 2, 8) . "<br>";
    echo "Substring : " . substr($str, -7, -3) . "<br>";      //will print from ind -7 to -3
    echo "Substring : " . substr($str, -2, 10) . "<br>";      //will print 1 char from ind -2, if endInd > strlen then print string untill end
    echo "Substring : " . substr($str, -3, 2) . "<br><br>";      //will print 2 char from ind -2

    echo "Converting to lowercase : " . strtolower($str) . "<br>";
    echo "Converting to uppercase : " . strtoupper($str) . "<br><br>";

    $trimmed = trim($str);
    echo "Trimmed ex : " . trim("   hello, guys   ") . "<br>";
    echo "Trimming white space : " . $trimmed . "  strlen = " . strlen($trimmed) . "<br><br>";

    $arr = array("Porsche", "Bently", "BMW");
    print_r($arr);        //Printing array elements with respective index
    echo "<br>";

    //implode($separator, $arr)     -->     Returns String of arr elements joined with separator
    echo "Glued String : " . implode(', ', $arr) . "<br>";
    //explode($separator, $str)     -->     Returns array, elements will be decided using separator
    $fruits = "Banana, Watermelon, Apple, Kiwi";
    $fruits_arr = explode(",", $fruits);
    echo "Formed Array : ";
    print_r($fruits_arr);

    $userInput_html = "<a href='test'>Test</a>";
    $converted_html = htmlspecialchars($userInput_html);
    echo "<br><br>HTML special char output : " . $converted_html . "<br>";
    echo "HTML entities output : " . htmlentities($userInput_html) . "<br><br>";

    //str_repeat($str, $times)
    $starSymbol = "*";
    echo str_repeat($starSymbol, 5) . "<br><br>";

    echo "Reversed String : " . strrev($str) . "<br>";

    //will shuffle chars 
    echo "Shuffled String : " . str_shuffle($str) . "<br>";
    echo "String split by 2 char : ";
    print_r(str_split($str, 2));

    echo "<br>";
    print_r(str_word_count($str, 2));
    echo "<br><br>Counting total words : " . str_word_count($str) . "<br>";
    echo "Replacing portion of string with another : " . substr_replace($str, $converted_html, 20, 26) . "<br>";
    echo "Replacing portion of string with another : " . substr_replace($str, "#", 0, 26);          //will remove char from 0-25 and append the string till 25

    $name = "Yash";
    //str_pad($str, $totalLen, $symbol, type)
    //type - STR_PAD_LEFT, STR_PAD_RIGHT, STR_PAD_BOTH
    echo "<br>10 len padding : " . str_pad($name, 10) . "<br>";        //total len of name will be 10, padding of white space
    echo "10 len padding - both side : " . str_pad($name, 10, "#", STR_PAD_BOTH) . "<br><br>";

    echo "String Coll : " . strcoll("Hello", "hello") . "<br>";
    echo "String Comparison : " . strcmp("Hello", "hello") . "<br>";

    $greeting = "Hello, world.";
    $mask = "dr";
    //find the first char that is appear first in the str and return no. of char till there
    echo "strcspn : " . strcspn($greeting, $mask) . "<br><br>";

    //case insensitive and return matched substr or false if not found
    echo "stristr - Before needle False : " . stristr($str, "Function", before_needle:false) . "<br>";
    echo "stristr - Before needle True : " . stristr($str, "Function", before_needle:true) . "<br>";

    $lcstring = "india is very large nation.";
    echo "Upper case first : " . ucfirst($lcstring) . "<br>";
    echo "Upper case words : " . ucwords($lcstring) . "<br>";
}

practice("    Hello, This is practice file of string functions. This is basic file.");
?>