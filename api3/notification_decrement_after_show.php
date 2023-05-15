<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");

  $Recive_message_email = $_POST['email'];
  $Sender_message_email = $_POST['email2'];
  $acceptname = $_POST['aceptname'];
  $filename = $_POST['image'];

  

  $accept= $_POST['accept'];

$sql ="UPDATE `signup` SET `notification`=notification-1 WHERE email='$Recive_message_email'; ";

//$sql .="UPDATE `signup` SET `notification`=notification+1 WHERE email='$Sender_message_email'; ";

 $sql .="UPDATE `meetup` SET `metupaccept` ='$accept' ,`acceptname` ='$acceptname' ,`meetupacceptimage`='$filename'

  WHERE `messagereciveremail`='$Recive_message_email' AND  `messagesenderemail`='$Sender_message_email' ";

$result = mysqli_multi_query($con,$sql);
	if($result==1){
        $respose['error']="000";
        $respose['message']="notification decrement successfull";  
    }


	else{
        $respose['error']="001";
        $respose['message']="message failed";
        
      
		
    }

    echo json_encode($respose);
   



?>







