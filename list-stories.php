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
        <div class="col-6">
            <h2>List Stories</h2>


            <?php

            include('db_connect.php');
            include('_function.php');

            //add comment
            if (isset($_POST['btnSubmit'])) {
                
                setComment($conn, $currentUser['username']);
                

            }










            $sql = " SELECT tbl_stories.*,tbl_user.first_name,tbl_user.last_name FROM tbl_stories 
            INNER JOIN tbl_user
            ON tbl_user.username  = tbl_stories.created_by";

            $result = mysqli_query($conn, $sql);



            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <h4>[<?= $row["id"]; ?>]<?= $row["post_title"]; ?></h4>

                    <h6><?= $row["description"];
                        if($currentUser['user_type']!= 'physician'){

                            if ($row["privacy_level"] != 'HIGH-PRIVACY') {
                                ?> <span class="badge bg-secondary"> <?= $row['first_name'] ?> <?= $row['last_name'] ?></span><?= $row['created_date'] ?> <?php
                                                                                                                                                        }
                        }else{
                            ?> <span class="badge bg-secondary"> <?= $row['first_name'] ?> <?= $row['last_name'] ?></span><?= $row['created_date'] ?> <?php
                        }
                       
                                                                                                                                                    ?>
                    </h6>

                    <?php
                    $sql2 = " SELECT * FROM tbl_comment WHERE story_id = " . $row["id"];

                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2) > 0) {
                        // output data of each row
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                    ?> <p> 
                        
                        <?php 
                        for($i = 0 ;$i < $row2['rating'] ;$i++){
                                ?>   <img src="img/start.png" style="width: 20px ;" > <?php
                        }
                        ?>
                         <span class="badge text-bg-secondary"><?= $row2['rating']; ?> </span> <?= $row2['story_comment']; ?> </p> <?php
                                                        }
                                                    }
                                                            ?>

                    <a href="list-stories.php?pid=<?= $row['id'] ?>">Add Comment</a>
                    <hr>
            <?php

                }
            } else {
                echo "0 results";
            }







            ?>
        </div>
        <div class="col-4">





            <?php
            if (isset($_GET['pid'])) {

                
                //get story
                getStory($conn, $_GET['pid']);




            ?>


                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Add Comment</h5>


                        <form action="list-stories.php?pid=<?= $_GET['pid']; ?>" method="post">
                            <input type="hidden" name="story_id"  value="<?= $_GET['pid']; ?>"/>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="story_comment"></textarea>
                            </div>
                            <div class="mb-3">
                                Rating
                                <input type="radio" name="rating" value="1" checked> 1
                                <input type="radio" name="rating" value="2"> 2
                                <input type="radio" name="rating" value="3"> 3
                                <input type="radio" name="rating" value="4"> 4
                                <input type="radio" name="rating" value="5"> 5

                            </div>
                            <div class="mb-3">
                                <button type="submit" name="btnSubmit" class="btn btn-primary">Add Comment</button>
                            </div>
                        </form>


                    </div>
                </div>




            <?php

                mysqli_close($conn);
            }

            ?>


        </div>
    </div>



    </div>

    <?php

    ?>

</body>

</html>