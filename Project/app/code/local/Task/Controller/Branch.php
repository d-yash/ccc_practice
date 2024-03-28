<?php

class Task_Controller_Branch extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $branchBlock = Mage::getBlock('task/branch');
        $child = $layout->getChild('content');
        $layout->getChild('head')->addJs('task/branch.js');
        $child->addChild('form', $branchBlock);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $branchId = $this->getRequest()->getParams('branch_id');
        Mage::getModel('task/agent')->sendId($branchId);
        // $data = Mage::getModel('task/agent')->getCollection()->addFieldToFilter('parent_id', $branchId)->getData();
        // echo "<select name='agent'>";
        // foreach($data as $_data){
        //     echo "<option value='" .  . "'>" . $row['city_name'] . "</option>";
        // }
        // while ($row = mysqli_fetch_array($result)) {
        //     echo "<option value='" . $row['city_name'] . "'>" . $row['city_name'] . "</option>";
        // }
        // echo "</select>";
        // Mage::getBlock('task/agent')->getAgentByBranch($branchId);
    }
}
