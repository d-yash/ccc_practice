<?php
class Model_Product extends Model_Abstract{
    public $tableName = "ccc_product";
    public function saveData($data){
        $sql = $this->getQueryBuilder()
            ->insert(
                $this->tableName,
                $data
            );
        $result = $this->getQueryExecuter()->execute($sql);
         if ($result === true) {
                echo '<script>alert("Data added successfully");</script>';
            } else {
                echo '<script>alert("Failed to add data. Please check your input.");</script>';
            }
        }
}