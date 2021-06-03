    <?php
    include 'session-check.php';
    ?>

    <div class="menu col-md-2" style="margin-top:10px;float:left">
        <div class="list-group">
            <a href="index.php" class="list-group-item list-group-item-action">Photos</a>
            <a href="user.php" class="list-group-item list-group-item-action">User</a>
            <a href="storage.php" class="list-group-item list-group-item-action">Storage</a>
            <a href="logout.php" class="list-group-item list-group-item-action ">Log Out</a>
        </div>
        <p>used storage:</p>
        <div class="progress">
            <?php
            $size = 0;
            $sql = "SELECT SUM(size) as 'sumSize' from photos where userid = " . $_SESSION['id'];
            $result = mysqli_query($con, $sql);
            $res = mysqli_fetch_array($result);
            $size =  $res['sumSize'] / 1024; //to MB
            //    round(number * 10) / 10
            $sizeR = ($size / 5) * 100;
            $siz = round($sizeR * 10) / 10;
            echo '<div class="progress-bar" role="progressbar" style="width:'.$siz.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">';
            ?>
            
                <?= $siz . '%'; ?>

            </div>  

        </div>
    </div>