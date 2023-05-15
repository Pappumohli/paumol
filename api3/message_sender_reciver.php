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


$message_sender_date_time= $date.' '.$time;

$name = $_POST['name'];

$profileimag = $_POST['image'];
//if no error casud in continues..then;;
$rImage = $_POST['rimage'];
$rname = $_POST['rname'];
$rProfessional = $_POST['rpro'];

$messageSenderProfessional = $_POST['senderpro'];



$sql = "INSERT INTO `meetup`(`messagesenderemail`, `messaege`, `messagereciveremail`, `messagesendtime`,`name`,`images`,`acceptname`, `meetupacceptimage`, `rciverprofessional`,`senderprofessional`)
                 VALUES ('$send_message_email','$message','$Recive_message_email','$message_sender_date_time','$name','$profileimag','$rname','$rImage','$rProfessional','$messageSenderProfessional');";

$sql .="UPDATE `signup` SET `notification`=notification+1 WHERE email='$Recive_message_email'";


$result = mysqli_multi_query($con,$sql);
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





