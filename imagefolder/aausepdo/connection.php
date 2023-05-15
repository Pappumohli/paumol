<?php

//$con = mysqli_connect('localhost','root','','tester') or die('connection failed');

$db_name = "mysql:host=localhost;dbname=pamul;";
$username = "root";
$password = "";
$con= new PDO($db_name,$username,$password) or die('connection error');

?>