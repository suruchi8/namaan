<?php
session_start();
require('connection.php');

$_SESSION['user']='';
if(isset($_POST['submit'])){
    try{
   $dsn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
   $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


   $user_login = !empty($_POST['username']) ? ($_POST['username']) :null;
   $passwordAttempt = !empty($_POST['pass']) ? ($_POST['pass']) :null;

   $sql = "SELECT username,password FROM register where username=:username";
   $stmt = $pdo->prepare($sql);
   $stmt->bindValue(':username',$user_login);
   $stmt->execute();

   $user = $stmt->fetch(PDO::FETCH_ASSOC);
   if($user === false){
    echo '<script>alert("invalid email or password")</script>';
   }else{
    $validPassword=password_verify($passwordAttempt,$user['password']);
    if($validPassword){
        $_SESSION['user']=$user_login;
        echo '<script>window.location.replace("register.php")</script>';
    }else{
        echo '<script>alert("invalid email or password")</script>';
    }
   }
    }  
    catch(PDOException $e)
    {
      $error= "Error:".$e->getMessage();
      echo '<script>alert("'.$error.'")</script>';
    }
}
?>