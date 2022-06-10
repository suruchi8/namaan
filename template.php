<html>
<?php
session_start();
//  $currentUser = $_SESSION['userdata'];
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




        </div>
        <div class="col-4"> </div>
    </div>



    </div>

    <?php

    ?>

</body>

</html>