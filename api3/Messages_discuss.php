<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");

   
include_once('connection.php');

$message = $_POST['message'];
$send_message_email = $_POST['sender'];
$Recive_message_email = $_POST['reciver'];
$date = Date('Y.m.d');
$time = date("H:m:s");


$message_sender_date_time= $date.' AD at '.$time;

//$name = $_POST['name'];

//$profileimag = $_POST['image'];
//if no error casud in continues..then;;






$sql = "INSERT INTO `discussinmessage`(`senderemail`, `message`, `reciveremail`, `messegesendingtime`)
                 VALUES ('$send_message_email','$message','$Recive_message_email','$message_sender_date_time')";


$result = mysqli_query($con,$sql);
	if($result==1){
        $respose['error']="000";
        $respose['message']="message send successfull";  
    }


	else{
        $respose['error']="001";
        $respose['message']="message failed";
        
      
		
    }

    echo json_encode($respose);
   



?>





