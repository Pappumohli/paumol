<?php

 header("Content-Type:application/json");
 header("Acess-Control-Allow-Origin: *");
 header("Acess-Control-Allow-Methods: POST");

  

include_once('connection.php');



$productname = $_POST['pname'];
$p_des = $_POST['des'];
$p_descount = $_POST['descount'];
$p_sell = $_POST['sell'];
$p_totalprice = $_POST['totalprice'];
$p_owneremail = $_POST['email'];

$p_address = $_POST['address'];
$p_category = $_POST['category'];

$fileName = $_POST['image1'];
$fileName1 = $_POST['image2'];
$fileName2 = $_POST['image3'];
$fileName3 = $_POST['image4'];


$filename6 = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];


$date = Date('Y.m.d');
$time = time();
$re = $date.'-'.$time.'09_';
$filename5 = $re.$filename6;






$upload_path = 'housematerialimage/'; 
$fileExt = strtolower(pathinfo($filename5,PATHINFO_EXTENSION));

$valid_extensions = array('jpeg','jpg','png','gif','webp');

if(in_array($fileExt,$valid_extensions)){
   // & $upload_path.$fileName1 & $upload_path.$fileName2 & $upload_path.$fileName3 & $upload_path.$fileName4

if(!file_exists($upload_path.$filename5 )){

if($fileSize<5000000){
move_uploaded_file($tmpPath,$upload_path.$filename5);


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


$sql = "INSERT INTO `allproductsproduct`(`productname`, `productprice`, `productimage`, `onweremail`, `pdiscount`, `pdescription`, `sellingprice`, `productcategory`,`shopeaddress`,`image1`,`image2`,`image3`,`image4`)
                VALUES ('$productname','$p_totalprice','$fileName','$p_owneremail','$p_descount','$p_des','$p_sell','$p_category','$p_address','$fileName1','$fileName2','$fileName3','$filename5')";

$result = mysqli_query($con,$sql);
	if($result==1){

        echo json_encode(array("message"=>" your product successfully upload","status"=>1));



    }else{
        echo json_encode(array("message"=>" your product not upload","status"=>2));

  
      
    }








?>