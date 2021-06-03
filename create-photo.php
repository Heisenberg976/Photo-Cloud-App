<?php
include 'blocks/database.php';
include 'blocks/navbar.php';
include 'blocks/menu.php';
if (isset($_POST['submit'])) {
    $sql = "SELECT SUM(size) as 'sumSize' from photos where userid = " . $_SESSION['id'];
    $result = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($result);
    $size = $res['sumSize']/1024;
    if ($size > 5) {
        echo  ' <div class="alert alert-danger" role="alert">';
        echo 'You have reached the limit!';
        echo '</div>';
    } else {
        $photo = $_FILES['photo'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $link = md5(time()) . $photo['name'];
        $size = $photo['size'] / 1024;
        move_uploaded_file($file_tmp, 'images/' . $link);
        $sql = "insert into photos (userid,link,size) values(" . $_SESSION['id'] . ",'" . $link . "', '" . $size . "')";
        $result = mysqli_query($con, $sql);
        header("Location:index.php?view=list");
    }
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <!-- <form action="create-photo.pvhp" method="post" enctype="multipart/form-data">
        <label>Upload your photo</label>
        <input type="file" name="photo" >
        <br>
        <input type="submit" name="submit" class=  "btn btn-primary">
    </form> -->

    <form action="create-photo.php" method="post" enctype="multipart/form-data">
        <div class="form-group col-md-9 offset-2" style="margin-top:15px">
            <label for="exampleFormControlFile1">Upload your photo</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
            <br>
            <input type="submit" name="submit" class="btn btn-primary">
        </div>

    </form>


</body>

</html>