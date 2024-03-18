<?php

class Order_Block_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('order/list.phtml');
    }
    public function getOrders(){
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');
        return Mage::getModel('sales/order')
            ->getCollection()
            ->getData();
    }
    public function getCustomerName($customerId){
        $customerModel = Mage::getModel('customer/customer')
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->getFirstItem();
        
        return $customerModel->getFirstName() . " " . $customerModel->getLastName();
    }
}
