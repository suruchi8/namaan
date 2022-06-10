<?php

$host='localhost';
$username="root";
$password="";
$dbname='booking';
$dsn='';
try{
    $dsn='mysql:host='.$host.';dbname='.$dbname;
$pdo=new PDO($dsn,$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "connection failed".$e->getMessage();
	die();
}
?>

