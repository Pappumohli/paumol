
<?php
include_once('connection.php');

$email = $_GET['email'];

$query = "SELECT * FROM meetup WHERE message_reciver_email='$email' ORDER BY meetupid DESC";

$result = mysqli_query($con,$query);
$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="000";
            $respose['message']="record availables";
            $respose['notification']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    






?>