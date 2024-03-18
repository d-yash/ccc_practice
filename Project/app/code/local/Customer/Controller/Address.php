<?php
class Customer_Controller_Address extends Core_Controller_Front_Action
{
    public function newAction()
    {
        echo "Address New Action";
    }

    public function saveAction()
    {
        $customerAddressData = $this->getRequest()
            ->getParams('customer_address');
        Mage::getModel('customer/address')
            ->setData($customerAddressData)
            ->removeData('email')
            ->removeData('quote_id')
            ->save();
        $this->setRedirect('cart/checkout');
    }
}
