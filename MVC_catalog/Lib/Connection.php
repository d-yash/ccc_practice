<?php

class Lib_Connection{
    protected $_conn = null;
    function __construct()
    {
        $this->connect();
    }
    function connect(){
        if(is_null($this->_conn)){
            $this->_conn = mysqli_connect("localhost", "root", "", "ccc_practice");
            if($this->_conn === false){
                die("Connection failed: " . mysqli_connect_error());
            }
        }
        return $this->_conn;
    }
}