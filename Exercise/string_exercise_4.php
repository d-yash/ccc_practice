<?php
    $name = "John";

    $padl = str_pad($name, 10, "_", STR_PAD_LEFT);
    $padr = str_pad($name, 8, "*", STR_PAD_RIGHT);
    echo "Padding left : " . $padl . "<br>";
    echo "Padding right : " . $padr . "<br>";
?>