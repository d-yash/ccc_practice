<?php
    $quote = "In three words I can sum up everything I've learned about life: it goes on.";

    echo "Total words : " . str_word_count($quote) . "<br>";
    echo "Lower case : " . strtolower($quote) . "<br>";
    echo "Capitalize : " . ucwords($quote) . "<br>";
?>