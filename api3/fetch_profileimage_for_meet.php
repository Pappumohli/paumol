<?php
include_once('connection.php');

$email = $_GET['email'];

$query = "SELECT prfileimage FROM signup   WHERE email='$email'";
 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


    if(mysqli_num_rows($result)>0){
  
        // $respose['error']="000";
        // $respose['message']="your record find";
        
        while($row = $result->fetch_assoc()){
            $respose =$row;
            
                }
           
    
            }else{
    
                $respose['error']="001";
                $respose['message']="no reord found";
                
    
            }
            echo json_encode($respose);
    }

?>



