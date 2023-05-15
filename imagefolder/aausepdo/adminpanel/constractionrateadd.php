<?php
include_once('adminheader.php');
include_once('connection.php');

if(isset($_POST['submit'])){
$names = $_POST['user'];
$gender = $_POST['gender'];
$city = trim($_POST['cityall']);
$mobileno =trim($_POST['two']);
$name = $names;



$fileNameStart = $_FILES['file']['name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];




$date = Date('Y.m.d');
$time = time();
$re = $date.'-'.$time.'0_';
$file_name  = $re.$fileNameStart;




if(empty($name) or empty($file_name) or empty($city) or empty($gender)){
echo 'required all field';



}else{

    $file_ext = explode('.',$file_name);
    $filecheck = strtolower(end($file_ext));
    
     $extension =   array('jpeg','jpg','png','gif','webp','avif');
    
     if(in_array($filecheck,$extension)===false){
    
        echo "only png jpg amd jpeg file allow";
     }else{

    
    if(!file_exists("../../constractionimages/".$file_name)){

        move_uploaded_file($tmp_name,"../../constractionimages/".$file_name);
  $sql = "INSERT INTO `conrate`(`rate`, `image`, `des`, `otherfloueeate`, `city`) 
  VALUES (:name,:image,:gender,:mnumber,:address)";      

$sql1 = $con->prepare($sql);
 $re = $sql1->execute(array(':name'=>$name,':image'=>$file_name,':gender'=>$gender,':mnumber'=>$mobileno,':address'=>$city));

if($re>0){
  
    
       header('location:allAdd.php');
    
    }
 




}else{
    echo "othe pic given";
}


     }

}

}

?>
<link rel="stylesheet" href="../css/bootstrap.css">

<div class="main" class="bg-dark" style="background:re">
<div class="container">
    <div class="card py-3 px-5 my-5 ">

<div class="row">
    <div class="col">
        <center><h2>Add Constraction Rate</h2></center>
    </div>
</div>

        <form action="" method="post" enctype="multipart/form-data"> 
    <div class="row">
   
  
                
    <div class="col-md-6 col-lg-3">     
<label for=""><b style="color:blue">Type of Constraction rate</b></label>
<input type="text" name="user" placeholder="enter your constraction type rate" class="form-control" required><br>
</div> 
<div class="col-md-6 col-lg-3">

<label for=""><b style="color:blue">Address/city</b></label><br>

<!-- start value -->
<select name="cityall" value="" class="form_control">
<?php

$sql2 = "SELECT * FROM `city` ORDER BY cityname ASC";

$re = $con->prepare($sql2);

$re->execute();

$row2  = $re->fetchAll(PDO::FETCH_ASSOC);

 
if(count($row2)>0){


   foreach($row2 as $data){

   // echo $data['cityname'];

   
?>

<option value=" <?php echo $data['cityname'] ?> ">  <?php echo $data['cityname'] ; } }?>  </option>
</select><br>
   </div>

   <!-- value close -->


<div class="col-md-6 col-lg-3">
<label for=""><b style="color:blue">Description</b></label>
<input type="text" name="gender" placeholder="enter your all flower rate description"  class="form-control" required><br>
</div> 


</div>









<div class="row">
      
<!-- coll 3 start -->
<div class="col-lg-4 col-md-6">
<label for=""><b style="color:blue">image</b></label>
<input type="file" name="file" class="form-control" required><br>
       
        </div> <!-- coll 3 close-->

    
<textarea name="two" id="one" cols="30" rows="10" >

</textarea>
<!-- coll 4 start -->







       
        <div class="row"><div class="col">

            <center><input type="submit" name="submit"  class="btn btn-primary" value="ADD NOW"></center><br><br>

        
            
        </div></div>

        </form>
    
</div>
</div>
</div>
