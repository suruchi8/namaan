
<?php

$sname= "localhost";

$unmae= "root";

$password = "123";

$db_name = "namaan";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}