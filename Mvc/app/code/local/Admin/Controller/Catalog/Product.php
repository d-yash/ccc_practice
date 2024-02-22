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
        $form = $layout->createBlock('catalog/admin_product');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $productId = $this->getRequest()->getParams('id');
        if ($productId) {
            $productModel = Mage::getModel('catalog/product')
                ->setId($productId);
            $productId ? $productModel->load($productModel->getId()) : '';
            $productModel->addData('sku', 'sku55')->addData('name', 'fruits');
            Mage::getModel('catalog/product')
                ->setData($productModel->getData())
                ->update();
        } else {
            $productModel = $this->getRequest()->getParams('catalog_product');
            Mage::getModel('catalog/product')
                ->setData($productModel)
                ->save();
        }
    }
    public function deleteAction()
    {
        Mage::getModel('catalog/product')
            ->setId($this->getRequest()->getParams('id'))
            ->delete();
    }
}
