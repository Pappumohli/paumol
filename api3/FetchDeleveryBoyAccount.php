


    <?php
    include_once('connection.php');
   
   
   $email =   $_GET['email'];
   //$limit = 3,book ke liye;   
   
   $query = "SELECT * FROM `deleveryboyaccount` WHERE demail='$email'";
    
   $result = mysqli_query($con,$query);
   if(mysqli_num_rows($result)>0){
   
   
   $row = $result->fetch_all(MYSQLI_ASSOC);
   
   if(empty($row)){
     
       $respose['error']="000";
       $respose['message']="no record";
       
      
           }else{
               $respose['error']="000";
               $respose['message']="record availables";
               $respose['deleveryboy']=$row;
              /// $respose = array("statue"=>"1","message"=>"data he","post"=>$row);
               
   
           }
           echo json_encode($respose);
   
       }
   
   ?>






