<?php
 include_once('connection.php');


$_cate =   $_GET['pcat'];
$session_address =   $_GET['address'];

//$limit = 3,book ke liye;   

$query = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' AND shopeaddress='$session_address'";
 
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