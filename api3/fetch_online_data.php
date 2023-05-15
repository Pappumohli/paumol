
<?php

include_once('connection.php');

$email = $_GET['email'];





$query = "SELECT come FROM `signup`  WHERE email='$email' ";
$result2 = mysqli_query($con,$query);


if(mysqli_num_rows($result2)>0){
    // if($result3>0){
    
         while($row = $result2->fetch_assoc()){
         $respose=$row;
         
                      }
    

       
}else{


    $respose['error']="000";
    $respose['message']="user off";  


}
echo json_encode($respose);


?>