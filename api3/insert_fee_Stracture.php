<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
 
include_once('connection.php');

$fees = $_POST['fee'];
$specialFee = $_POST['special'];

$email = $_POST['email'];
$des = $_POST['descrption'];

$time = $_POST['replyTime'];

$pro2 = $_POST['pro'];
$name = $_POST['name'];
$city = $_POST['city'];
$caddress = $_POST['caddress'];
$charge = $_POST['feecharge'];


$fileNameStart = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$times = time();
$date = Date('Y.m.d');
$re = $date.'-'.$times.'0_';
$fileName = $re.$fileNameStart;


$fileNameOne = $_FILES['file1']['name'];
$tmpPath1 = $_FILES['file1']['tmp_name'];
$fileSize1 = $_FILES['file1']['size'];
//$times = time();
//$date = Date('Y.m.d');
$re1 = $date.'-'.$times.'1_';
$fileName1 = $re1.$fileNameOne;






//$upload_path = 'profileimages/'; 

$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
$fileExt1 = strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
$valid_extensions = array('jpeg','jpg','png','gif','webp','avif');
$valid_extensions1 = array('jpeg','jpg','png','gif','webp','avif');

if(in_array($fileExt,$valid_extensions)){



    if(!file_exists('profileimages/'.$fileName )){

        if($fileSize<500000){
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


if(in_array($fileExt1,$valid_extensions1)){



    if(!file_exists('profileimages/'.$fileName1 )){

        if($fileSize1<500000){
    move_uploaded_file($tmpPath1,'profileimages/'.$fileName1);
    
    
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

$sql = "INSERT INTO `feestracture`(`fee`,`special`, `discription`,  `replaytime`,`email`,`otherpro`,`profesionalrelatedimage`,`city`,`currentaddress`,`username`,`image1`,`charge`) VALUES
 ('$fees','$specialFee','$des','$time','$email','$pro2','$fileName','$city','$caddress','$name','$fileName1','$charge')";

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





