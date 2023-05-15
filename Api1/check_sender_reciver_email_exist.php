<?php
 include_once('connection.php');


$Sender =   $_GET['email'];
 $Reciver = $_GET['email2'] ;

$query = "SELECT * FROM `meetup` WHERE  `messagesenderemail` ='$Sender' AND  `messagereciveremail`='$Reciver' ";
 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){



  
     $respose['error']="001";
     $respose['message']="record avabiles";
    
         }else{
            
            $respose['error']="000";
            $respose['message']="record not availables";

         }
        echo json_encode($respose);

      

?>