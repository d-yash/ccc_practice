<?php

class Catalog_Controller_Product extends Core_Controller_Front_Action
{
    public function init()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('form.css');
    }
    public function formAction()
    {
        $this->init();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('catalog/admin_product');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $this->init();
        $data = $this->getRequest()->getParams('catalog_product');
        $product = Mage::getModel('catalog/product')
            ->setData($data)
            ->save();
    }
}
