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
    public function fetch($columns, array $condition = [])
    {
        $query = $this->getQueryBuilder()->select($this->tableName, $columns, $condition = []);
        $query .= " ORDER BY `product_id` DESC LIMIT 10";
        $result = $this->getQueryExecuter()->execute($query);
        return $this->getQueryExecuter()->fetchAssoc($result);
    }
    public function fetchOne(array $data, array $where_condition)
    {
        $query = $this->getQueryBuilder()->select($this->tableName, $data, $where_condition);
        $result = $this->getQueryExecuter()->execute($query);
        return $this->getQueryExecuter()->fetchAssoc($result);
    }
}