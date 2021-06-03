<?php
    include 'blocks/database.php';
    include 'blocks/session-check.php';
   
        $sql = "delete from users where id = ".$_SESSION['id'];
        $sql1 = "select * from photos where userid = ". $_SESSION['id'];
        mysqli_query($con,$sql) or die(mysqli_error($con));
       $result =  mysqli_query($con,$sql1);
        while($res = mysqli_fetch_array($result)){
            unlink('images/'.$res['link']);
        }
        $sql2 = "delete  from photos where userid =" . $_SESSION['id'];
        mysqli_query($con,$sql2);
        
    header('Location:login.php');
?>