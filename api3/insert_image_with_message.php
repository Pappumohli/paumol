<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");

   
include_once('connection.php');

//$message = $_POST['message'];
$send_message_email = $_POST['sender'];
$Recive_message_email = $_POST['reciver'];
$date = Date('Y.m.d');
$time = date("H:m:s");


$message_sender_date_time= $date.' AD at '.$time;

//$name = $_POST['name'];

//$fileName = $_FILES['file']['name'];
$fileNameStart = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$times = time();
$dates = date('Y.m.d');
$re = $dates.'-'.$times.'0_';
$fileName = $re.$fileNameStart;






if(empty($fileName)){

$errorMSG = json_encode(array("message"=>"please select image","status"=>false));
echo $errorMSG;


}else{



    $upload_path = 'postimages/'; 
    $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg','jpg','png','gif','avif','webp');

    if(in_array($fileExt,$valid_extensions)){

if(!file_exists($upload_path.$fileName)){

    if($fileSize<5000000){
move_uploaded_file($tmpPath,$upload_path.$fileName);



    }else{
        $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
        echo $errorMSG;
        
          

    }


}else{

    $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
    echo $errorMSG;
      

}


    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }

}
//$profileimag = $_POST['image'];
//if no error casud in continues..then;;






$sql = "INSERT INTO `discussinmessage`(`senderemail`, `image`, `reciveremail`, `messegesendingtime`)
                 VALUES ('$send_message_email','$fileName','$Recive_message_email','$message_sender_date_time')";


$result = mysqli_query($con,$sql);
	if($result==1){
        $respose['error']="000";
        $respose['message']="image send successfull";  
    }


	else{
        $respose['error']="001";
        $respose['message']="message failed";
        
      
		
    }

    echo json_encode($respose);
   



?>





