<?php
    function practice($str){
        $lang = "PHP";
        echo $str[0] . "<br>";
        echo $str[-2] . "<br><br>";
        
        echo "String length : " . strlen($str) ."<br><br>";

        // Doesn't change the original str
        //str_replace($strToReplace, $replacement, $str)
        echo "String replace : " . str_replace("practice", $lang, $str) . "<br>";          
        echo "Original string : " . $str . "<br><br>";       

        // Positions starts from 0
        //strpos($str, $var)
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
        echo "Trimming white space : " . $trimmed . "  strlen = " . strlen($trimmed) . "<br><br>";
    
        $arr = array("Porsche", "Bently", "BMW");
        print_r($arr);        //Printing array elements with respective index
        echo "<br>";
        
        //implode($separator, $arr)     -->     Returns String of arr elements joined with separator
        echo "Glued String : " . implode(', ', $arr) . "<br>";
        //explode($separator, $str)     -->     Returns array, elements will be decided using separator
        $fruits = "Banana, Watermelon, Apple, Kiwi";
        echo "Formed Array" . explode(",", $fruits) . "<br>";
    }
    
    practice("    Hello, This is practice file of string functions. This is basic file.");
?>