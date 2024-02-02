<?php
    $conn;
    function getDBConnection($db_name){
        $server = "127.0.0.1";
        $username = "root";
        $pass = "";
        global $conn;
        $conn = mysqli_connect($server, $username, $pass, $db_name);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
?>