<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$subject = filter_input(INPUT_POST, 'subject');



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
$sql = "INSERT INTO contact (fullname, email, subject)
values ('$name','$email','$subject')";
if ($conn->query($sql)){
echo "Your enquiry will be responded soon. Thank you for contacting.";
}
else{
echo "Error: ". $sql ."
". $conn->error;
}

$conn->close();
}

?>