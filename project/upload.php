<?php 
include "conn.php";
session_start();
if(isset($_POST['sub'])) {
    $price = $_POST['price'];
    $description = $_POST['description'];    
    $location = $_POST['location'];
    $pname = $_POST['pname'];
    $propertyt_id=$_SESSION['user_id'];
    $uploadOk = 0;
    if(isset($_FILES['photo'])){
        $errors= array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $tmp = explode('.', $file_name);
        $file_ext=strtolower(end($tmp));
        
        $expensions= array("jpeg","jpg","png", "gif");
        if(in_array($file_ext,$expensions)=== false){
           array_push($errors, "extension not allowed, please choose a JPEG or PNG file.");
        }
        
        if($file_size > 50000) {
            array_push($errors, "File size must be excately 50 KB.");
        }
        
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"uploads/".$file_name) or die("error moving file");
           $uploadOk = 1;
        }else{
           print_r($errors);
        }
     
    if ($uploadOk == 1) {
        $qry = "insert into details ('price', 'id', 'description', 'location','propertyname) VALUES ('$price', '$pid', '$description','$location','$propertname')";
        mysqli_query($conn,$qry)  or die("error: ".$qry);
        header('location:home.php');
    }
}
}
?>
<!DOCTYPE html>
<html>
    <head>
            <title>PROPERTY SELLING</title>
            <link rel="stylesheet" href="home.css">
    </head>   
    <body>
        <div class="header">
            <?php include "includes/home.php"?>   
        </div>
        <div class="content">
            <div class="disp">
                <h2>Suggest</h2>
                <h4> <?php if(isset($warning)) echo $warning; ?></h4>
                <form class="form" method="post" action="" enctype="multipart/form-data">
                Price<input type="text" name="price">
                Description<textarea name="description"></textarea>
                location<textarea name="location"></textarea>
                propertyName<input type="text" name="pname"></textarea>
                <input type="submit" name="sub" value="Click to Submit">
            </form>
            </div> 
        </div>
    </body>  
</html>
