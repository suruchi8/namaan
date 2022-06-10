<html>
<?php
session_start();
$currentUser = $_SESSION['username'];
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
                <p>Hello <?= $_SESSION['username']; ?></p>
                <p> <a href="home.php">Home</a> 
                | <a href="ask-question.php">Ask</a> 
                <?php   if($currentUser == 'admin'){ ?> | <a href="answer-question.php">Answer</a>   <?php   } ?> 
                | <a href="list-question.php">View All</a>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-4"> </div>
            <div class="col-4">


                <?php

                include('db_connect.php');

              

                if (isset($_POST['btnSubmit'])) {


                  
                    $title = $_POST['title'];
                    $question = $_POST['question'];


                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "INSERT INTO tbl_question
                    ( title,
                     question,
                     created_user)
        VALUES ('$title',
                '$question', '$currentUser')";


                    if (mysqli_query($conn, $sql)) {
                        echo '<div class="alert alert-success" role="alert">
                        New question created successfully
                      </div>';
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }

                ?>
                <h2>Ask Question</h2>

                <form action="ask-question.php" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Question</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <button class="btn btn-primary" type="submit" name="btnSubmit">Ask Now</button>
                    </div>
                </form>



                <?php
                //get question with answers

                ?>





            </div>
            <div class="col-4"> </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="bd-example">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "SELECT * FROM tbl_question WHERE created_user = '$currentUser'  ORDER BY id DESC ";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                    <tr>
                                        <th scope="row"><?= $row['id'] ?></th>
                                        <td><?= $row['title'] ?>
                                            <p style="font-size: x-small;"> By<?= $row['created_user']; ?> On <?= $row['created_date']; ?></p>
                                        </td>
                                        <td><?= $row['question'] ?></td>
                                        <td><?= $row['answer'] ?>
                                            <p style="font-size: x-small;"><?= $row['answer_by']; ?></p>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>


    </div>

    <?php
    mysqli_close($conn);
    ?>

</body>

</html>