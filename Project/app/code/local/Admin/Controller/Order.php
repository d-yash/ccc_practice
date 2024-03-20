<?php

class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    protected $_allowedAction = [];

    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('order/admin/list.css');

        $list = Mage::getBlock('order/admin_list');
        $layout->getChild("content")->addChild('list', $list);

        $layout->toHtml();
    }
    public function viewAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('order/admin/view.css');

        $view  = Mage::getBlock('order/admin_view');
        $layout->getChild('content')->addChild('view', $view);

        $layout->toHtml();
    }
    public function updateStatusAction()
    {
        $toStatus = $this->getRequest()->getParams('status_history');
        $salesModel = Mage::getModel('sales/order')->load($toStatus['order_id']);
        Mage::getModel('sales/order_status')
            ->setData($toStatus)
            ->addData('from_status', $salesModel->getStatus())
            ->addData('action_by', 'admin')
            ->save();

        $salesModel->addData('status', $toStatus['to_status'])->save();
        $this->setRedirect('admin/order/list');
    }

    public function cancelAction()
    {
        if ($this->getRequest()->isPost()) {
            $statusHistory = $this->getRequest()->getParams('status_history');
            $historyId = $statusHistory['history_id'];
            $statusModel = Mage::getModel('sales/order_status')->load($historyId);

            if ($statusHistory['action'] == "confirm") {
                $statusModel->addData('is_approved', 1)
                    ->addData('is_requested', 0)
                    ->addData('action_by', 'admin')
                    ->save();

                Mage::getModel('sales/order')
                    ->load($statusModel->getOrderId())
                    ->addData('status', 'cancelled')
                    ->save();
            } else if ($statusHistory['action'] == "decline") {
                $statusModel->addData('is_requested', 0)
                    ->addData('action_by', 'admin')
                    ->save();
            }
            $this->setRedirect('admin/order/cancel');
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('order/admin/list.css');

            $view  = Mage::getBlock('order/admin_cancel');
            $layout->getChild('content')->addChild('view', $view);

            $layout->toHtml();
        }
    }
}
