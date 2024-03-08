<?php

class Core_Block_Abstract{
    public $template = null;
    public function setTemplate( $template ){
        $this->template = $template;
        return $this;
    }
    public function getTemplate(){
        if(isset($this->template)){
            return $this->template;
        }
    }
    public function __get($key)
    {
    }
    public function __unset($key)
    {
    }
    public function __set($key, $value)
    {
    }
    public function addData($key, $value)
    {
    }
    public function getData($key = null)
    {
    }
    public function setData($data)
    {
    }
    public function getUrl($path = null){
        return "http://localhost/Practice/Mvc" . $path;
    }
    public function getRequest(){
        return Mage::getModel("core/request");
    }
    public function render(){
        include Mage::getBaseDir('app') . '/design/frontend/template/' . $this->getTemplate();
    }

}