<?php


//alltypeofcloth

 header("Content-Type:application/json");
 header("Acess-Control-Allow-Origin: *");
 header("Acess-Control-Allow-Methods: POST");

  

include_once('connection.php');



$productname = $_POST['pname'];
$p_des = $_POST['des'];
$p_descount = $_POST['descount'];
$p_sell = $_POST['sell'];
$p_totalprice = $_POST['totalprice'];
$p_owneremail = $_POST['email'];

$p_address = $_POST['address'];
$p_category = $_POST['category'];
$p_size = $_POST['size'];
$p_pick = $_POST['pick']; 
//$p_totalprice = $p_totalprice1.' '.$p_size;
$c_harges = $_POST['cha'];

//$data = json_decode(file_get_contents("php://input"),true);//collect input parameters and converts into readable format

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

//4

$fileNameFour = $_FILES['file4']['name'];
$tmpPath4 = $_FILES['file4']['tmp_name'];
$fileSize4 = $_FILES['file4']['size'];

$re4 = $date.'-'.$time1.'4_';
$fileName4 = $re4.$fileNameFour;
//5
$fileNameFive = $_FILES['file5']['name'];
$tmpPath5 = $_FILES['file5']['tmp_name'];
$fileSize5 = $_FILES['file5']['size'];

$re5 = $date.'-'.$time1.'5_';
$fileName5 = $re5.$fileNameFive;

//6
$fileNameSex = $_FILES['file6']['name'];
$tmpPath6 = $_FILES['file6']['tmp_name'];
$fileSize6 = $_FILES['file6']['size'];

$re6 = $date.'-'.$time1.'6_';
$fileName6 = $re6.$fileNameSex;



//7
$fileNameSeven = $_FILES['file7']['name'];
$tmpPath7 = $_FILES['file7']['tmp_name'];
$fileSize7 = $_FILES['file7']['size'];

$re7 = $date.'-'.$time1.'7_';
$fileName7 = $re7.$fileNameSeven;


if(empty($fileName) AND empty($fileName1)){

$errorMSG = json_encode(array("message"=>"please select image","status"=>false));
echo $errorMSG;


}else{





    $upload_path = 'addproductimages/'; 
    $upload_path1 = 'addproductimages/';  
     $upload_path2 ='addproductimages/'; 
     $upload_path3 = 'addproductimages/'; 
     $upload_path4 = 'addproductimages/'; 
     $upload_path5 = 'addproductimages/';  
     $upload_path6 = 'addproductimages/';  
     $upload_path7 = 'addproductimages/';  


    $fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

    $fileExt1 = strtolower(pathinfo($fileName1,PATHINFO_EXTENSION));
    $fileExt2 = strtolower(pathinfo($fileName2,PATHINFO_EXTENSION));
    $fileExt3 = strtolower(pathinfo($fileName3,PATHINFO_EXTENSION));
    $fileExt4 = strtolower(pathinfo($fileName4,PATHINFO_EXTENSION));
    $fileExt5 = strtolower(pathinfo($fileName5,PATHINFO_EXTENSION));
    $fileExt6 = strtolower(pathinfo($fileName6,PATHINFO_EXTENSION));
    $fileExt7 = strtolower(pathinfo($fileName7,PATHINFO_EXTENSION));


    $valid_extensions = array('jpeg','jpg','png','gif','webp','avif');
    $valid_extensions1 = array('jpeg','jpg','png','gif','webp','avif');
   $valid_extensions2 = array('jpeg','jpg','png','gif','webp','avif');
    $valid_extensions3 = array('jpeg','jpg','png','gif','webp','avif');

    $valid_extensions4 = array('jpeg','jpg','png','gif','webp','avif');
    $valid_extensions5 = array('jpeg','jpg','png','gif','webp','avif');

    $valid_extensions6 = array('jpeg','jpg','png','gif','webp','avif');
    $valid_extensions7 = array('jpeg','jpg','png','gif','webp','avif');



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
          
    

/* first image close */
    }



/* 2 image tack     */
    if(in_array($fileExt1,$valid_extensions1)){



        if(!file_exists($upload_path1.$fileName1 )){

            if($fileSize1<500000){
        move_uploaded_file($tmpPath1,$upload_path1.$fileName1);
        
        
            }else{
                $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
                echo $errorMSG;
                
                  
        
            }
        
        
        }else{
        
            $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
            echo $errorMSG;
              
        
        }
    
    
    
    
        }else{
    
            $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
            echo $errorMSG;
              
        
    
    
        }

    

    




/* 2 image tack close     */



/* 3 image tack     */

if(in_array($fileExt2,$valid_extensions2)){



    if(!file_exists($upload_path2.$fileName2)){

        if($fileSize2<500000){
    move_uploaded_file($tmpPath2,$upload_path2.$fileName2);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
        echo $errorMSG;
          
    
    }




    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }



/* 3 image tack close     */


/* 4 image tack     */

if(in_array($fileExt3,$valid_extensions3)){



    if(!file_exists($upload_path3.$fileName3)){

        if($fileSize3<500000){
    move_uploaded_file($tmpPath3,$upload_path3.$fileName3);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
        echo $errorMSG;
          
    
    }




    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }

/* 4 image tack close     */



/* 5 image tack     */
if(in_array($fileExt4,$valid_extensions4)){



    if(!file_exists($upload_path4.$fileName4)){

        if($fileSize4<500000){
    move_uploaded_file($tmpPath4,$upload_path4.$fileName4);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
        echo $errorMSG;
          
    
    }




    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }

/* 5 image tack close     */




/* 6 image tack     */

if(in_array($fileExt5,$valid_extensions5)){



    if(!file_exists($upload_path5.$fileName5)){

        if($fileSize5<500000){
    move_uploaded_file($tmpPath5,$upload_path5.$fileName5);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
        echo $errorMSG;
          
    
    }




    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }



/* 6 image tack close     */


/* 7 image tack     */

if(in_array($fileExt6,$valid_extensions6)){



    if(!file_exists($upload_path6.$fileName6)){

        if($fileSize6<500000){
    move_uploaded_file($tmpPath6,$upload_path6.$fileName6);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
        echo $errorMSG;
          
    
    }




    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }



/* 7 image tack close     */




/* 8 image tack     */

if(in_array($fileExt7,$valid_extensions7)){



    if(!file_exists($upload_path7.$fileName7)){

        if($fileSize7<500000){
    move_uploaded_file($tmpPath7,$upload_path7.$fileName7);
    
    
        }else{
            $errorMSG = json_encode(array("message"=>"sorry your file size is large please chose 5md lower","status"=>false));
            echo $errorMSG;
            
              
    
        }
    
    
    }else{
    
        $errorMSG = json_encode(array("message"=>"sorry file allready exist check upload folder","status"=>false));
        echo $errorMSG;
          
    
    }




    }else{

        $errorMSG = json_encode(array("message"=>"sorry  only png jpeg jpg & gif file are allow","status"=>false));
        echo $errorMSG;
          
    


    }



/* 8 image tack close     */




   

    }






//if no error casud in continues..then;;


if(!isset($errorMSG)){



    // $sql = "INSERT INTO `alltypeofcloth`(`productname`, `productprice`, `productimage`, `onweremail`, `pdiscount`, `pdescription`, `sellingprice`, `productcategory`,`shopeaddress`,`image1`,`image2`,`image3`,`image4`,`image5`,`psize`)
    // VALUES ('$productname','$p_totalprice','$fileName','$p_owneremail','$p_descount','$p_des','$p_sell','$p_category','$p_address','$fileName1','$fileName2','$fileName3','$fileName4','$fileName5','$p_size')";

$sql = "INSERT INTO `allproductsproduct`(`productname`, `productprice`, `productimage`, `onweremail`, `pdiscount`, `pdescription`, `sellingprice`, `productcategory`,`shopeaddress`,`image1`,`image2`,`image3`,`image4`,`image5`,`image6`,`image7`,`size`,`productpickaddress`,`charge`)
                VALUES ('$productname','$p_totalprice','$fileName','$p_owneremail','$p_descount','$p_des','$p_sell','$p_category','$p_address','$fileName1','$fileName2','$fileName3','$fileName4','$fileName5','$fileName6','$fileName7','$p_size','$p_pick','$c_harges')";











$result = mysqli_query($con,$sql);
	if($result==1){

        echo json_encode(array("message"=>"your product successfully upload","status"=>"1"));



    }else{
        echo json_encode(array("message"=>" your product not upload","status"=>"2"));

  
      
    }
}







?>