<?php

class Catalog_Controller_Product extends Core_Controller_Front_Action{
    public function formAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('catalog/admin_product');
        $child->addChild('form', $form);
        $layout->toHtml();
    }
}