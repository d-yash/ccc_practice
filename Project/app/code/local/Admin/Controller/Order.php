<?php

class Admin_Controller_Order extends Core_Controller_Admin_Action
{
    protected $_allowedAction = [];

    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('order/list.css');

        $content = $layout->getChild("content");

        $list = Mage::getBlock('order/list');
        $content->addChild('list', $list);

        $layout->toHtml();
    }
}
