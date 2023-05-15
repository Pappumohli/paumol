<?php

include_once('connection.php');

$userName = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$gender = $_POST['gender'];

$pro = $_POST['professional'];


$query = "SELECT * FROM signup WHERE email='$email'";
$result2 = mysqli_query($con,$query);

if(mysqli_num_rows($result2)>0){
    $respose['error']="000";
    $respose['message']="allredy have an  acount";
    

       
}else{



$sql = "INSERT INTO signup(name,email,address,password,gender,professional)VALUES ('$userName','$email','$address','$password','$gender','$pro')";


///$sql .="UPDATE `city` SET `totaluser`= totaluser+1 WHERE cityname='$address' ";



$result = mysqli_query($con,$sql);
//$row = $result->fetch_assoc();
if($result>0){
  

     $query2 = "SELECT * FROM signup WHERE email='$email'";
 $result3 = mysqli_query($con,$query2);

 if(mysqli_num_rows($result3)>0){
   // if($result3>0){
     $respose['error']="000";
     $respose['message']="Ragister successfull";
        while($row = $result3->fetch_assoc()){
        $respose['user']=$row;
                     }
       


}


}else{

    $respose['error']="001";
    $respose['message']="Ragister failed";
    
}

}
echo json_encode($respose);



?>
