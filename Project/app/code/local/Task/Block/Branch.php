<?php

class Task_Block_Branch extends Core_Block_Template{
    public function __construct(){
        $this->setTemplate('task/form.phtml');
    }
    public function getBranch(){
        return Mage::getModel('task/branch')->getCollection()->getData();
    }
    public function getAgent(){
        $branchId = $this->getRequest()->getParams('branch_id');
        return Mage::getBlock('task/agent')->getAgentByBranch($branchId);
    }
}