<?php
class Customer_Controller_Order extends Core_Controller_Front_Action
{
    protected $_allowedAction = [];
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/order/list.css');

        $content = $layout->getChild("content");

        $list = Mage::getBlock('customer/order_list');
        $content->addChild('list', $list);

        $layout->toHtml();
    }
}
