<?php
include_once('signup_header.php');
include_once('connection.php');

if(isset($_POST['submit'])){

$email = $_POST['email'];
$pass = $_POST['pass'];



if( empty($email) or empty($pass)){
echo 'required all field';



}else{

  

    
      

    $query5 = "SELECT * FROM signup WHERE email=:email AND password=:pas";

    $query6 = $con->prepare($query5);
     $query6->execute(array(':email'=>$email,':pas'=>$pass));
    $row  = $query6->fetch();

    if($row>0){
    
    session_start();
    $_SESSION['id'] =$row['id'];
    $_SESSION['email'] =$row['email'];
    $_SESSION['name'] =$row['name'];
    
       header('location:professional/home.php');
    
    

}else{


    $error = 'please enter right email & password';
    ?>
  <center><p style="color:red"><b> <?php echo $error ?></b></p></center>
    
    <?php
 
} 




}



     }

    








?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">



    <style>
   #main{

   border:2px solid black;
  


   } 
   #main:hover{

border:2px solid green;



} 
.row{
 
    
}

</style>

</head>
<body class="bg-primary">




<div class="container ">
    <div class="row justify-content-center">
        <div class=" col-md-12 col-lg-6 my-5 ">

             <h1>@</h1>


            <div class="card py-3 px-3 align_self_center" id="main">

      
<center>


<h3><b> Welcome to login page of pamul </b></h3>

</center>
      
                
<form action="" method="post" enctype="multipart/form-data"> 

<label for=""><b>Email</b></label>
<input type="email" name="email" placeholder="enter your email" class="form-control" required><br>
<label for=""><b>Password</b></label>
<input type="password" name="pass" placeholder="enter your password" class="form-control"  required><br>

<center><input type="submit" name="submit"  class="btn btn-primary" ><br></center><br><br>


<center><p><input type="checkbox">  <b style="color:red"> I have no Account..</b><a href="signup.php" class ="btn btn-dark">signup</a></p></center>




</form>


 </div>

 <h1>@</h1>

        </div>
    </div>
</div>


<?php
///include_once('footer.php');
?>



    
</body>
</html>