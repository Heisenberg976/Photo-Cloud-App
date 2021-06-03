<?php
include 'blocks/navbar.php';
include 'blocks/database.php';
include 'blocks/menu.php';
?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
<h2>Photoes sorted by size descending</h2>
<br>
<div class="row">
<?php
            $sql = "select * from photos where userid = " . $_SESSION['id']." order by size  DESC";
            $result = mysqli_query($con, $sql);
                while ($res = mysqli_fetch_array($result)) {
                    echo '<div class = "col-md-3">';
                    echo  '<div class="card"style = "margin-bottom:15px">';
                    echo '<img src="images/' . $res['link'] . ' " class="card-img-top" style = "height:250px">';
                    echo '<div class="card-body">';
                    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                      View
                    </button>';
                    echo '<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">';
                    echo '<div class="modal-dialog" role="document">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo  '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                    echo    ' <span aria-hidden="true">&times;</span>';
                    echo ' </button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    echo   ' <img src="images/' . $res['link'] . '>';
                    echo   '</div>';
                    echo ' <div class="modal-footer">';
                    echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
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
</body>

</html>