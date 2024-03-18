<?php

class Customer_Block_Order_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('customer/Order/list.phtml');
    }
    public function getOrders(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        return Mage::getModel('sales/order')
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getData();
    }
    public function getItemCount($orderId){
        $items = Mage::getModel('sales/order_item')
            ->getCollection()
            ->addFieldToFilter('order_id', $orderId)
            ->getData();
        return count($items) > 0 ? count($items) : 0;
    }
}
