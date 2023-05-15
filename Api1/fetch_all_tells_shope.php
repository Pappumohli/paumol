<?php
 include_once('connection.php');


$typeofshope =   $_GET['cement'];
$city = $_GET['city'];

//$limit = 3,book ke liye;   

$query = "SELECT  `shopename`, `shopeemail`, `shopeimage`, `shopeaddress`, `typeofshope`, `whichcityofshope` FROM `createshope` WHERE  typeofshope='$typeofshope' AND  whichcityofshope='$city' ORDER BY shopeid DESC LIMIT 50";
 
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