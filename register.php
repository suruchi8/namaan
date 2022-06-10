<?php 
require('connection.php');


if(isset($_POST['submit'])){
  try{
 $dsn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
 $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $fullname=$_POST['fullname'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $pass=$_POST['password'];

  
  $sql = " SELECT COUNT(email) AS num FROM register where email= :email";
  $stmt = $pdo->prepare($sql);
$stmt->bindValue(':email',$email);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($row['num'] > 0){
  echo '<script>alert("user already exists"); </script>';
}
else{
  $stmt = $dsn->prepare("INSERT INTO register(fullname,username, email,phone, password) VALUES(:fullname,:username,:email,:phone,:password)");
$stmt->bindParam(':fullname',$fullname);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':password',$pass);


if($stmt->execute()){
    echo '<script>alert("Registration successful")</script>';
}
else{
    $error= "Error:".$e->getMessage();
    echo '<script>alert("'.$error.'")</script>';
}
}

  }catch(PDOException $e)
  {
    $error= "Error:".$e->getMessage();
    echo '<script>alert("'.$error.'")</script>';
  }
}

?>