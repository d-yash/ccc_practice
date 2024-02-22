<?php

class Core_Model_Resource_Abstract
{
    protected $_tableName = "";
    protected $_primaryKey = "";
    public function __construct()
    {
        $this->init('catalog_product', 'product_id');
    }
    public function init($tableName, $primaryKey)
    {
        $this->_tableName = $tableName;
        $this->_primaryKey = $primaryKey;
    }
    public function getTableName()
    {
        return $this->_tableName;
    }
    public function load($id, $column = null)
    {
        $sql = "select * FROM {$this->_tableName} WHERE {$this->_primaryKey}=$id";
        return $this->getAdapter()->fetchRow($sql);
    }
    public function save(Core_Model_Abstract $abstract)
    {
        $data = $abstract->getData();
        if (isset($data[$this->getPrimaryKey()])) {
            unset($data[$this->getPrimaryKey()]);
        }
        $sql = $this->insertSql($this->getTableName(), $data);
        $id = $this->getAdapter()->insert($sql);
        echo "<pre>";
        $abstract->setId($id);
        print_r($abstract->getData());
    }
    public function delete(Core_Model_Abstract $abstract)
    {
        $query = "DELETE FROM {$this->_tableName} WHERE {$this->_primaryKey} = {$abstract->getId()}";
        return $this->getAdapter()->delete($query);
    }
    public function insertSql($tableName, $data)
    {
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
