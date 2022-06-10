<?php 

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <h1>Hello, <?php echo $_SESSION['username']; ?></h1>

     <a href="logout.php"><button class="w3-button w3-black">Log Out</button></a>

</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>