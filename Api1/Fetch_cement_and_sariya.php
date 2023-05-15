<?php
 include_once('connection.php');

 $_cate = $_GET['cement'];
 $address = $_GET['address'];

$query = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' AND shopeaddress='$address' ORDER BY productid DESC LIMIT 51";

 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="000";
            $respose['message']="record availables";
            $respose['product']=$row;
         
            

        }
        echo json_encode($respose);

    }

?>