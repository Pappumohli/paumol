<?php

include_once('connection.php');
header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");





$phonenumber = $_POST['number'];
$Time = $_POST['time'];
$MeetAddress = $_POST['caddress'];
$Meetname = $_POST['meetname'];
$Only = $_POST['only'];
//if no error casud in continues..then;;
$email = $_POST['email'];
$image_path = $_POST['image'];

$user_city = $_POST['city'];



$query = "INSERT INTO `metforcustamer`(`mnumber`, `mettime`, `meetaddress`,`meetname`,`only`,`image`,`email`,`city`) 
VALUES ('$phonenumber','$Time','$MeetAddress','$Meetname','$Only','$image_path','$email','$user_city')";
   /// $query = "UPDATE `signup` SET `mnumber`='$phonenumber',`mettime`='$Time',`meetaddress`='$MeetAddress' WHERE id = $id";

    $result = $con->query($query);
	
	if($result==1){
		
        echo json_encode(array("message"=>"data upload successfully","status"=>true));
		
	}
	else{
		
        echo json_encode(array("message"=>"image upload failed","status"=>false));
		
    }
   


?>