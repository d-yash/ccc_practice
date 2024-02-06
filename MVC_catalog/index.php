<?php

include "Lib/Autoload.php";
class Ccc{
    public static function init(){
        $frontController = new Controller_Front();
        $frontController->init();
    }
}
Ccc::init();
// $request = new Model_Request();
// $productModel = new Model_Product();
// $productView = new View_Product();
// $abstract = new Model_Abstract();


// if(!$request->isPost()){
//     echo $productView->toHtml();
// }else{
//     $productModel->saveData($request->getParams('pdata'));
//     // echo $productView->toHtml();
// }
// $product_list_view = new View_Product_List();
// echo $product_list_view->toHTML($productModel->fetch('*'));
// if($request->isPost()){
//     if ($request->getQueryData('action') == 'edit'){
//             if ($request->getQueryData('pid')) {

//             }
//     }
// }
// else{

// }
// switch ($request->isPost()) {
//     case $request->getPostData('submit'):
//         if ($request->getPostData('pdata')) {
//             $product_model = new Model_Product();

//             $data = $request->getPostData('pdata');
//             $result = $product_model->saveData($data);
//             if ($result) {
//                 echo "<script>alert('Data submitted successfully')</script>";
//                 echo "<script>location. href='?form=product'</script>";
//             } else {
//                 echo "<script>alert('Data not submitted')</script>";
//             }
//         }
//         break;
//         case $request->getPostData('update'):
//             if ($request->getPostData('ccc_product')) {
//                 $product_model = new Model_Product();
    
//                 $data = $request->getPostData('ccc_product');
//                 $result = $product_model->update($data, ['product_id' => $request->getQueryData('product_id')]);
//                 if ($result) {
//                     echo "<script>alert('Data updated successfully')</script>";
//                     echo "<script>location. href='?list=product'</script>";
//                 } else {
//                     echo "<script>alert('Data not updated')</script>";
//                 }
//             }
//             break;
// }