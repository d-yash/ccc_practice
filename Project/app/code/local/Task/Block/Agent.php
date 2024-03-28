<?php

class Task_Block_Agent extends Core_Block_Template
{
    public function getAgentByBranch($branchId)
    {
        return Mage::getModel('task/agent')
            ->getCollection()
            ->addFieldToFilter('parent_id', $branchId)
            ->getData();
    }
}
