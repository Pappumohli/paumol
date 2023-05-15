<?php
 include_once('connection.php');

 //$array  = array('auto driver','Brike Bussiness');

$query = "SELECT * FROM post WHERE professional != 'auto driver' AND professional != 'Brike Bussiness' 
 AND professional != 'Booking' AND professional != 'Send Bussiness' AND professional != 'Gity Bussiness' 
 AND professional != 'Hear cuting' 
ORDER BY postid DESC LIMIT 500";

$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){

$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="000";
            $respose['message']="record availables";
            $respose['post']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    }

?>