

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Create Shope</h1>
 <form action="" method="post" enctype="multipart/form-data" >
 <input type="text" name="email" value="email">
 <input type="text" name="pname" value="productname">
<input type="file" name="file" value="shopeimage" >
<input type="text" name="des" value="description" >

<input type="text" name="descount" value="productdescount">
 <input type="text" name="sell" value="sellingprice">
<input type="text" name="totalprice" value="totalprice" >
<input type="text" name="category" value="productcategory" >
<input type="text" name="address" value="shopeAddress" >




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

$productname = $_POST['pname'];
$p_des = $_POST['des'];
$p_descount = $_POST['descount'];
$p_sell = $_POST['sell'];
$p_totalprice = $_POST['totalprice'];
$p_owneremail = $_POST['email'];

$p_address = $_POST['address'];
$p_category = $_POST['category'];

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
    echo $errorMSG;
      

}


    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }

}

//if no error casud in continues..then;;


if(!isset($errorMSG)){



$sql = "INSERT INTO `allproductsproduct`(`productname`, `productprice`, `productimage`, `onweremail`, `pdiscount`, `pdescription`, `sellingprice`, `productcategory`,`shopeaddress`)
                VALUES ('$productname','$p_totalprice','$fileName','$p_owneremail','$p_descount','$p_des','$p_sell','$p_category','$p_address')";

$result = mysqli_query($con,$sql);
	if($result==1){

        echo 'data add';



    }else{
        echo 'errror';
    }
}



}




?>

