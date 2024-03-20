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
}
