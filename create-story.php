<html>
<?php
session_start();
$userdata = $_SESSION['userdata'];
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
        <div class="col-4"> </div>
        <div class="col-4">
            <h3>Create Story</h3>

            <?php
            if (isset($_POST['btnSubmit'])) {
                include('db_connect.php');

                $title = $_POST['post_title'];
                $description = $_POST['description'];
                $privacy_level = $_POST['privacy_level'];
                $created_by = $userdata['username'];

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "INSERT INTO tbl_stories (post_title, description, privacy_level,created_by)
VALUES ('$title', '$description', '$privacy_level','$created_by')";


                if (mysqli_query($conn, $sql)) {
                    $last_id = mysqli_insert_id($conn);
                    echo   '<div class="alert alert-success" role="alert">
                    New Story Post Created successfully. Post ID is: ' . $last_id .'</div>'  ;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            }

            ?>

            <form action="create-story.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="post_title" class="form-control" id="exampleFormControlInput1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Story</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Privacy Level</label>
                   <input type="radio" name="privacy_level" value="LOW-PRIVACY" checked/>  Low privacy
                   <input type="radio" name="privacy_level" value="HIGH-PRIVACY" />  High privacy
                </div>
                <div class="mb-3">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Post Story</button>
                </div>
            </form>


        </div>
        <div class="col-4"> </div>
    </div>



    </div>

    <?php

    ?>

</body>

</html>