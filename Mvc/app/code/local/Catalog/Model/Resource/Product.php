<?php
class Catalog_Model_Resource_Product extends Core_Block_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }
    public function getTableName(){
        return $this->_tableName;   
    }
    //Above part is abstract
    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
    public function load($id, $column = null)
    {
        $sql = "select * FROM {$this->_tableName} WHERE {$this->_primaryKey}=$id";
        return $this->getAdapter()->fetchRow($sql);
    }
    public function save(Catalog_Model_Product $product){
        $data = $product->getData();
        if(isset($data[$this->getPrimaryKey()])){
            unset($data[$this->getPrimaryKey()]);
        }
        $sql = $this->insertSql($this->getTableName(), $data);
        $id = $this->getAdapter()->insert($sql);
        var_dump($id);
        echo "<pre>";
        $product->setId($id);
        print_r($product->getData());
    }
    public function insertSql($tableName, $data){
        $columns = $values = [];
        foreach ($data as $col => $val) {
            $columns[] = "`$col`";
            $values[] = "'" . addslashes($val) . "'";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", $values);
        return "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
    }
    public function getAdapter()
    {
        return new Core_Model_Db_Adapter();
    }
    public function getPrimaryKey()
    {
        return $this->_primaryKey;
    }
}
