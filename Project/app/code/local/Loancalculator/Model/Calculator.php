<?php

class Loancalculator_Model_Calculator extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Loancalculator_Model_Resource_Calculator';
        $this->_collectionClass = 'Loancalculator_Model_Resource_Collection_Calculator';
    }
}
