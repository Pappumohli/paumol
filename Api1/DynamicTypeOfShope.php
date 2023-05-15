<?php
include_once('connection.php');

$sql = "SELECT * FROM typeofshope_name ORDER BY typeshope ASC";
if(!$con->query($sql)){
    echo 'error beta';
}else{
    $result = $con->query($sql);
    if($result->num_rows>0){
        $return_array['typeofshopename']=array();
while($row = $result->fetch_array()){

    array_push($return_array['typeofshopename'],array(
        'sid'=>$row['idshope'],
        'ts'=>$row['typeshope']


    ));


}
echo json_encode($return_array);




    }
}


?>