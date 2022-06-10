<html>
<?php
// session_start();
// $currentUser = $_SESSION['username'];
?>

<head>
    <link href="css/bootstrap.css" rel="stylesheet" />
</head>

<body>

    <div style="background-color: black ;">
        <a href="index.html"><img src="img/8.png" style="width: 200px;margin: 10px;" /> </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
    <a href="user-login.php">Login</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4"> </div>
        <div class="col-4">
            <h1>User Registration</h1>


            <?php
            if (isset($_POST['btnSubmit'])) {
                include('db_connect.php');

                $pw = $_POST['pword'];
                $repw = $_POST['repword'];

                if (strlen($pw) >= 6 || ($pw != $repw)) {

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $username = $_POST['username'];
                    $pword = $_POST['pword'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone_number = $_POST['phone_number'];
                    $user_type = $_POST['user_type'];

                    $status_code = 'PENDING';
                    if($user_type == 'patient')
                    {
                        $status_code = 'ACTIVE';
                    }



                    $sql = " INSERT INTO tbl_user (first_name,
                    last_name,
                    username,
                    pword,
                    email,
                    address,
                    phone_number,
                    user_type,status_code)
                      VALUES ('$first_name', '$last_name','$username', PASSWORD($pword) ,'$email','$address','$phone_number','$user_type','$status_code') ";
                    if (mysqli_query($conn, $sql)) {
                        echo '<div class="alert alert-success" role="alert">
                       New user registered successfully please login 
                      </div>';
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                } else {

                    echo '<div class="alert alert-danger" role="alert">
                    Invalid Password
                  </div>';
                }

                //

                mysqli_close($conn);
            }

            ?>




            <form action="user-registration.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Fist Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="first_name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="last_name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
                </div>
                <div class="row g-2">

                    <div class="col-auto">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="pword" placeholder="min 6 character">

                    </div>
                    <div class="col-auto">
                        <label for="exampleFormControlInput1" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="repword">
                    </div>

                </div>

                <div class="row g-2">

                    <div class="col-auto">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
                    </div>
                    <div class="col-auto">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="phone_number">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">User type</label>
                    <input type="radio" name="user_type" value="patient" checked> Patient
                    <input type="radio" name="user_type" value="physician"> Physician
                </div>
                <h6>Physician should provide proof to complete their registration </h6>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                </div>



                <div class="mb-3">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Sign Up</button>
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