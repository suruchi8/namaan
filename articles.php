<html>
<?php
session_start();
$currentUser = $_SESSION['userdata'];
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

                <a href="logout.php">logout</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-2"> </div>
        <div class="col-4">
            <h3>Articles</h3>


            <?php
            include('db_connect.php');
            $username = $currentUser['username'];
            if (isset($_POST['btnSubmit'])) {





                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $article_title = $_POST['article_title'];
                $description = $_POST['description'];



                $sql = " INSERT INTO tbl_article (article_title,
                        description,
                        created_by)
                          VALUES ('$article_title', '$description','$username') ";

                if (mysqli_query($conn, $sql)) {
                    echo '<div class="alert alert-success" role="alert">
                           New Article Created Successfully 
                          </div>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            ?>


            <form action="articles.php" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Article Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="article_title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Article</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Add Article</button>
                </div>
            </form>

        </div>
        <div class="col-6">

            <h3>My Articles</h3>

            <?php

            $sql = "SELECT * FROM tbl_article WHERE created_by = '$username'";
            $result = mysqli_query($conn, $sql);
           // echo  $sql;
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="alert alert-warning" role="alert">
                        <h5><?php echo $row['article_title']; ?></h5>
                        <p><?php echo $row['description']; ?> [<?php echo $row['created_by']; ?> : <?php echo $row['created_datetime']; ?>]</p>

                    </div>

            <?php
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    Invalid Username or Password
                  </div>';
            }



            mysqli_close($conn);
            ?>





        </div>
    </div>



    </div>

    <?php

    ?>

</body>

</html>