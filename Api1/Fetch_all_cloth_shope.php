<?php
include_once('connection.php');

$City = $_GET['city'];

$TypeOfShope = $_GET['clothshope'];

$query2 = "SELECT * FROM createshope WHERE `whichcityofshope`='$City' AND `typeofshope`='$TypeOfShope'";
$result3 = mysqli_query($con,$query2);

if(mysqli_num_rows($result3)>0){
  
    $respose['error']="000";
    $respose['message']="Ragister successfull";
    
$row = $result3->fetch_all(MYSQLI_ASSOC);
if(empty($row)){
  
    $respose['error']="001";
    $respose['message']="no record";
    
       

        }else{

            $respose['error']="000";
            $respose['message']="reord found";
            $respose['shope']=$row;

        }
        echo json_encode($respose);
    }

?>