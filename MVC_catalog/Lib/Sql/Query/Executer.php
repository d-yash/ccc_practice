<?php
class Lib_Sql_Query_Executer extends Lib_Connection
{
    function execute($sql)
    {
        $result = $this->_conn->query($sql);
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
    public function fetchArray(mysqli_result|bool $data)
    {
        $result = [];
        while ($row = $data->fetch_array()) {
            $result[] = $row;
        }
        return $result;
    }
    public function fetchValues($result, $parameter)
    {
        $values = [];
        if ($result->num_rows <= 0)
            return null;
        while ($row = $result->fetch_assoc()) {
            $values[$row[$parameter[0]]] = $row[$parameter[1]];
        }
        return $values;
    }
}
