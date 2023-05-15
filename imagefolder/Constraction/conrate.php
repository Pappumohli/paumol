

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="" method="post" enctype="multipart/form-data" >
  
 <input type="text" name="rate" value="rate">
<input type="file" name="file" value="image" >
<input type="text" name="expan" value="explanation" >

<input type="submit" value = "submit" name="submit">



</form>


</body>
</html>

<?php


// header("Content-Type:application/json");
// header("Acess-Control-Allow-Origin: *");
// header("Acess-Control-Allow-Methods: POST");

  


include_once('../connection.php');

if(isset($_POST['submit'])){

$_rate = $_POST['rate'];
$_des = $_POST['expan'];

$date = Date('Y.m.d');

$time = date("H:m:s");
echo $time;








//$data = json_decode(file_get_contents("php://input"),true);//collect input parameters and converts into readable format

$fileName = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];

if(empty($fileName)){

$errorMSG = json_encode(array("message"=>"please select image","status"=>false));
echo $errorMSG;


}else{



    $upload_path = '../postimages/'; 
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
   // echo $errorMSG;
      

}


    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }

}

//if no error casud in continues..then;;


if(!isset($errorMSG)){



$sql = "INSERT INTO `conrate`(`rate`, `image`, `des`)
                 VALUES ('$_rate','$fileName','$_des')";

$result = mysqli_query($con,$sql);
	if($result==1){

        echo 'data add';



    }else{
        echo 'errror';
    }
}



}




?>

