<?php
include_once('connection.php');
$email = $_GET['email'];




$query2 = "SELECT name,mnumber,meetaddress FROM signup WHERE email='$email'";
$result3 = mysqli_query($con,$query2);

if(mysqli_num_rows($result3)>0){
  
    // $respose['error']="000";
    // $respose['message']="your record find";
    
    while($row = $result3->fetch_assoc()){
        $respose =$row;
        
            }
       

        }else{

            $respose['error']="001";
            $respose['message']="no reord found";
            

        }
        echo json_encode($respose);

?>