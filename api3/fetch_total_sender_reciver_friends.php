<?php
 include_once('connection.php');






$sender =   $_GET['email'];

$accept = "accept";
//messagereciveremail

$query = "SELECT * FROM `meetup` WHERE `messagesenderemail`='$sender' AND `metupaccept`='$accept' or
 `messagereciveremail`='$sender'  AND `metupaccept`='$accept' ORDER BY meetupid DESC";
 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="001";
            $respose['message']="record availables";
            $respose['allmessage']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    }




//echo json_encode($respose);



?>