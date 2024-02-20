<?php

class Catalog_Controller_Category extends Core_Controller_Front_Action{
    public function formAction(){
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('catalog/admin_category');
        $child->addChild('form', $form);
        $layout->toHtml(); 
    }
}