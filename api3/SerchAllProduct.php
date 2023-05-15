<?php


 include_once('connection.php');



$name_show  = $_GET['pname'];


$name2 = trim($name_show);

$apna =   " AAAAA BBBB CCCC DDDDD";

$name = $name2.$apna;

//echo $name;


$re = explode(' ',$name);

//$Total = count($name2);

//echo $Total;

  $var1 = $re[0];
  $var2 = $re[1];
  $var3 = $re[2];
  $var4 = $re[3];
//print_r($re);



$fileExt = strtolower($var1);

$valid_extensions = array('women','mobile','leptop','gif','avif');

if(in_array($fileExt,$valid_extensions)){


$var1 = $re[0].'llnulllllll';


}


$fileExt = strtolower($var3);

$valid_extensions = array('women','mobile','leptop','girls','girl','gril');

if(in_array($fileExt,$valid_extensions)){


$var3 = $re[0].'llnulllllll';


}

$fileExt = strtolower($var2);

$valid_extensions = array('women','mobile','leptop','girls','girl','gril');

if(in_array($fileExt,$valid_extensions)){


$var2 = $re[0].'llnulllllll';


}






$address  = $_GET['address'];
//or productname LIKE '%{$name}%' AND shopeaddress LIKE '%{$address}%'
//or searchproduct LIKE'%{$name}%' AND shopeaddress LIKE '%{$address}%'
//searchproduct REGEXP '[$name]'or productname LIKE '%{$re[1]}%' AND shopeaddress LIKE '%{$address}%'
$query = "SELECT * FROM allproductsproduct WHERE  productcategory LIKE'%{$name_show}%' AND shopeaddress LIKE '%{$address}%'  
 or productname LIKE'%{$name_show}%' AND shopeaddress LIKE '%{$address}%'or productcategory LIKE '%{$var1}%' AND shopeaddress LIKE '%{$address}%'
 or productcategory LIKE '%{$var3}%' AND shopeaddress LIKE '%{$address}%'or productcategory LIKE '%{$var2}%' AND shopeaddress LIKE '%{$address}%'
";

//$query = "SELECT * FROM allproductsproduct WHERE productname REGEXP '$name|$name|$name'";

//$query = "SELECT DISTINCT productname FROM allproductsproduct WHERE  REGEXP '[$name]'";


$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){


$row = $result->fetch_all(MYSQLI_ASSOC);

if(empty($row)){
  
    $respose['error']="000";
    $respose['message']="no record";
    
   
        }else{
            $respose['error']="000";
            $respose['message']="record availables";
            $respose['product']=$row;





           /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
            

        }
        echo json_encode($respose);

    }

?>

