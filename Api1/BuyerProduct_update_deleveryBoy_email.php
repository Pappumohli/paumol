<?php
 include_once('connection.php');

 
$DeleveryBoyemail =   $_POST['deleveryboyremail'];

$buyeremail = $_POST['buyeremail'];

$id = $_POST['id'];
$no = "im order";

$deleveryboyimage = $_POST['deleveryboyimage'];

$query = "UPDATE `product_by_user` SET deleveryboyemail='$DeleveryBoyemail', deleveryboyimage='$deleveryboyimage', yesnocancel='$no' WHERE buyeremail='$buyeremail' AND byid='$id';";

$query .= "UPDATE `deleveryboyaccount` SET `totalproductpickfordelever`=totalproductpickfordelever+1 WHERE demail='$DeleveryBoyemail'";


 
$result = mysqli_multi_query($con,$query);
//if(mysqli_num_rows($result)>0){


//$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($result)){
  
    $respose['error']="000";
    $respose['message']="error";
    
   
        }else{
            $respose['error']="001";
            $respose['message']="my response this product of dellever";
           // $respose['product']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

  //  }

?>