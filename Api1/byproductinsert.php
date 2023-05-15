<?php

 header("Content-Type:application/json");
 header("Acess-Control-Allow-Origin: *");
 header("Acess-Control-Allow-Methods: POST");

  

include_once('connection.php');


$productimage = $_POST['imge'];
$productnames = $_POST['prname'];
$p_des = $_POST['des'];
$p_descount = $_POST['descount'];
$p_sell_price = $_POST['sell'];
$p_totalprice = $_POST['totalprice'];
$p_buyer_email = $_POST['byeremail'];


$p_seller_email_name = $_POST['selleremail'];
$p_seller_shope_address = $_POST['sellershopeaddress'];

$product_buyer_mobile_no = $_POST['mobilenoofbuyer'];
$delever_address_of_buyer = $_POST['deleveraddress'];
$nameofbuyer = $_POST['nameofbuyer'];
$buyeraddress = $_POST['buyeraddress'];

$yes = "yes";

$p_id = $_POST['pid'];

$p_pick = $_POST['pick'];
$pcharge = $_POST['charge'];
$pay = $_POST['pay'];

$sql = "INSERT INTO `product_by_user`(`productimage`, `productname`, `ptotalprice`, `psellingprice`, `pdiscount`, `pdescription`, `productsellowneremailname`, `productselershopeaddress`,`buyeraddress`, `buyermobileno`, `deleverfulladdressofbuyer`,`buyername`,`buyeremail`,`yesnocancel`,`productpickaddress`,`oldid`,`charge`,`pay`) 
VALUES ('$productimage','$productnames','$p_totalprice','$p_sell_price','$p_descount','$p_des','$p_seller_email_name','$p_seller_shope_address','$buyeraddress','$product_buyer_mobile_no','$delever_address_of_buyer','$nameofbuyer','$p_buyer_email','$yes','$p_pick','$p_id','$pcharge','$pay');";

$sql .= "UPDATE `signup` SET `mnumber`='$product_buyer_mobile_no',`meetaddress`='$delever_address_of_buyer' WHERE email= '$p_buyer_email'";


$result = mysqli_multi_query($con,$sql);
	if($result==1){

        echo json_encode(array("message"=>"buy success","status"=>"1"));



    }else{
        echo json_encode(array("message"=>"buy time eror","status"=>"2"));

  
      
    }







?>