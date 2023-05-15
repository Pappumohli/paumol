

<?php
include_once('connection.php');

$sql = "SELECT * FROM professional ORDER BY professionallist ASC";
if(!$con->query($sql)){
    echo 'error beta';
}else{
    $result = $con->query($sql);
    if($result->num_rows>0){
        $return_array['professional']=array();
while($row = $result->fetch_array()){

    array_push($return_array['professional'],array(
        'proid'=>$row['proid'],
        'prname'=>$row['professionallist']


    ));


}
echo json_encode($return_array);




    }
}


?>