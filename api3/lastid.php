<?php
 include_once('connection.php');


$_cate =   $_GET['pcat'];
//$limit = 3,book ke liye;   

$query = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' ORDER BY productid DESC LIMIT 1";
 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


$row = $result->fetch_all(MYSQLI_ASSOC);


foreach($row as $list){

    $lastid = $list['productid'];

}

   $re = $lastid;

   echo $re;

   $last2 = $re-5;
   //echo $last2;

  
  
  $query2 = "SELECT * FROM allproductsproduct WHERE productcategory='$_cate' ORDER BY  productid < $re";
  
   
  $result2 = mysqli_query($con,$query2);
  if(mysqli_num_rows($result2)>0){
  
  
  $row2 = $result2->fetch_all(MYSQLI_ASSOC);
  
  if(empty($row2)){
    
      $respose['error']="000";
      $respose['message']="no record";
      
     
          }else{
              $respose['error']="000";
              $respose['message']="record availables";
              $respose['product']=$row2;
           
              
  
          }
          echo json_encode($respose);
  
      }
  





    
}

?>