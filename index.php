<?php
include 'blocks/navbar.php';
include 'blocks/database.php';
include 'blocks/menu.php';
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <a href="create-photo.php" class="btn btn-success" style="float:right;margin-right:90px;margin-top:10px">Upload</a>
    <div class="" style="margin-top:10px;margin-left:17%;margin-right:10%">
        <h2>Photoes</h2>


        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="index.php?view=list">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?view=details">Details</a>
            </li>

        </ul>

        <div class="row">
            <?php
            $sql = "select * from photos where userid = " . $_SESSION['id'];
            $result = mysqli_query($con, $sql);



            if (isset($_GET['view']) && $_GET['view'] == 'details') {
                echo '<table class="table"> ';
                echo ' <thead>';
                echo '<tr>';
                echo '<th scope="col">image</th>';
                echo '<th scope="col">size</th>';
                echo '<th scope="col">action</th>';
                echo '</tr>';
                echo '</thead>';
                while ($res = mysqli_fetch_array($result)) {
                    echo '<tr scope="row">';
                    echo '<td ><img src="images/' . $res['link'] . '" style = "width:70px;height:70px"></td>';
                    echo '<td>' . $res['size'] . 'KB</td>';
                    echo '<td> <a href="delete.php?id=' . $res['id'] . '" class = "btn btn-danger">Delete</a> </td>';
                    echo '<br>';
                    echo '</tr>';

                    '</table>';
                }
            }
            while ($res = mysqli_fetch_array($result)) {
                echo '<div class = "col-md-3">';
                echo  '<div class="card"style = "margin-bottom:15px">';
                echo '<img src="images/' . $res['link'] . ' " class="card-img-top" style = "height:250px">';
                echo '<div class="card-body">';
                echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong'.$res['id'].'">
                  View
                </button>';
                echo '<div class="modal fade" id="exampleModalLong'.$res['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">';
                echo '<div class="modal-dialog" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo  ' <h5 class="modal-title" id="exampleModalLabel">View Photo</h5>';
                echo  '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo    ' <span aria-hidden="true">&times;</span>';
                echo ' </button>';
             
                echo '</div>';
                echo '<div class="modal-body">';
                echo   ' <img src="images/'.$res['link'] .'" style = "width:100%">';
                echo   '</div>';
                echo ' <div class="modal-footer">';
                echo '<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>';
                echo   '</div>';
                echo  '</div>';
                echo '</div>';
                echo  '</div>';
                echo '<a href="delete.php?id=' . $res['id'] . '"class="btn btn-danger" style = "margin-left:15px">Delete</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            ?>
        </div>

    </div>

</body>

</html>