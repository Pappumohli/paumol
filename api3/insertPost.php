<?php

include_once('connection.php');

header("Content-Type:application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");

   
include_once('connection.php');

$title = $_POST['title'];
$email = $_POST['email'];
$aname = $_POST['authorname'];
$date = Date('Y.m.d');
$time = date("H:m:s");


$authorImage = $_POST['authorimage'];
$address = $_POST['address'];


$pro = $_POST['professional'];

$data = json_decode(file_get_contents("php://input"),true);//collect input parameters and converts into readable format

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

//if no error casud in continues..then;;


if(!isset($errorMSG)){



$sql = "INSERT INTO post(`title`, `postauthoremail`, `time`, `paname`, `authorImage`, `postimage`,`address`,`professional`,`please`)
                 VALUES ('$title','$email','$date','$aname','$authorImage','$fileName','$address','$pro','$time')";

$result = mysqli_query($con,$sql);
	if($result==1){


        $query2 = "SELECT * FROM post WHERE postauthoremail='$email'";
        $result3 = mysqli_query($con,$query2);
        
        if(mysqli_num_rows($result3)>0){
          
            $respose['error']="000";
            $respose['message']="Ragister successfull";
            
            while($row = $result3->fetch_assoc()){
                $respose['post']=$row;
                
                    }
               
        
        
        }

		
       // echo json_encode(array("message"=>"post upload successfully","status"=>true,""));
		
	}
	else{
        $respose['error']="000";
        $respose['message']="Ragister successfull";
        
        //echo json_encode(array("message"=>"post upload failed","status"=>false));
		
    }

    echo json_encode($respose);
   
}


?>





