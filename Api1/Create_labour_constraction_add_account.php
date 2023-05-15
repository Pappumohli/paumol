<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
 
include_once('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$mobileNo = $_POST['no'];
$age_local = $_POST['agelocal'];
$city = $_POST['citymy'];
$caddress = $_POST['address'];

$account = $_POST['account'];

$sql = "INSERT INTO `labour_account`( `name`, `email`, `mobileno`, `city`, `age`, `caddress`,`typeofaccount`) 
VALUES ('$name','$email','$mobileNo','$city','$age_local','$caddress','$account');";


$sql .= "UPDATE `signup` SET `mnumber`='$mobileNo',`meetaddress`='$caddress' WHERE email= '$email'";



$result = mysqli_multi_query($con,$sql);
	if($result==1){

            $respose['error']="000";
            $respose['message']="insert successfull";
         
        
        } else{
        $respose['error']="001";
        $respose['message']="insert failed";
        
      
    }

    echo json_encode($respose);
   



?>





