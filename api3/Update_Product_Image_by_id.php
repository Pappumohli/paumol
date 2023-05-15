<?php

 header("Content-Type:application/json");
 header("Acess-Control-Allow-Origin: *");
 header("Acess-Control-Allow-Methods: POST");

  

include_once('connection.php');


$productid = $_POST['id'];
$productname = $_POST['pname'];
$p_des = $_POST['des'];
$p_descount = $_POST['descount'];
$p_sell = $_POST['sell'];
$p_totalprice = $_POST['totalprice'];
//$p_owneremail = $_POST['email'];

//$p_address = $_POST['address'];
$p_category = $_POST['category'];

//$data = json_decode(file_get_contents("php://input"),true);//collect input parameters and converts into readable format

$fileName = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];

$fileName1 = $_FILES['file1']['name'];
$tmpPath1 = $_FILES['file1']['tmp_name'];
$fileSize1 = $_FILES['file1']['size'];

$fileName2 = $_FILES['file2']['name'];
$tmpPath2 = $_FILES['file2']['tmp_name'];
$fileSize2 = $_FILES['file2']['size'];

$fileName3 = $_FILES['file3']['name'];
$tmpPath3 = $_FILES['file3']['tmp_name'];
$fileSize3 = $_FILES['file3']['size'];


$fileName4 = $_FILES['file4']['name'];
$tmpPath4 = $_FILES['file4']['tmp_name'];
$fileSize4 = $_FILES['file4']['size'];

if(empty($fileName)){

$errorMSG = json_encode(array("message"=>"please select image","status"=>false));
echo $errorMSG;


}else{



    $upload_path = 'addproductimages/'; 
    $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

    $valid_extensions = array('jpeg','jpg','png','gif','webp','avif');
 
    if(in_array($fileExt,$valid_extensions)){
       // & $upload_path.$fileName1 & $upload_path.$fileName2 & $upload_path.$fileName3 & $upload_path.$fileName4



    if($fileSize<5000000){
move_uploaded_file($tmpPath,$upload_path.$fileName);


    }else{
        $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
        echo $errorMSG;
        
          

    }





    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;

    }

}

///2
if(empty($fileName1)){

    $errorMSG = json_encode(array("message"=>"please select image","status"=>false));
    echo $errorMSG;
    
    
    }else{
    
    
    
        $upload_path1 = 'addproductimages/'; 
        $fileExt1 = strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
    
        $valid_extensions1 = array('jpeg','jpg','png','gif','webp','avif');
     
        if(in_array($fileExt1,$valid_extensions1)){
           // & $upload_path.$fileName1 & $upload_path.$fileName2 & $upload_path.$fileName3 & $upload_path.$fileName4
    

    
        if($fileSize1<5000000){
    move_uploaded_file($tmpPath1,$upload_path1.$fileName1);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
   
    
        }else{
    
            $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
            echo $errorMSG;
    
        }
    
    }
    


//2 close

//3

if(empty($fileName2)){

    $errorMSG = json_encode(array("message"=>"please select image","status"=>false));
    echo $errorMSG;
    
    
    }else{
    
    
    
        $upload_path2 = 'addproductimages/'; 
        $fileExt2 = strtolower(pathinfo($fileName2,PATHINFO_EXTENSION));
    
        $valid_extensions2 = array('jpeg','jpg','png','gif','webp','avif');
     
        if(in_array($fileExt2,$valid_extensions2)){
           // & $upload_path.$fileName1 & $upload_path.$fileName2 & $upload_path.$fileName3 & $upload_path.$fileName4
    
   
    
        if($fileSize2<5000000){
    move_uploaded_file($tmpPath2,$upload_path2.$fileName2);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
  
    
    
        }else{
    
            $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
            echo $errorMSG;
    
        }
    
    }
    


//3 close

///4
if(empty($fileName3)){

    $errorMSG = json_encode(array("message"=>"please select image","status"=>false));
    echo $errorMSG;
    
    
    }else{
    
    
    
        $upload_path3 = 'addproductimages/'; 
        $fileExt3 = strtolower(pathinfo($fileName3,PATHINFO_EXTENSION));
    
        $valid_extensions3 = array('jpeg','jpg','png','gif','webp','avif');
     
        if(in_array($fileExt3,$valid_extensions3)){
           // & $upload_path.$fileName1 & $upload_path.$fileName2 & $upload_path.$fileName3 & $upload_path.$fileName4
    
   
        if($fileSize3<5000000){
    move_uploaded_file($tmpPath3,$upload_path3.$fileName3);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
   
    
    
        }else{
    
            $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
            echo $errorMSG;
    
        }
    
    }
    


//4 close

//5

if(empty($fileName4)){

    $errorMSG = json_encode(array("message"=>"please select image","status"=>false));
    echo $errorMSG;
    
    
    }else{
    
    
    
        $upload_path4 = 'addproductimages/'; 
        $fileExt4 = strtolower(pathinfo($fileName4,PATHINFO_EXTENSION));
    
        $valid_extensions4 = array('jpeg','jpg','png','gif','webp','avif');
     
        if(in_array($fileExt4,$valid_extensions4)){
           // & $upload_path.$fileName1 & $upload_path.$fileName2 & $upload_path.$fileName3 & $upload_path.$fileName4
    
  
        if($fileSize4<5000000){
    move_uploaded_file($tmpPath4,$upload_path4.$fileName4);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
     
    
     
    
        }else{
    
            $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
            echo $errorMSG;
    
        }
    
    }
    


//5 close



//if no error casud in continues..then;;


if(!isset($errorMSG)){

$sql = "UPDATE `allproductsproduct` SET `productname`='$productname',
`productprice`='$p_totalprice',
`productimage`='$fileName',
`pdiscount`='$p_descount',
`pdescription`='$p_des',
`sellingprice`='$p_sell',
`productcategory`='$p_category',
`image1`='$fileName1',
`image2`='$fileName2',
`image3`='$fileName3',
`image4`='$fileName4' WHERE `productid`='$productid' ";




//$sql = "INSERT INTO `allproductsproduct`(`productname`, `productprice`, `productimage`, `onweremail`, `pdiscount`, `pdescription`, `sellingprice`, `productcategory`,`shopeaddress`,`image1`,`image2`,`image3`,`image4`)
              //  VALUES ('$productname','$p_totalprice','$fileName','$p_owneremail','$p_descount','$p_des','$p_sell','$p_category','$p_address','$fileName1','$fileName2','$fileName3','$fileName4')";

$result = mysqli_query($con,$sql);
	if($result==1){

        echo json_encode(array("message"=>"your product successfully update","status"=>"1"));



    }else{
        echo json_encode(array("message"=>"your product not update","status"=>"2"));

  
      
    }
}







?>