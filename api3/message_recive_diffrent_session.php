<?php
 include_once('connection.php');
 //ORDER BY `messageid` DESC

$_cate =   $_GET['email'];
$_cate2 =   $_GET['sendermessagefetchemail'];

$query = "SELECT * FROM `discussinmessage` WHERE `senderemail`='$_cate' AND `reciveremail`='$_cate2'";
 
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