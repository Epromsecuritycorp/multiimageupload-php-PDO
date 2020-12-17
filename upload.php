<?php

// database cnx

$username = "maro";
$password = "weGsf7k5CLhXSmBN";
$database = new PDO("mysql:host=localhost; dbname=accounts;",$username,$password);
$database->exec("SET CHARACTER SET UTF8");

if(isset($_POST['submit'])){
        
        // title       

        $title = $_POST['title'];

        // Images

        if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
          //Get the temp image path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            if($tmpFilePath != ""){
            

              $filePath = "uploaded/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];


                if(move_uploaded_file($tmpFilePath, $filePath)) {

                      $files[] = $filePath;  
 

                }
                
        
              }
        }
    }

    if(is_array($files)){
        $i=1;
        foreach($files as $file){
            
    
                    switch ($i) {
                    case 1:
                       $a=$file;
                        break;
                    case 2:
                        $b=$file;
                        break;
                    case 3:
                       $c=$file;
                       break;
                    case 4:
                       $d=$file;
                       break;
                    case 5:
                       $e=$file;
                       break;
                    case 6:
                       $f=$file;
                       break;
                    case 7:
                       $g=$file;
                       break;
                    }
                    if (empty($c)) {
                      $c = 0;
                    }
                    if (empty($d)) {
                      $d = 0;
                    }
                    if (empty($e)) {
                      $e = 0;
                    }
                    if (empty($f)) {
                      $f = 0;
                    }
                    if (empty($g)) {
                      $g = 0;
                    }


        $i++;
         }
          }


        $addUser = $database->prepare("INSERT INTO 
        images(title,image1,image2,image3,image4,image5,image6,image7)
         VALUES(:title,:image1,:image2,:image3,:image4,:image5,:image6,:image7)");
 
        $addUser->bindParam(":title",$title);
        $addUser->bindParam(":image1",$a);
        $addUser->bindParam(":image2",$b);
        $addUser->bindParam(":image3",$c);
        $addUser->bindParam(":image4",$d);
        $addUser->bindParam(":image5",$e);
        $addUser->bindParam(":image6",$f);
        $addUser->bindParam(":image7",$g);



        if($addUser->execute()){
            echo '<center><div class="alert alert-success" role="alert" style="width:500px;">
                  Data uploaded Success
          </div></center>';

        }else {
          echo '<center><div class="alert alert-danger" role="alert" style="width:500px;">
                  Error !!
          </div></center>';
        }
    
    }

?>

<!DOCTYPE html>
<!--
 Created by CyborgLab
 check my links :
 - https://www.facebook.com/MaroNarcos/
 - https://github.com/XmaroXcyborgX
  -->
<!-- You can upload up to 7 images -->
<!-- minimum 2 images -->
<html>
<head>
    <meta charset="utf-8">
    <title>upload multi images</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <div>
        <input type="text" name="title">
    </div>
    <div>
        <input type="file" name="upload[]" multiple="multiple">
    </div>
    <input type="submit" name="submit" value="upload">
</form>


</body>
</html>
