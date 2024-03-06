<?php

class Loancalculator_Block_Bank extends Core_Block_Template{
    public function getBankRateById($bankCode)
    {
        $data = Mage::getModel('loancalculator/bank')->getCollection()->getData();
        return $data[$bankCode];
    }
}