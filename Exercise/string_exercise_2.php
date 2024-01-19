<?php
    $text = "Hello, World! How are you doing?";

    echo "Length : " . strlen($text) . "<br>";
    echo "Lowercase : " . strtolower($text) . "<br>";
    echo "Uppercase : " . strtoupper($text) . "<br>";
    echo "Replace : " . str_replace("How are you doing?", "Fine, thank you!", $text) . "<br>";
    
    $first10char = substr($text, 0, 10);
    echo "First 10 char : $first10char <br>" ;

    $eight_to_end = substr($text, 7);
    echo "Char 8 till end : $eight_to_end <br>";
?>