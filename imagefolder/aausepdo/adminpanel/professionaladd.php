<?php
include_once('adminheader.php');
include_once('connection.php');

if(isset($_POST['submit'])){
$pro = trim($_POST['pro']);





if(empty($pro)){
echo 'required all field';



}else{

  
  $sql = "INSERT INTO `professional`(`professionallist`) VALUES (:pro)";      

$sql1 = $con->prepare($sql);
 $re = $sql1->execute(array(':pro'=>$pro));

if($re>0){
  
    
       header('location:allAdd.php');
    
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
        <center><h2>Add Professional</h2></center>
    </div>
</div>

        <form action="" method="post" enctype="multipart/form-data"> 
    <div class="row">
   
  
                
    <div class="col-md-6 col-lg-3">     
<label for=""><b style="color:blue">Add Professional</b></label>
<input type="text" name="pro" placeholder="add professional" class="form-control" required><br>
</div> 
<div class="col-md-6 col-lg-3">





</div>









<div class="row">






       
        <div class="row"><div class="col">

            <center><input type="submit" name="submit"  class="btn btn-primary" value="ADD NOW"></center><br><br>

        
            
        </div></div>

        </form>
    
</div>
</div>
</div>
