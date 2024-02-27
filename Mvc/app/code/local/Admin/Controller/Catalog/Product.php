<?php

class Admin_Controller_Catalog_Product extends Core_Controller_Front_Action
{
    public function setFormCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('form.css');
    }
    public function setFormJs()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addJs('form.js');
    }
    public function setListCss()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('list.css');
    }
    public function formAction()
    {
        $this->setFormCss();
        $this->setFormJs();
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
        $productId = $this->getRequest()->getParams('id');
        Mage::getModel('catalog/product')->load($productId)
            ->delete();
    }
    public function listAction()
    {
        $this->setListCss();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');

        $productList = $layout->createBlock('catalog/admin_product_list');
        $child->addChild('list', $productList);
        $layout->toHtml();
    }
}
