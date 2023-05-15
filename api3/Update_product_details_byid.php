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



$sql = "UPDATE `allproductsproduct` SET `productname`='$productname',
`productprice`='$p_totalprice',
`pdiscount`='$p_descount',
`pdescription`='$p_des',
`sellingprice`='$p_sell',
`productcategory`='$p_category' WHERE `productid`='$productid' ";




//$sql = "INSERT INTO `allproductsproduct`(`productname`, `productprice`, `productimage`, `onweremail`, `pdiscount`, `pdescription`, `sellingprice`, `productcategory`,`shopeaddress`,`image1`,`image2`,`image3`,`image4`)
              //  VALUES ('$productname','$p_totalprice','$fileName','$p_owneremail','$p_descount','$p_des','$p_sell','$p_category','$p_address','$fileName1','$fileName2','$fileName3','$fileName4')";

$result = mysqli_query($con,$sql);
	if($result==1){

        echo json_encode(array("message"=>"your product successfully update","status"=>"1"));



    }else{
        echo json_encode(array("message"=>"your product not update","status"=>"2"));

  
      
    }



?>