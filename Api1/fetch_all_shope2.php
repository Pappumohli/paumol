<?php
include_once('connection.php');





$query2 = "SELECT * FROM createshope ORDER BY shopeid DESC LIMIT 2,20";
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