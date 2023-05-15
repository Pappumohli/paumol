<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
 
include_once('connection.php');


$email = $_POST['email'];
$target = $_POST['target'];
$name = $_POST['name'];
$city = $_POST['city'];
$local = $_POST['local'];

$fileNameStart = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$times = time();
$date = Date('Y.m.d');
$re = $date.'-'.$times.'0_';
$fileName = $re.$fileNameStart;

//$upload_path = 'profileimages/'; 

$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

$valid_extensions = array('jpeg','jpg','png','gif','webp','avif');


if(in_array($fileExt,$valid_extensions)){



    if(!file_exists('profileimages/'.$fileName )){

        if($fileSize<5000000){
    move_uploaded_file($tmpPath,'profileimages/'.$fileName);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>"2"));
            echo $errorMSG;
            
              
    
        }
    
    
     }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>"1"));
     echo $errorMSG;
          
    
    }





}else{

    $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
    echo $errorMSG;
      


/* first image close */
}




if(!isset($errorMSG)){

$sql = "INSERT INTO `addinsert`(`name`, `email`, `target`, `adimage`, `city`, `local`)
 VALUES ('$name','$email','$target','$fileName','$city','$local')";

$result = mysqli_query($con,$sql);
	if($result==1){

            $respose['error']="000";
            $respose['message']="insert successfull";
         
        
        } else{
        $respose['error']="001";
        $respose['message']="insert failed";
        
      
    }

    echo json_encode($respose);
   
}


?>





