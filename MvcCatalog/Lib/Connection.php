<?php

class Lib_Connection
{
    protected $_conn;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        if (is_null($this->_conn)) {
            $this->_conn = mysqli_connect("localhost", "root", "", "ccc_practice");
            if (!$this->_conn) {
                die("Connection error: " . mysqli_connect_error());
            }
        }
        return $this->_conn;
    }

    
}