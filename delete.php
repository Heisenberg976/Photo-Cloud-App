<?php
    include 'blocks/database.php';
    include 'blocks/session-check.php';
    if(isset($_GET['id'])){
        $sql1 = "select * from photos where id = ". $_GET['id'];
        $result = mysqli_query($con,$sql1);
        $res = mysqli_fetch_array($result);
        unlink('images/'.$res['link']);
        $sql  = "delete from photos where id = ".$_GET['id'];  
        mysqli_query($con,$sql);
        header('Location:index.php');
    }
