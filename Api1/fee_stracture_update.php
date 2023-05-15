<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
 
include_once('connection.php');

$fees = $_POST['fees'];

$feSpecial = $_POST['spd'];
$email = $_POST['email'];
$des = $_POST['descrption'];

$time = $_POST['replyTime'];
$name = $_POST['name'];
$caddress = $_POST['current'];

$id = $_POST['id'];

$sql = "UPDATE `feestracture` SET `fee`='$fees',`special`='$feSpecial',`discription`='$des',`replaytime`='$time',`currentaddress`='$caddress',`username`='$name' WHERE `email`='$email'AND `feeid`='$id'";

$result = mysqli_query($con,$sql);
	if($result==1){

            $respose['error']="000";
            $respose['message']="update successfull";
         
        
        } else{
        $respose['error']="001";
        $respose['message']="update failed";
        
      
    }

    echo json_encode($respose);
   



?>





