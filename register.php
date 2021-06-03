<?php
include 'blocks/database.php';
$message = '';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $Rpassword = md5($_POST['Rpassword']);
    $sql1 = "select * from users where email = '" . $email . "'";
    $res1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($res1) > 0) {
        $message = 'account with entered email already exists';
    }


    if ($password == $Rpassword) {
        $sql = "insert into users (name,email,password) VALUES('" . $name . "','" . $email . "','" . $password . "')";
        mysqli_query($con, $sql) or die(mysqli_error($con));
    }
     header("Location:index.php");
}
?>

<html>

<head>

</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <div class="row">
        <div class="offset-md-5 col-md-2" style="margin-top:10%">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4>Sign in</h4>
                    <form action="register.php" method="post">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">


                        <label>Email</label>
                        <input type="text" name="email" class="form-control">

                        <label>Password</label>
                        <input type="password" name="password" class="form-control">

                        <label>Repeat Password</label>
                        <input type="password" name="Rpassword" class="form-control">
                        <br>
                        <input type="submit" name="submit" class="btn btn-primary">
                        <br> <br>
                        <?php 
                            if($message != '') {
                            echo '<div class="alert alert-danger" role="alert">';
                             $message;
                            echo '</div>';
                        } 
                        
                        ?>
                        
                        
                </div>
            </div>
            </form>


</body>

</html>