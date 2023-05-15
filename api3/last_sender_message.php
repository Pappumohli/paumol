

<?php
 include_once('connection.php');

// reciveremail
$_cate =   $_GET['email'];

$reciver =   $_GET['email2'];
$query = "SELECT * FROM `discussinmessage` WHERE `senderemail`='$_cate' AND `reciveremail`='$reciver' ORDER BY `messageid` DESC LIMIT 1 ";
 
$result3 = mysqli_query($con,$query);

if(mysqli_num_rows($result3)>0){
  
  //  $respose['error']="000";
   // $respose['message']="Ragister successfull";
    
    while($row = $result3->fetch_assoc()){
        $respose =$row;
        
            }
       

        }else{

            $respose['error']="001";
            $respose['message']="no reord found";
            

        }
        echo json_encode($respose);

?>
