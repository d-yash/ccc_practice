<?php

class Calculator_Model_Calculator extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Calculator_Model_Resource_Calculator';
        $this->_collectionClass = 'Calculator_Model_Resource_Collection_Calculator';
    }
    public function _beforeSave(){


        $result = ($p*($r)*pow(($r+1), $n))/(pow($r+1, $n-1));
        $this->addData('result', $result);
    
    }
    public function _afterSave(){

    }
}
