<?php

include_once('connection.php');
header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");


$id = $_POST['id'];

$data = json_decode(file_get_contents("php://input"),true);//collect input parameters and converts into readable format

$fileNameStart = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];

$date = Date('Y.m.d');
$time = time();
$re = $date.'-'.$time.'0_';
$fileName = $re.$fileNameStart;

if(empty($fileName)){

$errorMSG = json_encode(array("message"=>"please select image","status"=>false));
echo $errorMSG;


}else{



    $upload_path = 'profileimages/'; 
    $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg','jpg','png','gif','avif','webp');

    if(in_array($fileExt,$valid_extensions)){

if(!file_exists($upload_path.$fileName)){

    if($fileSize<500000000){
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

//if no error casud in continues..then;;


if(!isset($errorMSG)){
    $query = "UPDATE `signup` SET `prfileimage`='$fileName' WHERE id = $id";

    $result = $con->query($query);
	
	if($result==1){
		
        echo json_encode(array("message"=>"image upload successfully","status"=>true));
		
	}
	else{
		
        echo json_encode(array("message"=>"image upload failed","status"=>false));
		
    }
   
}

