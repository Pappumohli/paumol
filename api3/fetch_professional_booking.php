<?php
 include_once('connection.php');



 $city = $_GET['city'];
 $pro = $_GET['pro'];


$query = "SELECT * FROM `feestracture` WHERE `city`='$city' AND `otherpro`='$pro' ORDER BY feeid DESC";
 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="000";
            $respose['message']="record availables";
            $respose['feeStracture']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    }

?>