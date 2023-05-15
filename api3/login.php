<?php
include_once('connection.php');


$email = $_POST['email'];
$password = $_POST['password'];


$checkuser ="SELECT * FROM signup WHERE email='$email'";
$checkres = mysqli_query($con,$checkuser);
if(mysqli_num_rows($checkres)>0){

    $checkuserquery ="SELECT * FROM signup WHERE email='$email' AND password='$password'";
    $checkresult = mysqli_query($con,$checkuserquery);

    if(mysqli_num_rows($checkresult)>0){


        $respose['error']="200";
        $respose['message']="login susccess";

        while($row = $checkresult->fetch_assoc()){
            $respose['user']=$row;
            
                }
               
            

    }else{
        $respose['user']=(object)[];
        $respose['error']="400";
        $respose['message']="wrong creditional";
    
    }

}else{
    $respose['user']=(object)[];
    $respose['error']="001";
    $respose['message']="record not avaible";

}
echo json_encode($respose);
?>