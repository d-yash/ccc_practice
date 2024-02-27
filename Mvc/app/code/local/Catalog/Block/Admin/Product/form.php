<?php

class Catalog_Block_Admin_Product_form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('catalog/admin/product/form.phtml');
    }
    public function getProduct(){
        return Mage::getModel('catalog/product')->load($this->getRequest()->getParams('id', 0));
    }
    public function getCategory(){
        return Mage::getModel('catalog/category')->getCollection()->getData();
    }
}