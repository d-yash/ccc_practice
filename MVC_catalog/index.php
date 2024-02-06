<?php

include "Lib/Autoload.php";
$request = new Model_Request();
$productModel = new Model_Product();
$productView = new View_Product();
$abstract = new Model_Abstract();
// if(!$request->isPost()){
//     echo $productView->toHtml();
// }else{
//     $productModel->saveData($request->getParams('pdata'));
//     // echo $productView->toHtml();
// }
$product_list_view = new View_Product_List();
echo $product_list_view->toHTML($productModel->fetch('*'));
if($request->isPost()){
    if ($request->getQueryData('action') == 'update'){
            if ($request->getQueryData('pid')) {
                // echo "Category Update";
            // } elseif ($request->getQueryData('product_id')) {
    
                $query = $abstract->getQueryBuilder()->select('ccc_category', ['*']);
                $categories = $abstract->getQueryExecuter()->execute($query);
                $categories = $abstract->getQueryExecuter()->fetchValues($categories, ['cat_id', 'cat_name']);
    
                $product_id = $request->getQueryData("product_id");
                $product = $product_model->fetchOne(['*'], ['WHERE ' => "product_id = {$pid}"]);
                echo $product_view->toHTML($categories, product: $product);
            // }
        }
    }
}
else{

}