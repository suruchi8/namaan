<html>
<?php
session_start();
// $currentUser = $_SESSION['username'];
?>

<head>
    <link href="css/bootstrap.css" rel="stylesheet" />
</head>

<body>

    <div style="background-color: black ;">
        <img src="img/8.png" style="width: 200px;margin: 10px;" />
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">

                Welcome <?= $_SESSION['userdata']['username'] ?> [<?= $_SESSION['userdata']['user_type'] ?>]
                <?php

                include('_menu.php');

                ?>

                | <a href="logout.php">logout</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-2"> </div>
        <div class="col-8">

            <h3>Home-Articles</h3>


            <?php
            include('db_connect.php');
            $sql = "SELECT * FROM tbl_article ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            // echo  $sql;
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            
                 
                    <div class="card" style="width: 18rem;float: left;margin: 10px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['article_title']; ?></h5>
    <p class="card-text"><?php echo $row['description']; ?> [<?php echo $row['created_by']; ?> : <?php echo $row['created_datetime']; ?>]</p>

  </div>
</div>

            <?php
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                 Invalid Username or Password
               </div>';
            }

            ?>

        </div>
        <div class="col-2"> </div>
    </div>



    </div>

    <?php

    ?>

</body>

</html>