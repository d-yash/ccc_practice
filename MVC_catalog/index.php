<?php

include "Lib/Autoload.php";
$request = new Model_Request();
$productModel = new Model_Product();
$productView = new View_Product();
if(!$request->isPost()){
    echo $productView->toHtml();
}else{
    $productModel->saveData($request->getParams('pdata'));
    // echo $productView->toHtml();
}
