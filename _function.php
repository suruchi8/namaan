<?php

function getStory($conn, $pid)
{

    $sql = "SELECT * FROM tbl_stories WHERE id = $pid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Story No: " . $row["id"] . " - " . $row["post_title"] . " " . $row["description"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}




function setComment($conn,$commentby)
{

    $sql = "INSERT INTO tbl_comment (story_comment, story_id, comment_by,rating)
    VALUES ('".$_POST['story_comment']."', '".$_POST['story_id']."', '$commentby','".$_POST['rating']."')";
    
    if (mysqli_query($conn, $sql)) {
      echo '<div class="alert alert-success" role="alert">
      New comment created
    </div>';
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
