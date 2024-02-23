<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function setFormCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('form.css');
    }
    public function formAction()
    {
        $this->setFormCss();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('catalog/admin_product_form');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $productModel = $this->getRequest()->getParams('catalog_product');
        Mage::getModel('catalog/product')
            ->setData($productModel)
            ->save();
    }
    public function deleteAction()
    {
        Mage::getModel('catalog/product')
            ->setId($this->getRequest()->getParams('id'))
            ->delete();
    }
}