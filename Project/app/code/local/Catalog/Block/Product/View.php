<?php

class Catalog_Block_Product_View extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('catalog/product/view.phtml');
    }
    public function getStatus()
    {
        $bindding = [
            '1' => 'Enabled',
            '0' => 'Disabled',
        ];
        return isset($this->_data['status']) ? $bindding[$this->_data['status']] : '';
    }
    public function getItem()
    {
        $id = $this->getRequest()->getParams('product_id');
        if($id){
            $list =  Mage::getModel("catalog/product")->getCollection()->addFieldToFilter('product_id',$id);
            return $list->getData();
        }
        $list =  Mage::getModel("catalog/product")->getCollection();
        return $list->getData();
    }
    public function getImagePath(){
        return Mage::getBaseUrl("media/product/");
    } 
}