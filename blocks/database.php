<?php
    $username = 'root';
    $pass = '';
    $db = 'photo cloud app';
    $host = '127.0.0.1';
    $con = mysqli_connect($host,$username,$pass,$db);
    if(!$con){
        die(mysqli_connection_error());
    }

?>