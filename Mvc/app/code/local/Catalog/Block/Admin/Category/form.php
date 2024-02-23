<?php

class Catalog_Block_Admin_Category_Form extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('category/admin/form.phtml');
    }
    public function getCategory(){
        return Mage::getModel('catalog/product')->load($this->getRequest()->getParams('id', 0));
    }
}