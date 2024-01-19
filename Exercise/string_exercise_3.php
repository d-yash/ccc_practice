<?php
    $sentence = "The quick brown fox jumps over the lazy dog";
    echo "Position of FOX : " . strpos($sentence, "fox") . "<br>";
    $word_arr = explode(" ", $sentence);
    echo array_search("fox", $word_arr)+1 . "<br>";

    if(str_contains($sentence, "cat"))
        echo "Yes, Sentence contains word 'cat' <br>";
    else    
        echo "No, Sentence don't contains word 'cat' <br>";

    $first_20_char = substr($sentence, 0, 20);
    echo "First 20 char : " . $first_20_char . "<br>";
?>