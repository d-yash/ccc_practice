<?php

class Sales_Model_Order_Item extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Order_Item';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Order_Item';
    }
    public function getProduct(){
        return Mage::getModel('catalog/product')->load($this->getProductId());
    }
    public function _beforeSave(){
        if($this->getProduct()){
            $this->addData('product_name', $this->getProduct()->getName());
            $this->addData('product_color', $this->getProduct()->getColor());
        }
    }
    public function addItem(Sales_Model_Order $order,$quoteItem)
    {
        $this->setData($quoteItem)
            ->removeData('item_id')
            ->removeData('quote_id')
            ->addData('order_id', $order->getId())
            ->save();
        $inventory = (int)$this->getProduct()->getInventory() - (int)$this->getQty();
        $this->getProduct()->addData('inventory', $inventory)->save();
        return $this;
    }
}