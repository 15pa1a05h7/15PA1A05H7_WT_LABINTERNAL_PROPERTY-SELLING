<?php
include 'conn.php';
session_start();
if(isset($_POST['sub'])){
$uname=$_POST['uname'];
$pass=$_POST['pass'];                                
$sql="SELECT * FROM signup WHERE `name`='$uname' AND `password`='$pass';";

$result=mysqli_query($conn,$sql);

if($row=$result->fetch_assoc()){
    echo $_SESSION['name']=$_POST['uname'];
   header("Location:upload.php"); 

	}
else{
	
   //header("Location:upload.php");
} 
}
?> 

<!DOCTYPE html> 
<html>
<head>
    <title>PROPERTY SELLING</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body> 
<h2 align="center">PROPERTY SELLING</h2>
<div id="main">
    <div id="info">
        <h2>LOGIN HERE</h2>
        <form  method="post">
        <label><b>UserName</b></label>
        <input type="text" name="uname" placeholder="User name" required><br><br>
        <label><b>Password</b></label>
        <input type="password" name="pass" placeholder="Password"><br><br>
        <button style="background-color: #6495ed;color:white;" type="submit" name="sub" ><b>Login</b></button>
        </form>
		  </div>
</div>
</body>
</html>
