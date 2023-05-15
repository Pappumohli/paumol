<?php
 include_once('connection.php');

// reciveremail
$_cate =   $_GET['email'];
//senderemail

$query = "SELECT * FROM `discussinmessage` WHERE `senderemail`='$_cate' ORDER BY `messageid` DESC";
 
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="000";
            $respose['message']="record availables";
            $respose['disscussmessage']=$row;
           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    }

?>