<?php
    function insert($table_name,$data){
        $columns = $VALUES = [];
        foreach($data as $col => $val){
            $columns[] = "`$col`";
            $VALUES[] = "'". addslashes($val). "'";
        }
        $columns = implode(", ",$columns);
        $VALUES = implode(", ",$VALUES);
        return "INSERT INTO {$table_name} ({$columns}) VALUES ({$VALUES})";
    }
    function update($table_name, $data = [], $where = []) {
        $columns = $whereCond = [];
        foreach($data as $field => $vale) {
            $columns[] = " `$field` = '$vale'";
            
        }
    
        foreach($where as $field => $vale) {
            $whereCond[] = " `$field` = '$vale'";
        }
        $columns = implode(",",$columns);
        $whereCond = implode(" AND ",$whereCond);
        return "UPDATE {$table_name} SET {$columns} WHERE {$whereCond};";
    
    }
    update('xyz',['pnam'=>'Test','type'=>'Typetest'],['id'=>3,'email'=>'@.com']);
    die;
?>