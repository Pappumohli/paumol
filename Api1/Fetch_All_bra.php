<?php
 include_once('connection.php');


$_cate =   $_GET['ppanty'];
//$limit = 3,book ke liye;   
 $_bra =   $_GET['pbra'];
 // $_sari =   $_GET['psari'];
  //$_jins =   $_GET['pgins'];


// $query = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' or productcategory='$_bra' 
// ORDER BY productid DESC LIMIT 5";
$query = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' or productcategory='$_bra' 
ORDER BY productid DESC LIMIT 5,20";



 
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