<?php
    require 'connection.php';
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
    function insert_exe($db, $table_name, $data){
        $conn = getDBConnection($db);
        $column = $value = [];
        foreach($data as $col => $val){
            $column[] = "`$col`";
            $value[] = "'" . addslashes($val) . "'";
        }
        $column = implode(", ", $column);
        $value = implode(", ", $value);
        $sql = "INSERT INTO {$table_name} ({$column}) VALUES ({$value})";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
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
    function update_exe($db, $table_name, $data=[], $where=[]){
        $conn = getDBConnection($db);
        $column = $whereCond = [];
        foreach($data as $field => $val) {
            $column[] = " `$field` = '$val'";   
        }
        foreach($where as $field => $val) {
            $whereCond[] = " `$field` = '" . addslashes($val) ."'";
        }
        $column = implode(",",$column);
        $whereCond = implode(" AND ",$whereCond);
        $sql = "UPDATE {$table_name} SET {$column} WHERE {$whereCond};";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    function delete_query($table_name, $where){
        $whereCond = [];
        foreach($where as $field => $val){
            $whereCond[] = " `$field` = '" . addslashes($val) ."'";
        }
        $whereCond = implode(" AND ", $whereCond);
        return "DELETE FROM {$table_name} WHERE {$whereCond}";
    }
    function delete_exe($db, $table_name, $where){
        $whereCond = [];
        foreach($where as $field => $val){
            $whereCond[] = "`$field` = '" . addslashes($val) . "'"; 
        }
        $whereCond = implode(", ", $whereCond);
        $sql = "DELETE FROM {$table_name} WHERE {$whereCond}";
        $conn = getDBConnection($db);
        $result = $conn->query($sql);
        return $result;
    }
    function select($table_name, $column){
        return "SELECT {$column} FROM {$table_name}";
    }
    function select_exe($db, $table_name, $column, $arg){
        $sql = "SELECT {$column} FROM {$table_name} " . $arg;
        $conn = getDBConnection($db);
        $result = $conn -> query($sql);
        return $result;
    }
?>