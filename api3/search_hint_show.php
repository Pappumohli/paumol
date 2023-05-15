<?php


 include_once('connection.php');



$name_show  = $_GET['pname'];









$query = "SELECT productcategoryname FROM product_category WHERE  productcategoryname LIKE'{$name_show}%'ORDER BY  productcategoryname LIMIT 10";


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

