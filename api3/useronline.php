
<?php

include_once('connection.php');

$email = $_POST['email'];
$date = 'on '.date('h:i A');




$query = "UPDATE `signup` SET `come`='$date'  WHERE email='$email' ";
$result2 = mysqli_query($con,$query);

if($result2>0){
    $respose['error']="001";
    $respose['message']="user on";
    

       
}else{


    $respose['error']="000";
    $respose['message']="user off";  


}
echo json_encode($respose);


?>