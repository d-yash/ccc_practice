<?php

class Sales_Controller_Quote extends Core_Controller_Front_Action
{

    public function addAction()
    {
        $quoteData = $this->getRequest()
            ->getParams('sales_quote');
        $this->checkDataAndRedirect([$quoteData], 'catalog/product/view');
        Mage::getSingleton("sales/quote")
            ->addProduct($quoteData);
        $this->setRedirect('cart');
    }
    public function deleteAction()
    {
        Mage::getSingleton("sales/quote")
            ->deleteProduct(
                $this->getRequest()
                    ->getParams('item_id')
            );
        $this->setRedirect('cart');
    }
    public function saveAddressAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $addressData = $this->getRequest()->getParams('customer_address');
        $this->checkDataAndRedirect([$quoteId, $addressData], 'catalog/product/view');
        Mage::getModel('sales/quote')->addAddress($addressData);
        $this->setRedirect('cart/checkout/method');
    }
    public function placeOrderAction()
    {
        $quoteId = Mage::getSingleton('core/session')->get('quote_id');
        $this->checkDataAndRedirect([$quoteId], '');

        $quoteModel = Mage::getModel('sales/quote');

        $paymentMethodData = $this->getRequest()->getParams('quote_payment_method');
        $shippingMethodData = $this->getRequest()->getParams('quote_shipping_method');
        $this->checkDataAndRedirect(
            [$paymentMethodData, $shippingMethodData],
            'cart/checkout/method'
        );

        $quoteModel->addPayment($paymentMethodData);
        $quoteModel->addShipping($shippingMethodData);

        $quoteModel->convert();
        Mage::getSingleton('core/session')->remove('quote_id');
        echo "<script>alert('Order placed successfully')</script>";
        $this->setRedirect('');
    }
}
