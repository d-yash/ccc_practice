<?php 

class Task_Model_Agent extends Core_Model_Abstract{
    public function init()
    {
        $this->_resourceClass = 'Task_Model_Resource_Agent';
        $this->_collectionClass = 'Task_Model_Resource_Collection_Agent';
    }
    public function sendId($branchId){
        $data = $this->getCollection()->addFieldToFilter('parent_id', $branchId)->getData();

        echo "<select name='agent' id='agent'>";
        foreach($data as $_data){
            // if(strpos($_data->getName(), 'an'))
                echo "<option value='" . $_data->getAgentId() . "'>" . $_data->getName() . "</option>";
        }
        echo "</select>";
    }
}