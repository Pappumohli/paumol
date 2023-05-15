<?php
 include_once('connection.php');


$_cate =   $_GET['email'];
  

$accept = "";

$query = "SELECT * FROM `meetup` WHERE `messagereciveremail`='$_cate' AND `metupaccept`='$accept' ORDER BY meetupid DESC";
 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="000";
            $respose['message']="record availables";
            $respose['allmessage']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    }

?>