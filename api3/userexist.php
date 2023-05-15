
<?php

include_once('connection.php');

$email = $_POST['email'];
$date = 'of '.date('h:i A');
$explode = explode(" ",$date);
$explode[1];
//echo $explode[1]."<br>";
$explode2 = explode(":",$explode[1]);

  $explode2[0];//hour
  $explode2[1];//minuts

  $oldtime = $_POST['oldtime'];

 // $oldtime = "on 04:10 AM";

  $olde = explode(" ",$oldtime);
  $olde[1];

  $newe = explode(":",$olde[1]);

  $newe[0];//hour
  $newe[1]; // minuts


//   $hour = 03;
//   $minuts = 20;


$distance =$explode2[0]-$newe[0] ;
$distance2 =$explode2[1]-$newe[1] ;

$distancetotal = $distance.':'.$distance2;


$query = "UPDATE `signup` SET `go`='$date' , distance='$distancetotal' WHERE email='$email' ";
$result2 = mysqli_query($con,$query);

if($result2>0){
    $respose['error']="001";
    $respose['message']="user of";
    

       
}else{


    $respose['error']="000";
    $respose['message']="user error";  


}
echo json_encode($respose);


?>