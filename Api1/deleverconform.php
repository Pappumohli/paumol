<?php
 include_once('connection.php');


$buyemail =   $_POST['buyeremail'];

$conform = $_POST['conform'];

$id = $_POST['id'];


$query = "UPDATE `product_by_user` SET deleverconform='$conform' WHERE buyeremail='$buyemail' AND byid='$id'";

//$query = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' ORDER BY productid DESC LIMIT 30,20";




 
$result = mysqli_query($con,$query);
//if(mysqli_num_rows($result)>0){


//$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($result)){
  
    $respose['error']="000";
    $respose['message']="error";
    
   
        }else{
            $respose['error']="001";
            $respose['message']="delever conform";
           // $respose['product']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

  //  }

?>