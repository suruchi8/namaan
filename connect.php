<?php
$fullname = filter_input(INPUT_POST, 'fullname');
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$phonenumber = filter_input(INPUT_POST, 'phonenumber');
$password = filter_input(INPUT_POST, 'password');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "namaan";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO registration (fullname, username, email, phonenumber, password)
values ('$fullname','$username','$email','$phonenumber','$password')";
if ($conn->query($sql)){
echo "<a href="login.html">LOGIN</a>";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}

$conn->close();
}

?>