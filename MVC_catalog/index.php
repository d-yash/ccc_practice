<?php

include "Lib/Autoload.php";
$request = new Model_Request();

if(!$request->isPost()){
    $product = new View_Product();
    echo $product->toHtml();
}
