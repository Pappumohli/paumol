

<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");

   
include_once('connection.php');


$fileName = $_FILES['file']['name'];
$shopename = $_POST['shopename'];
$email = $_POST['email'];
$shopeAddress = $_POST['sopeaddress'];
$type = $_POST['typeofshope'];

$city = $_POST['city'];


$data = json_decode(file_get_contents("php://input"),true);//collect input parameters and converts into readable format

$fileName = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];

if(empty($fileName)){

$errorMSG = json_encode(array("message"=>"please select image","status"=>false));
echo $errorMSG;


}else{



    $upload_path = 'shopeimages/'; 
    $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg','jpg','png','gif');

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

//if no error casud in continues..then;;


if(!isset($errorMSG)){



    $query = "INSERT INTO `createshope`(`shopename`, `shopeemail`, `shopeimage`, `shopeaddress`, `typeofshope`,`whichcityofshope`)
    VALUES('$shopename','$email','$fileName','$shopeAddress','$type','$city')";
     
$result = mysqli_query($con,$query);
	if($result==1){

        $respose['error']="000";
        $respose['message']="your shope successfull create";
        

		
       // echo json_encode(array("message"=>"post upload successfully","status"=>true,""));
		
	}
	else{
        $respose['error']="0001";
        $respose['message']="failed not successfull";
        
        //echo json_encode(array("message"=>"post upload failed","status"=>false));
		
    }

    echo json_encode($respose);
   
}


?>




























