<?php
include 'blocks/database.php';
include 'blocks/navbar.php';
include 'blocks/menu.php';
$message = "";
if (isset($_POST['submit'])) {
    $old = $_POST['oldPass'];
    $new = $_POST['newPass'];
    $Rnew = $_POST['repeatNewPass'];


    $sql = "select* from users where email='" . $_SESSION['user'] . "'";
    $result = mysqli_query($con, $sql);
    while ($res = mysqli_fetch_array($result)) {
        if ($res['password'] == md5($old) && $new == $Rnew) {
            $sql = "update users set password ='" . md5($new) . "' where email ='" . $_SESSION['user'] . "'";
            mysqli_query($con, $sql);
        } // 
        else    $message = "fields do not match";
    }
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <div class="card" style="padding-left:70px;width:550px;border:none;padding-top:10px">
        <div class="card-body">
            <h3 class="card-title">Change Password</h3>
            <form action="user.php" method="post">
                <label> Old Password</label>
                <input type="password" class="form-control" name="oldPass">
                <label>New Password</label>
                <input type="password" class="form-control" name="newPass">
                <label>Repeat New Password</label>
                <input type="password" class="form-control" name="repeatNewPass">
                <b> <?= $message ?> </b>
                <br>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>

                <br>
                <div class="card">
                <h3>Danger Zone</h3>
                    <div class="card-body">
                    Once deleted,this action can not be undone.
                    </div>
                   
                </div>
                <a href="delete-acc.php" class = "btn btn-danger" name = "delete-acc">Delete Account</a>
                
                

            

        </div>
    </div>
</body>

</html>