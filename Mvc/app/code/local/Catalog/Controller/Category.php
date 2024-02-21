<?php

class Catalog_Controller_Category extends Core_Controller_Front_Action{
    public function init()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('form.css');
    }
    public function formAction(){
        $this->init();
        $layout = $this->getLayout();
        $child = $layout->getChild('content');
        $form = $layout->createBlock('catalog/admin_category');
        $child->addChild('form', $form);
        $layout->toHtml(); 
    }
}