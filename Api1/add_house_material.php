<?php


//alltypeofcloth

 header("Content-Type:application/json");
 header("Acess-Control-Allow-Origin: *");
 header("Acess-Control-Allow-Methods: POST");

  

include_once('connection.php');




$fileNameStart = $_FILES['file']['name'];
$tmpPath = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];

$date = Date('Y.m.d');
$time = time();
$re = $date.'-'.$time.'0_';
$fileName = $re.$fileNameStart;



//1

$fileNameOne = $_FILES['file1']['name'];
$tmpPath1 = $_FILES['file1']['tmp_name'];
$fileSize1 = $_FILES['file1']['size'];
$time1 = time();
$re1 = $date.'-'.$time1.'1_';
$fileName1 = $re1.$fileNameOne;
//

//2

$fileNameTwo = $_FILES['file2']['name'];
$tmpPath2 = $_FILES['file2']['tmp_name'];
$fileSize2 = $_FILES['file2']['size'];
$re2 = $date.'-'.$time1.'2_';
$fileName2 = $re2.$fileNameTwo;
//3
$fileNameThree = $_FILES['file3']['name'];
$tmpPath3 = $_FILES['file3']['tmp_name'];
$fileSize3 = $_FILES['file3']['size'];
$re3 = $date.'-'.$time1.'3_';
$fileName3 = $re3.$fileNameThree;






if(empty($fileName)){

$errorMSG = json_encode(array("message"=>"please select image","status"=>false));
echo $errorMSG;


}else{





    $upload_path = 'housematerialimage/'; 
    $upload_path1 = 'housematerialimage/'; 
    $upload_path2 = 'housematerialimage/'; 
    $upload_path3= 'housematerialimage/'; 
   

    $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    $fileExt1 = strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
    $fileExt2 = strtolower(pathinfo($fileName2,PATHINFO_EXTENSION));
    $fileExt3 = strtolower(pathinfo($fileName3,PATHINFO_EXTENSION));





    $valid_extensions = array('jpeg','jpg','png','gif','webp','avif');
    $valid_extensions1 = array('jpeg','jpg','png','gif','webp','avif');
    $valid_extensions2 = array('jpeg','jpg','png','gif','webp','avif');
    $valid_extensions3 = array('jpeg','jpg','png','gif','webp','avif');




    /* first image tack  */
    if(in_array($fileExt,$valid_extensions)){



        if(!file_exists($upload_path.$fileName )){

            if($fileSize<500000){
        move_uploaded_file($tmpPath,$upload_path.$fileName);
        
        
            }else{
                $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>"2"));
                echo $errorMSG;
                
                  
        
            }
        
        
        }else{
        
            $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>"1"));
           // echo $errorMSG;
              
        
        }





    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    
    }


///1
if(in_array($fileExt1,$valid_extensions1)){



    if(!file_exists($upload_path1.$fileName1 )){

        if($fileSize1<500000){
    move_uploaded_file($tmpPath1,$upload_path1.$fileName1);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>"2"));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>"1"));
       // echo $errorMSG;
          
    
    }





}else{

    $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
    echo $errorMSG;
      

}
//1


//2

if(in_array($fileExt2,$valid_extensions2)){



    if(!file_exists($upload_path2.$fileName2 )){

        if($fileSize2<500000){
    move_uploaded_file($tmpPath2,$upload_path2.$fileName2);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>"2"));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>"1"));
       // echo $errorMSG;
          
    
    }





}else{

    $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
    echo $errorMSG;
      

}
//2

//3
if(in_array($fileExt3,$valid_extensions3)){



    if(!file_exists($upload_path3.$fileName3 )){

        if($fileSize3<500000){
    move_uploaded_file($tmpPath3,$upload_path3.$fileName3);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>"2"));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>"1"));
       // echo $errorMSG;
          
    
    }





}else{

    $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
    echo $errorMSG;
      

}

//3



    }






//if no error casud in continues..then;;


if(!isset($errorMSG)){



$sql = "INSERT INTO `housematerialshow`(`materialimage`,`image1`,`image2`,`image3`) 
VALUES ('$fileName','$fileName1','$fileName2','$fileName3')";










$result = mysqli_query($con,$sql);
	if($result==1){

        echo json_encode(array("message"=>"your product successfully upload","status"=>"1"));



    }else{
        echo json_encode(array("message"=>" your product not upload","status"=>"2"));

  
      
    }
}







?>