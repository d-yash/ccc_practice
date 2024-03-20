<?php

class Sales_Controller_Order extends Core_Controller_Front_Action
{
    public function cancelAction(){
        $statusHistory = $this->getRequest()->getParams('status_history');

        $status = Mage::getModel('sales/order')->load($statusHistory['order_id'])->getStatus();

        $statusModel = Mage::getModel('sales/order_status')
            ->addData('order_id', $statusHistory['order_id'])
            ->addData('from_status', $status)
            ->addData('to_status', 'cancelled')
            ->addData('action_by', 'customer')
            ->addData('is_requested', 1)->save();
            $this->setRedirect('customer/order/list');
    }
}
