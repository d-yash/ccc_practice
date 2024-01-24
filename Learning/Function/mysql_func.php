<?php
    function insert_query($table_name,$data){
        $columns = $VALUES = [];
        foreach($data as $col => $val){
            $columns[] = "`$col`";
            $VALUES[] = "'". addslashes($val). "'";
        }
        $columns = implode(", ",$columns);
        $VALUES = implode(", ",$VALUES);
        return "INSERT INTO {$table_name} ({$columns}) VALUES ({$VALUES})";
    }
    function update_query($table_name, $data = [], $where = []) {
        $columns = $whereCond = [];
        foreach($data as $field => $val) {
            $columns[] = " `$field` = '$val'";   
        }
        foreach($where as $field => $val) {
            $whereCond[] = " `$field` = '" . addslashes($val) ."'";
        }
        $columns = implode(",",$columns);
        $whereCond = implode(" AND ",$whereCond);
        return "UPDATE {$table_name} SET {$columns} WHERE {$whereCond};";
    }
    function delete_query($table_name, $where){
        $whereCond = [];
        foreach($where as $field => $val){
            $whereCond[] = " `$field` = '" . addslashes($val) ."'";
        }
        $whereCond = implode(" AND ", $whereCond);
        return "DELETE FROM {$table_name} WHERE {$whereCond}";
    }
    // insert_query('xyz',['pnam'=>'Test','type'=>'Typetest']);
    // echo "<br>";
    // update_query('xyz',['pnam'=>'Test','type'=>'Typetest'],['id'=>3,'email'=>'@.com']);
    // echo "<br>";
    // delete_query('xyz',['id'=>3,'email'=>'@.com']);
    // echo "<br>";
?>