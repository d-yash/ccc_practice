<?php

class Page_Block_Head extends Core_Block_Template{
    protected $_js = array();
    protected $_css = array();
    public function __construct(){
        $this->setTemplate('Page/head.phtml');
    }
    public function addJs($file){
        $this->_js[] = $file;
    }
    public function addCss($file){
        $this->_css[] = $file;
    }
    public function getJs(){
        return $this->_js;
    }
    public function getCss(){
        return $this->_css;
    }

}