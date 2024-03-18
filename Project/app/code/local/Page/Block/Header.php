<?php

class Page_Block_Header extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('page/header.phtml');
    }
    public function getCartCount(){
        $items = Mage::getModel('sales/quote')
            ->initQuote()
            ->getItemCollection();
        // die;
        return count($items) > 0 ? count($items) : 0;
    }
}