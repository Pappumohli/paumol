<?php
 include_once('connection.php');


$sender =   $_GET['email'];

$reciver =   $_GET['email2'];
//`messagesenderemail`='$sender' ,


//$query = "SELECT * FROM `meetup` WHERE  `messagereciveremail`='$sender' AND `messagesenderemail`='$reciver' ";
 
$query = "SELECT * FROM `meetup` WHERE  `messagesenderemail`='$sender' AND   `messagereciveremail`='$reciver'";

$result1 = mysqli_query($con,$query);
if(mysqli_num_rows($result1)>0){

 
 

          $respose['error']="001";
          $respose['message']="record availabile";
          
        

   
         }else{
           
    
            $respose['error']="000";
            $respose['message']="record not avables";
            
          
            
         }  
 
    echo json_encode($respose);


?>