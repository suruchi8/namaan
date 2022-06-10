<?php
$fullname = filter_input(INPUT_POST, 'fullname');

$phonenumber = filter_input(INPUT_POST, 'phonenumber');
$date = filter_input(INPUT_POST, 'date');
$session = filter_input(INPUT_POST, 'session');

$host = "localhost";
$dbusername = "root";
$dbpassword = "123";
$dbname = "namaan";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO appointment (fullname, phonenumber, date, session)
values ('$fullname','$phonenumber','$date','$session')";
if ($conn->query($sql)){
echo "You will be called shortly to confirm your booking. Thank you.";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}

$conn->close();
}

?>