<?php
 include_once('connection.php');


$_cate =   $_GET['machardani'];
$_bedset =   $_GET['bedset'];

$query = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' or productcategory='$_bedset' ORDER BY productid DESC LIMIT 6 ";
 
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
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    }

?>