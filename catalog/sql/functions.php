<?php
    function insert_query($table_name,$data){
        $column = $value = [];
        foreach($data as $col => $val){
            $column[] = "`$col`";
            $value[] = "'". addslashes($val). "'";
        }
        $column = implode(", ",$column);
        $value = implode(", ",$value);
        return "INSERT INTO {$table_name} ({$column}) VALUES ({$value})";
    }
    function update_query($table_name, $data = [], $where = []) {
        $column = $whereCond = [];
        foreach($data as $field => $val) {
            $column[] = " `$field` = '$val'";   
        }
        foreach($where as $field => $val) {
            $whereCond[] = " `$field` = '" . addslashes($val) ."'";
        }
        $column = implode(",",$column);
        $whereCond = implode(" AND ",$whereCond);
        return "UPDATE {$table_name} SET {$column} WHERE {$whereCond};";
    }
    function delete_query($table_name, $where){
        $whereCond = [];
        foreach($where as $field => $val){
            $whereCond[] = " `$field` = '" . addslashes($val) ."'";
        }
        $whereCond = implode(" AND ", $whereCond);
        return "DELETE FROM {$table_name} WHERE {$whereCond}";
    }
    function select($table_name, $column){
        return "SELECT {$column} FROM {$table_name}";
    }
?>