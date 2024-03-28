<?php

class Sales_Model_Quote extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Sales_Model_Resource_Quote';
        $this->_collectionClass = 'Sales_Model_Resource_Collection_Quote';
    }
    public function initQuote()
    {
        $sessionModel = Mage::getSingleton('core/session');
        $customerId = $sessionModel->get('logged_in_customer_id', 0);
        $quoteId = $sessionModel->get('quote_id', 0);
        if (!$quoteId) {
            $quote = Mage::getSingleton('sales/quote')
                ->setData(['tax_percent' => 0, 'grand_total' => 0]);
            if ($customerId) {
                $existingCustomer = Mage::getModel('sales/quote')
                    ->getCollection()
                    ->addFieldToFilter('customer_id', $customerId)
                    ->addFieldToFilter('order_id', 0)
                    ->addOrderBy('quote_id', 'DESC')
                    ->getFirstItem();
                if ($existingCustomer) {
                    $quote->addData('quote_id', $existingCustomer->getId());
                }
                $quote->addData('customer_id', $customerId);
            }
            $quoteId = $quote->save()->getId();
            $sessionModel->set('quote_id', $quoteId);
        } 
        else{
            if($customerId){
                $quoteId = Mage::getSingleton('sales/quote')->load($quoteId)
                    ->addData('customer_id', $customerId)
                    ->save()
                    ->getId();
            }
        }
        $this->load($quoteId);
        return $this;
    }
    public function getItemCollection()
    {
        return Mage::getModel('sales/quote_item')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())->getData();
    }
    public function getCustomer()
    {
        return Mage::getModel('sales/quote_customer')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())->getFirstItem();
    }
    public function getPaymentMethod()
    {
        return Mage::getModel('sales/quote_payment')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    public function getShippingMethod()
    {
        return Mage::getModel('sales/quote_shipping')
            ->getCollection()
            ->addFieldToFilter('quote_id', $this->getId())
            ->getFirstItem();
    }
    protected function _beforeSave()
    {
        $grandTotal = 0;
        foreach ($this->getItemCollection() as $item) {
            $grandTotal += $item->getRowTotal();
        }
        if ($this->getTaxPercent()) {
            $tax = round($grandTotal / $this->getTaxPercent(), 2);
            $grandTotal += $tax;
        }
        $this->addData('grand_total', $grandTotal);
    }
    public function addProduct($quoteData)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')
                ->addItem(
                    $this,
                    $quoteData['product_id'],
                    $quoteData['qty'],
                    isset($quoteData['item_id'])
                        ? $quoteData['item_id']
                        : null
                );
        }
        $this->save();
    }
    public function deleteProduct($itemId)
    {
        $this->initQuote();
        if ($this->getId()) {
            Mage::getModel('sales/quote_item')->deleteItem($this, $itemId);
        }
        $this->save();
    }
    public function addAddress($addressData)
    {
        $this->initQuote();
        $quoteCustomerId = Mage::getSingleton('core/session')->get('quote_customer_id');
        $quoteCustomerModel = Mage::getModel('sales/quote_customer');
        $quoteCustomerModel->setData($addressData);
        if ($quoteCustomerId) {
            $quoteCustomerModel->addData('quote_customer_id', $quoteCustomerId);
            $quoteCustomerModel->save();
        } else {
            $id = $quoteCustomerModel->save()->getId();
            Mage::getSingleton('core/session')->set('quote_customer_id', $id);
        }
    }
    public function addPayment($paymentMethodData)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id = Mage::getModel("sales/quote_payment")
                ->addPaymentMethod($this, $paymentMethodData)
                ->getId();
            $this->addData('payment_id', $id);
        }
        $this->removeData('order_id');
        $this->removeData('shipping_id');
        $this->save();
    }
    public function addShipping($shippingMethodData)
    {
        $this->initQuote();
        if ($this->getId()) {
            $id = Mage::getModel("sales/quote_shipping")
                ->addShippingMethod($this, $shippingMethodData)
                ->getId();
            $this->addData('shipping_id', $id);
        }
        $this->removeData('order_id');
        $this->save();
    }
    public function convert()
    {
        if ($this->getId()) {
            $orderModel = Mage::getModel('sales/order');
            $orderId = $orderModel->setData($this->getData())
                ->removeData('quote_id')
                ->removeData('order_id')
                ->removeData('payment_id')
                ->removeData('shipping_id')
                ->save()
                ->getId();

            foreach ($this->getItemCollection() as $item) {
                $orderModel->addOrderItem($item->getData());
            }
            if ($this->getCustomer()) {
                $orderModel->addOrderCustomer($this->getCustomer()->getData());
            }
            if ($this->getPaymentMethod()) {
                $orderModel->addOrderPayment($this->getPaymentMethod()->getData());
            }
            if ($this->getShippingMethod()) {
                $orderModel->addOrderShipping($this->getShippingMethod()->getData());
            }

            $this->addData('order_id', $orderId)
                ->save();
        }
    }
}
