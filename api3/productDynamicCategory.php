<?php
include_once('connection.php');

$sql = "SELECT * FROM product_category ORDER BY productcategoryname ASC";
if(!$con->query($sql)){
    echo 'error beta';
}else{
    $result = $con->query($sql);
    if($result->num_rows>0){
        $return_array['productcategory']=array();
while($row = $result->fetch_array()){

    array_push($return_array['productcategory'],array(
        'pcid'=>$row['productcategoryid'],
        'pcn'=>$row['productcategoryname'],
        'charge'=>$row['charge']

    ));


}
echo json_encode($return_array);




    }
}


?>