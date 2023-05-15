<?php
include_once('connection.php');



$cement = $_GET['cement'];
$tails  = $_GET['tails'];

$query2 = "SELECT * FROM createshope WHERE typeofshope !='$cement' AND typeofshope !='$tails' ORDER BY shopeid DESC LIMIT 40 ";
$result3 = mysqli_query($con,$query2);

if(mysqli_num_rows($result3)>0){
  
    $respose['error']="000";
    $respose['message']="Ragister successfull";
    
    while($row = $result3->fetch_assoc()){
        $respose['shope'][]=$row;
        
            }
       

        }else{

            $respose['error']="001";
            $respose['message']="no reord found";
            

        }
        echo json_encode($respose);

?>