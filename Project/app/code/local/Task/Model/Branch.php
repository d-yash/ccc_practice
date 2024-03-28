<?php 

class Task_Model_Branch extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClass = 'Task_Model_Resource_Branch';
        $this->_collectionClass = 'Task_Model_Resource_Collection_Branch';
    }
}