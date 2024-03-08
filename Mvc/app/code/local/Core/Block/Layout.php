<?php

class Core_Block_Layout extends Core_Block_Template
{
    public function __construct(){
        $this->setTemplate('core/1column.phtml');
        $this->prepareChildren();
    }
    public function prepareChildren(){
        $head = $this->createBlock('page/head');
        
    }
    public function createBlock($className){
        return Mage::getBlock($className);
    }
}