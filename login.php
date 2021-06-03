<?php
include 'blocks/database.php';
$message = "";
if (isset($_POST['submit'])) {
    $email  = $_POST['email'];

    $password = md5($_POST['password']);
    $sql  = "select * from users";
    $result = mysqli_query($con, $sql);
    while ($res = mysqli_fetch_array($result)) {
        if ($res['email'] == $email && $res['password'] == $password) {
            session_start();
            $_SESSION['id'] = $res['id'];
            $_SESSION['user'] = $res['email'];
            header("Location:index.php");
        }
    }
    $message = 'incorrect username or password';
}
?>

<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<body>
    <div class="row">
        <div class="offset-md-5 col-md-2" style="margin-top:10%">
            <form action="login.php" method="post">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title">Sign in</h3>
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <br>
                        <a href="register.php">Dont have an account? create one right now!</a>
                        <br> <br>
                        <input type="submit" name="submit" class="btn btn-primary">
                        <br>
                        <?= $message ?>
                    </div>
                </div>
            </form>
</body>

</html>