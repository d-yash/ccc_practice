<?php

class Mage
{
    public static function  init()
    {
        // $request_model = new App_Code_Local_Core_Controller_Model_Request();
        // $request_model = Mage::getModel('core/request');
        // echo  $request_uri = $request_model->getrequestUri();

        $frontController = new Core_Controller_Front();
        $frontController->init();
    }
    public static function getModel($model_name)
    {
        $model_name = ucwords(str_replace('/', '_Model_', $model_name), "_");
        echo $model_name;
        return new  $model_name;
    }
}
