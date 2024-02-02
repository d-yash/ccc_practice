<?php
class Lib_Sql_Query_Builder extends Lib_Connection{
    public function insert($table_name, $data)
    {
        $column = $value = [];
        foreach ($data as $col => $val) {
            $column[] = sprintf("`%s`", $col);
            $value[]  = sprintf("'%s'", addslashes($val));
        }
        $column = implode(", ", $column);
        $value = implode(", ", $value);
        return "INSERT INTO {$table_name} ({$column}) VALUES ({$value});";
    }
    public function update($table_name, $data = [], $where = [])
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
    public function delete($table_name, $where)
    {
        $whereCond = [];
        foreach ($where as $field => $val) {
            $whereCond[] = " `$field` = '" . addslashes($val) . "'";
        }
        $whereCond = implode(" AND ", $whereCond);
        return "DELETE FROM {$table_name} WHERE {$whereCond};";
    }
    public function select($table_name, $column, $where = null)
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