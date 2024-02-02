<?php
require '../Function/connection.php';
class QueryBuilder
{
    function insert($table_name, $data)
    {
        $column = $value = [];
        foreach ($data as $col => $val) {
            $column[] = "`$col`";
            // $column[] = sprintf("`%s`", $col);
            // $value[] = sprintf("'%s'", $val);
            $value[] = "'" . addslashes($val) . "'";
        }
        $column = implode(", ", $column);
        $value = implode(", ", $value);
        return "INSERT INTO {$table_name} ({$column}) VALUES ({$value});";
    }
    function update($table_name, $data = [], $where = [])
    {
        $column = $whereCond = [];
        foreach ($data as $field => $val) {
            $column[] = " `$field` = '$val'";
        }
        foreach ($where as $field => $val) {
            $whereCond[] = " `$field` = '" . addslashes($val) . "'";
        }
        $column = implode(",", $column);
        $whereCond = implode(" AND ", $whereCond);
        return "UPDATE {$table_name} SET {$column} WHERE {$whereCond};";
    }
    function delete($table_name, $where)
    {
        $whereCond = [];
        foreach ($where as $field => $val) {
            $whereCond[] = " `$field` = '" . addslashes($val) . "'";
        }
        $whereCond = implode(" AND ", $whereCond);
        return "DELETE FROM {$table_name} WHERE {$whereCond};";
    }
    function select($table_name, $column, $where = null)
    {
        $whereCond = [];
        if (isset($where)) {
            foreach ($where as $field => $val) {
                $whereCond[] = " `$field` = '" . addslashes($val) . "'";
            }
        }
        $whereCond = implode(" AND ", $whereCond);
        $sql = $where == null ? "SELECT {$column} FROM {$table_name}" : "SELECT {$column} FROM {$table_name} WHERE {$whereCond};";
        return $sql;
    }
}
class QueryExecuter
{   
    private $conn;
    // $conn = getDBConnection($db);
    function __construct()
    {
        $_db = "ccc_practice";
        $this->conn = getDBConnection($_db);
    }
    // function __destruct()
    // {
    //     if ($this->conn instanceof mysqli && $this->conn->ping()) {
    //         $this->conn->close();
    //     }
    // }
    function execute($sql)
    {
        $result = $this->conn->query($sql);
        return $result;
    }
    function fetchAssoc($result){
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            echo "No record found!";
        }
        return $data;
    }
    public function fetchValues(array | null $result, array $parameter)
    {
        if ($result == null) return null;
        for ($i = 0; $i < count($result); $i++) {
            $this->values[$result[$i][$parameter[0]]] = $result[$i][$parameter[1]];
        };
        return $this->values;
    }
}

$qb = new QueryBuilder();
$qe = new QueryExecuter();
// $str = $qb->insert("ccc_product", ['product_id'=>88, 'product_name'=>'Yash']);
// $str = $qb->select("ccc_product", "*", ['product_id'=>2]);
// $result = $qe->fetchAssoc($qe->execute($str));

// var_dump($result);
// $str = $qb->delete("ccc_product",['product_id'=>3, 'cat_id'=>5]);
// $str = $qb->update("ccc_product", ['product_id'=>1, 'cat_id'=>5, 'price'=>150], ['product_id' => 3]);
// echo "Str : $str<br><br>";
