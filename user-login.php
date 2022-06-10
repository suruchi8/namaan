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

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4"> </div>
        <div class="col-4">


            <h2>User Login</h2>

            <?php

            if (isset($_POST['btnSubmit'])) {
                include('db_connect.php');

                $username = $_POST['username'];
                $pword = $_POST['pword'];

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND pword = PASSWORD('$pword') AND status_code = 'ACTIVE'";
                $result = mysqli_query($conn, $sql);
                //echo  $sql;
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                       $_SESSION['userdata'] = $row;
                    }
                    header("Location: home.php");
                  
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                    Invalid Username or Password
                  </div>';
                }

                mysqli_close($conn);
            }

            ?>


            <form action="user-login.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" name="pword">
                </div>
                <div class="mb-3">

                    <button type="submit" name="btnSubmit" class="btn btn-primary">Login</button>

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