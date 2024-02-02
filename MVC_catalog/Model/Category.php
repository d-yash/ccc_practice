<?php
class Model_Category extends Model_Abstract{

    function getCategoryArray(){
        $arr = [];
        $sql = $this->getQueryBuilder()->select('ccc_category', '*');
        $result = $this->getQueryExecuter()->execute($sql);
        $row = $this->getQueryExecuter()->fetchAssoc($result);
        foreach($row as $val){
            $arr[$val['cat_id']] = $val['name'];
        }
        return $arr;
    }    
}