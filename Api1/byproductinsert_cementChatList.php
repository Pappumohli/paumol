<?php

 header("Content-Type:application/json");
 header("Acess-Control-Allow-Origin: *");
 header("Acess-Control-Allow-Methods: POST");

  

include_once('connection.php');


//$productimage = $_POST['imge'];
 $productnames ="";
$p_des ="";
$p_descount = $_POST['descount'];
$p_sell_price = $_POST['sell'];
$p_totalprice ="";
$p_buyer_email = $_POST['byeremail'];


$p_seller_email_name = $_POST['selleremail'];
$p_seller_shope_address = $_POST['sellershopeaddress'];

$product_buyer_mobile_no = $_POST['mobilenoofbuyer'];
$delever_address_of_buyer = $_POST['deleveraddress'];
$nameofbuyer = $_POST['nameofbuyer'];
$buyeraddress = $_POST['buyeraddress'];

$yes = "yes";

$p_id ="";

$p_pick = $_POST['pick'];



$fileNameStart = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];

$date = Date('Y.m.d');
$time = time();
$re = $date.'-'.$time.'08_';
$fileName = $re.$fileNameStart;

$upload_path = 'housematerialimage/'; 
$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
$valid_extensions = array('jpeg','jpg','png','gif','webp','avif');


 /* first image tack  */
 if(in_array($fileExt,$valid_extensions)){



    if(!file_exists($upload_path.$fileName )){

        if($fileSize<5000000){
    move_uploaded_file($tmpPath,$upload_path.$fileName);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>"2"));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>"1"));
       // echo $errorMSG;
          
    
    }





}else{

    $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
    echo $errorMSG;
      

}


///1





$sql = "INSERT INTO `product_by_user`(`productimage`, `productname`, `ptotalprice`, `psellingprice`, `pdiscount`, `pdescription`, `productsellowneremailname`, `productselershopeaddress`,`buyeraddress`, `buyermobileno`, `deleverfulladdressofbuyer`,`buyername`,`buyeremail`,`yesnocancel`,`productpickaddress`,`oldid`) 
VALUES ('$fileName','$productnames','$p_totalprice','$p_sell_price','$p_descount','$p_des','$p_seller_email_name','$p_seller_shope_address','$buyeraddress','$product_buyer_mobile_no','$delever_address_of_buyer','$nameofbuyer','$p_buyer_email','$yes','$p_pick','$p_id');";

$sql .= "UPDATE `signup` SET `mnumber`='$product_buyer_mobile_no',`meetaddress`='$delever_address_of_buyer' WHERE email= '$p_buyer_email'";


$result = mysqli_multi_query($con,$sql);
	if($result==1){

        echo json_encode(array("message"=>"buy success","status"=>"1"));



    }else{
        echo json_encode(array("message"=>"buy time eror","status"=>"2"));

  
      
    }







?>