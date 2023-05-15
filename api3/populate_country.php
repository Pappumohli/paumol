<?php
include_once('connection.php');

$sql = "SELECT * FROM city ORDER BY cityname ASC";
if(!$con->query($sql)){
    echo 'error beta';
}else{
    $result = $con->query($sql);
    if($result->num_rows>0){
        $return_array['city']=array();
while($row = $result->fetch_array()){

    array_push($return_array['city'],array(
        'cityid'=>$row['cityid'],
        'cityname'=>$row['cityname']


    ));


}
echo json_encode($return_array);




    }
}


?>