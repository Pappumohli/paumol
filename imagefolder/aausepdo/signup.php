<?php
include_once('signup_header.php');
include_once('connection.php');

if(isset($_POST['submit'])){
$name = $_POST['user'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];
$city = $_POST['cityall'];


$professional = $_POST['pro'];
//$mobileno = $_POST['mn'];
$mobileno = "";

$meetaddress = "";

 $file_name = $_FILES['file']['name'];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];

echo $select_one;

if(empty($name) or empty($file_name) or empty($email) or empty($city) or empty($gender) or empty($professional) or empty($pass)){
echo 'required all field';



}else{

    $file_ext = explode('.',$file_name);
    $filecheck = strtolower(end($file_ext));
    
     $extension =   array('jpeg','jpg','png','gif','webp','avif');
    
     if(in_array($filecheck,$extension)===false){
    
        echo "only png jpg amd jpeg file allow";
     }else{

      $query = "SELECT * FROM signup WHERE email=:email";

$query2 = $con->prepare($query);
 $query2->execute(array(':email'=>$email));
$row  = $query2->fetch();
if($row>0){
    echo "please enter diffrent email";
}else{

    if(!file_exists($upload_path.$fileName)){




        move_uploaded_file($tmp_name,"../profileimages/".$file_name);

   
       
$sql = "INSERT INTO `signup`(`name`, `email`, `professional`, `address`, `gender`, `password`, `prfileimage`,`mnumber`, `meetaddress`) 
VALUES (:name,:email,:pro,:address,:gender,:pass,:image,:mnumber,:meetaddress)";

$sql1 = $con->prepare($sql);
 $re = $sql1->execute(array(':name'=>$name,':email'=>$email,':pass'=>$pass,':image'=>$file_name,':address'=>$city,':pro'=>$professional,':gender'=>$gender,':mnumber'=>$mobileno,':meetaddress'=>$meetaddress));

if($re>0){
    $query5 = "SELECT * FROM signup WHERE email=:email";

    $query6 = $con->prepare($query5);
     $query6->execute(array(':email'=>$email));
    $row  = $query6->fetch();

    if($row>0){
    
    session_start();
    $_SESSION['id'] =$row['id'];
    $_SESSION['email'] =$row['email'];
    $_SESSION['name'] =$row['name'];
    
       header('location:professional/home.php');
    
    }
 
}else{
    echo "not add";
}



}else{

    echo 'this images file name all ready exist please this image name change';

}
}



     }



}

}


?>
<link rel="stylesheet" href="css/bootstrap.css">

<div class="main" class="bg-dark" style="background:re">
<div class="container">



    <div class="card py-3 px-5 my-5 ">

<div class="row">
    <div class="col">
        <center><h2>signup form</h2></center>
    </div>
</div>


        <form action="" method="post" enctype="multipart/form-data"> 
    <div class="row">
   
  
                
    <div class="col-md-6 col-lg-3">     
<label for=""><b style="color:blue">Name</b></label>
<input type="text" name="user" placeholder="enter your name" class="form-control" required><br>
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
<label for=""><b style="color:blue">Gender</b></label>
<input type="text" name="gender" placeholder="enter your gender"  class="form-control" required><br>
</div> 

<div class="col-md-6 col-lg-3">
<label for=""><b style="color:blue">Password</b></label>
<input type="password" name="pass" placeholder="enter your password" class="form-control"  required><br>

</div> 


</div>









<div class="row">
        <!-- coll 2 start -->
        <div class="col-lg-4 col-md-6">
        <label for=""><b style="color:blue">Email</b></label>
<input type="email" name="email" placeholder="enter your email" class="form-control" required><br>
        </div> <!-- coll 2 close-->

<!-- coll 3 start -->
<div class="col-lg-4 col-md-6">
<label for=""><b style="color:blue">image</b></label>
<input type="file" name="file" class="form-control" required><br>
       
        </div> <!-- coll 3 close-->

<!-- coll 4 start -->
<div class="col-lg-4 col-md-6">
      

        <label for=""><b style="color:blue">professional</b></label><br>


<select name="pro" value="" class="form_control">
<?php


$sql2 = "SELECT * FROM `professional` ORDER BY professionallist ASC";

$re = $con->prepare($sql2);

$re->execute();

$row3  = $re->fetchAll(PDO::FETCH_ASSOC);

if(count($row3)>0){


   foreach($row3 as $data2){

   // echo $data['cityname'];

   
?>

<option value="<?php echo $data2['professionallist'] ; ?>"><?php echo $data2['professionallist'] ; } }?></option>

</select><br>


        </div> <!-- coll 4 close-->
    </div>







       
        <div class="row"><div class="col">

            <center><input type="submit" name="submit"  class="btn btn-primary" value="SIGNUP NOW"></center><br><br>

            <center><p><input type="checkbox">  <b style="color:red"> I have allready Account..</b><a href="index.php" class ="btn btn-dark">  login</a></p></center>
            
            
        </div></div>

        </form>
    
</div>
</div>
</div>
